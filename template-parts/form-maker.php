<?php
   ?>

   <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get URL parameters to filter option values
        const params = new URLSearchParams(window.location.search);
        const product = params.get('setupfor'); // e.g. ?setupfor=watch

         if (!product) return;

        // Find your select field by ID
        //const selectField = document.getElementById('wdform_19_element10'); // AU
        const selectField = document.getElementById('wdform_90_element12'); // CA
        
        if (!selectField) return;

        // Define dynamic options based on URL param
        let options = [];

        if (product === 'watch') {
            options = [
                'English',
                'French',
                'Cantonese',
                'Arabic',
                'Filipino',
                'German',
                'Japanese',
                'Greek',
                'Hindi',
                'Italian',
                'Korean',
                'Mandarin',
                'Urdu',
                'Portuguese',
                'Spanish',
                'Vietnamese'
            ];
        } 
         else {
            options = [
                'English',
                'French',
                'Cantonese',
                'Greek',
                'Hindi',
                'Italian',
                'Korean',
                'Mandarin',
                'Urdu',
                'Vietnamese'
            ];
        }

        // Clear existing options
        selectField.innerHTML = '';

        // Add a placeholder
        // const placeholder = document.createElement('option');
        // placeholder.value = '';
        // placeholder.textContent = 'Select an option';
        // selectField.appendChild(placeholder);

        // Add new dynamic options
        options.forEach(function(opt) {
            const option = document.createElement('option');
            option.value = opt;
            option.textContent = opt;
            selectField.appendChild(option);
        });
    });
    </script>