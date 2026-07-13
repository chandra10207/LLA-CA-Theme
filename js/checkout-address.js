(function () {
    const GOOGLE_API_KEY = 'AIzaSyDUS-Ybq4Ms54h6X7ZnpsLsVI8s-B7CKH8';

    let googleMapsLoaded = false;
    let pendingInits = [];
    let mapsRequested = false;
    const initializedInputs = new Set();

    /**
     * Load Google Maps API (only once)
     */
    function loadGoogleMaps(callback) {
        if (googleMapsLoaded) {
            callback();
            return;
        }

        pendingInits.push(callback);

        if (pendingInits.length === 1) {
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=${GOOGLE_API_KEY}&libraries=places&callback=__googleMapsReady`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }
    }

    /**
     * Global callback
     */
    window.__googleMapsReady = function () {
        googleMapsLoaded = true;
        pendingInits.forEach(cb => cb());
        pendingInits = [];
    };

    /**
     * Setup autocomplete (safe, no duplicates)
     */
    function setupAutocomplete(inputId, stateId, postalId, cityId) {
        if (initializedInputs.has(inputId)) return;

        const input = document.getElementById(inputId);
        if (!input || !window.google || !google.maps) return;

        initializedInputs.add(inputId);

        const autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['geocode'],
            componentRestrictions: { country: ['ca'] },
            fields: ['address_components']
        });

        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            if (!place.address_components) return;

            let state = '';
            let postcode = '';
            let city = '';
            let streetNumber = '';
            let unit = '';
            let route = '';

            place.address_components.forEach(component => {
                const types = component.types;

                if (types.includes('street_number')) streetNumber = component.long_name;
                if (types.includes('subpremise')) unit = component.long_name;
                if (types.includes('administrative_area_level_1')) state = component.short_name;
                if (types.includes('postal_code')) postcode = component.long_name;
                if (types.includes('locality')) city = component.long_name;
                if (types.includes('route')) route = component.long_name;
            });

            const stateEl = document.getElementById(stateId);
            const postalEl = document.getElementById(postalId);
            const cityEl = document.getElementById(cityId);

            if (stateEl) stateEl.value = state;
            if (postalEl) postalEl.value = postcode;
            if (cityEl) cityEl.value = city;

            // Rebuild clean address
            let address = '';
            if (unit) address += unit + '/';
            if (streetNumber) address += streetNumber + ' ';
            if (route) address += route;

            input.value = address.trim();
        });
    }

    /**
     * Init both fields
     */
    function initAutocompletes() {
        setupAutocomplete('shipping_address_1', 'shipping_state', 'shipping_postcode', 'shipping_city');
        setupAutocomplete('billing_address_1', 'billing_state', 'billing_postcode', 'billing_city');
    }

    /**
     * Trigger load once
     */
    function triggerLoad() {
        if (mapsRequested) return;
        mapsRequested = true;

        loadGoogleMaps(() => {
            initAutocompletes();
        });
    }

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function () {

        // 1. Load during idle time (best UX)
        if ('requestIdleCallback' in window) {
            requestIdleCallback(triggerLoad, { timeout: 2000 });
        } else {
            setTimeout(triggerLoad, 1500);
        }

        // 2. Load on first interaction (mobile boost)
        ['touchstart', 'scroll', 'mousemove'].forEach(event => {
            window.addEventListener(event, triggerLoad, {
                once: true,
                passive: true
            });
        });

        // 3. Fallback: load on focus
        ['shipping_address_1', 'billing_address_1'].forEach(inputId => {
            const input = document.getElementById(inputId);
            if (!input) return;

            input.addEventListener('focus', triggerLoad, { once: true });
        });

    });

    /**
     * WooCommerce AJAX refresh support
     */
    document.body.addEventListener('updated_checkout', function () {
        if (googleMapsLoaded) {
            initAutocompletes();
        }
    });

})();
