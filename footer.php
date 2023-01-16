<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPdev01
 */

?>



       
<?php wp_footer(); ?>
<script>
   
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 2) {
		$("#header-sticky").removeClass("sticky");
		$("#hide-id").removeClass("hide-sticky");
	} else {
		$("#header-sticky").addClass("sticky");
		$("#hide-id").addClass("hide-sticky");
	}
});
            // Get the modal
            var modal = document.getElementById('id01');
      
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
               if (event.target == modal) {
                  modal.style.display = "none";
               }
            }
            // Get the modal
            var modal = document.getElementById('id02');
      
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
               if (event.target == modal) {
                  modal.style.display = "none";
               }
            }
            // Get the modal
            var modal = document.getElementById('id03');
      
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
               if (event.target == modal) {
                  modal.style.display = "none";
               }
            }

          
         </script>

</body>
</html>
