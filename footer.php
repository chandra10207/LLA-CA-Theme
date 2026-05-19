<?php
/**
 * The footer template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
						<?php do_action( 'avada_after_main_content' ); ?>

					</div>  <!-- fusion-row -->
				</main>  <!-- #main -->
				<?php do_action( 'avada_after_main_container' ); ?>

				<?php
				/**
				 * Get the correct page ID.
				 */
				$c_page_id = Avada()->fusion_library->get_page_id();
				?>

				<?php
				/**
				 * Only include the footer.
				 */
				?>
				<?php if ( ! is_page_template( 'blank.php' ) ) : ?>

					<?php 
					if ( has_action( 'avada_render_footer' ) ) {
						do_action( 'avada_render_footer' );
					} else {
						Avada()->template->render_footer();
					} 
					?>

					<div class="fusion-sliding-bar-wrapper">
						<?php
						/**
						 * Add sliding bar.
						 */
						if ( Avada()->settings->get( 'slidingbar_widgets' ) ) {
							get_template_part( 'sliding_bar' );
						}
						?>
					</div>

					<?php do_action( 'avada_before_wrapper_container_close' ); ?>
				<?php endif; // End is not blank page check. ?>
			</div> <!-- wrapper -->
		</div> <!-- #boxed-wrapper -->
		<div class="fusion-top-frame"></div>
		<div class="fusion-bottom-frame"></div>
		<div class="fusion-boxed-shadow"></div>
		<a class="fusion-one-page-text-link fusion-page-load-link" tabindex="-1" href="#" aria-hidden="true"></a>

		<div class="avada-footer-scripts">
			<?php wp_footer(); ?>
		</div>
			
		<!-- SETUP FORMS  -->
 	<script type="text/javascript">  
	   jQuery.noConflict()
	   jQuery(document).ready(function(){
	      (function($){
	         var $licenceCHKBOX = $("#wdform_14_element120");
			 var $medicareCHKBOX = $("#wdform_31_element120");
		 	 var $passportCHKBOX = $("#wdform_44_element120");
	         var $driverLicence = $("#driver_licence_container");
			 var $id_chkbox = $("#wdform_67_element120");
		 	 var $id_chkbox2 = $("#wdform_67_element121");
	         var toggleSlide = function() {
	            $driverLicence.slideToggle();
	         };
	         if($licenceCHKBOX.is(':checked') && $medicareCHKBOX.is(':checked') && $passportCHKBOX.is(':checked') ) {
	            toggleSlide();
	         }

			 $id_chkbox.click(function() {
	            if($id_chkbox.prop("checked") == true) {
	               $(".telstra_btn").show(300);
	            }
		    });
		    
		    $id_chkbox2.click(function() {
    		    if($id_chkbox2.prop("checked") == true) {
	               $(".telstra_btn").show(300);
    		    }
	         });
			  
			  
	         $licenceCHKBOX.click(function() {
	            if($licenceCHKBOX.prop("checked") == true) {
	               $driverLicence.show(300);
		    	}else {
	               $driverLicence.hide(300);
		    	} 
	         });
			 
			  
			 var ndis_yes = $('#wdform_17_element160');
			 ndis_yes.click(function() {
	            if($('#wdform_17_element160').prop("checked") == true) {
	               $('.ndis_info').show(300);
		    	}
	         });
			  
			 var ndis_no = $('#wdform_17_element161');
			 ndis_no.click(function() {
	            if($('#wdform_17_element161').prop("checked") == true) {
	               $('.ndis_info').hide(300);
		    	}
	         });

	         $medicareCHKBOX.click(function() {
	            if($medicareCHKBOX.prop("checked") == true) {
	               $("#medicare_container").show(300);
		    }else {
	               $("#medicare_container").hide(300);
		    } 
	         });

	         $passportCHKBOX.click(function() {
	            if($passportCHKBOX.prop("checked") == true) {
	               $("#passport_container").show(300);
		    }else {
	               $("#passport_container").hide(300);
		    } 
	         });

			
	      })(jQuery);
	   });

	</script>
<!-- SETUP FORMS END  --> 
		<?php get_template_part( 'templates/to-top' ); ?>
		
<?php 
if ( is_page( 844 ) ) {
    get_template_part( 'template-parts/form-maker');
}
?>		
		
	</body>
</html>
