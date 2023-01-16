<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' ); ?>

        <section class="back-btn">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="back-btn-wrapper">
                            <a href="<?php echo site_url('/shop'); ?>"> <span><i class="fa-solid fa-angle-left"></i></span> Go back</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
        <section class="grenada">
            <div class="container bg-color">
                <div class="grenada-wrapper">
                            <div class="grenada-left-content">
                                <div class="container">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3">
                                            <h1><?php the_field('country_name'); ?></h1>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="speed-box">
                                                <div class="speed-box-icon">
                                                    <span><i class="fa-solid fa-bolt"></i></span>
                                                </div>
                                                <div class="speed-box-content">
                                                    <p><?php the_field('speed'); ?></p>
                                                    <h2><?php the_field('data_only__4g'); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="provider-box">
                                                <div class="provider-box-icon">
                                                    <span><i class="fa-solid fa-signal"></i></span>
                                                </div>
                                                <div class="provider-box-content">
                                                    <p><?php the_field('provider'); ?></p>
                                                    <h2><?php the_field('truphone'); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="grenada-right-image">
                                                <div class="image-box img-withd">
                                                        <?php $images = get_field('enter_your_network_images');
                                                            $img_url =  $images['url'];
                                                        ?>
                                                        <img src="<?php echo $img_url;  ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                 
                </div>
            </div>
        </section>
    <section class="price_sec">
        <div class="container">
            <div class="tab_wrapper_content">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
						<?php
                            $the_cat_id = get_field('category_id_here'); 

							$product_cats = get_terms(
								array(
									'taxonomy'   => 'product_cat',
									'hide_empty' => false,
                                    'parent'   =>  $the_cat_id,
								)
							);
							
							foreach ( $product_cats as $key => $product_cat ) {
								?>
								<li class="nav-item">
                                	<a class="nav-link tab_btn_top" id="<?php echo esc_attr( $product_cat->slug ); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr( $product_cat->slug ); ?>"
                                    role="tab" aria-controls="<?php echo esc_attr( $product_cat->slug ); ?>" aria-selected="false"><?php echo esc_html( $product_cat->name ); ?></a>
                            	</li>
								
							<?php } ?>
                        </ul>
						


                        <div class="tab-content total_cards_wrapper" id="myTabContent">
						<?php
						$c = 0;
						foreach ( $product_cats as $key => $product_cat ) {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 4,
								'product_cat'    => $product_cat->slug,
								'hide_empty'     => true,
							);
							?>


                            <div class="tab-pane <?php echo ( 0 === $c ) ? 'show active' : 'fade'; ?>" id="<?php echo esc_attr( $product_cat->slug ); ?>" role="tabpanel"
                                aria-labelledby="<?php echo esc_attr( $product_cat->slug ); ?>-tab">
                                <div class="starter_pack_wrapper">
                                    
                                        <div class="row customize_row">
										<?php
											$products = new WP_Query( $args );
											if ( $products->have_posts() ) :
											while ( $products->have_posts() ) :
												$products->the_post();
                            				?>
                                     
                                          
                                            <div id="boxone" class="col-md-3 single_product_card changeme2 form-group box-one" data-toggle="modal" data-target="#exampleModalCenter<?php the_ID(); ?>">
                                               <label for="vehicle2">
                                                    <div class="product_info">
                                                        <h1 class="p_card_title"><?php the_field('to_total_gb'); ?></h1>
                                                        <p><?php the_field('total_days'); ?></p>

                                                        <h1 class="p_card_title"><?php echo  get_woocommerce_currency_symbol(); ?> <?php echo $product->get_price(); ?></h1>
                                                        <p><?php the_field('per_gb_price'); ?></p>
                                                    </div>
                                                </label>
                                            </div>

                                           
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="grenada-right-image">
                                                                        <div class="image-box">
                                                                            <?php $images = get_field('enter_your_network_images');
                                                                                $img_url =  $images['url'];
                                                                            ?>
                                                                            <img src="<?php echo $img_url;  ?>" alt="">
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-6 single_product_card box-add-cart changeme2 form-group" data-toggle="modal" data-target="#exampleModalCenter">
                                                                    <label for="vehicle2">
                                                                            <div class="product_info2">
                                                                                <h1 class="p_card_title"><span style="color:#333;">Data :</span> <?php the_field('to_total_gb'); ?></h1>
                                                                                <p><span style="color:#333;">Day :</span>    <?php the_field('total_days'); ?></p>

                                                                                <h1 class="p_card_title"><span style="color:#333;">Price :</span> <?php echo  get_woocommerce_currency_symbol(); ?> <?php echo $product->get_price(); ?></h1>
                                                                                
                                                                            </div>
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            <?php echo do_shortcode('[elementor-template id="1649"]'); ?>
                                                            <form action="<?php echo site_url();?>/?add-to-cart=<?php echo get_the_ID();?>" data-quantity="1" class="" data-product_id="<?php echo get_the_ID();?>" method="post">
                                                                <div id="form-help">
                                                                    <input type="checkbox" required id="vehicle1" name="vehicle1" value="Bike">
                                                                    <label for="vehicle1">please confirm your device is eSIM compatible and network-unlocked.<a style="color:#0694ff;" href="<?php echo site_url(); ?>/see-if-your-device-can-use-our-esim/"> Learn More</a></label><br>
                                                                </div>
                                                                <div id="header-sticky" class="checkout-wrapper">   
                                                                <button type="submit">Checkout <?php echo  get_woocommerce_currency_symbol(); ?><?php echo $product->get_price(); ?></button>
                                                            </form>
                                                            </div>
                                                            <div class="title-des">
                                                            <h6>More info</h6>
                                                        </div>
                                                        <div class="description-area">
                                                                <?php the_content();?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											<?php
											endwhile;
											?>
											<?php
											wp_reset_postdata();
										endif;
										?>
                                        </div>
                                    
                                </div>
                            </div>


                           <?php 
						$c++;
						};?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="data-abailable"> 
            <div class="price-btn-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="price-btn-wrapper">
                                        <div onclick="document.getElementById('id01').style.display='block'" class="plan-details-btn">
                                            <button >Plan details</button>
                                            
                                        </div>
                                        <div id="id01" class="modal popup_wrapper">
                                            <form class="modal-content" action="/action_page.php">
                                               <div class="pop_up">
                                                  <div class="pop_head">
                                                     <div class="pop_heading">
                                                        <h2>Plan details</h2>
                                                     </div>
                                                     <div class="pop_allcontent">
                                                        <?php
                                                        $get_items = get_field('plan_details_all');
                                                        foreach($get_items as $get_item){
                                                            ?>
                                                            <h2><?php echo $get_item['heading_title']; ?></h2>
                                                            <p><?php echo $get_item['sub_description']; ?></p>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                       
                                                     </div>
                                                
                                                  </div>
                                                  <div class="pop_content">
                                                     <div class="bank_slip_btn">
                                                        <a class="btn btn-primary bs_btn_upload" href="#"
                                                           role="button"></a>
                                                        <a class="btn bs_btn_cancel" type="button"
                                                           onclick="document.getElementById('id01').style.display='none'"><i class="fa-sharp fa-solid fa-xmark"></i></a>
                                                     </div>
                                                  </div>
                                               </div>
                                            </form>
                                         </div>
                                        <div class="btn-icon1">
                                            <i class="fa-solid fa-file"></i>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="price-btn-wrapper">
                                        <div  onclick="document.getElementById('id02').style.display='block'" class="plan-details-btn">
                                            <button >About eSIM</button>   
                                        </div>
                                        <div id="id02" class="modal popup_wrapper">
                                            <form class="modal-content" action="/action_page.php">
                                               <div class="pop_up">
                                                  <div class="pop_head">
                                                     <div class="pop_heading">
                                                     <h2>About eSIM</h2>
                                                     </div>
                                                     <div class="pop_allcontent">
                                                     <?php
                                                        $get_items = get_field('about_esim');
                                                        foreach($get_items as $get_item){
                                                            ?>
                                                            <h2><?php echo $get_item['heading_title']; ?></h2>
                                                            <p><?php echo $get_item['heading_description']; ?></p>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                     </div>
                                                  </div>
                                                  <div class="pop_content">
                                                     <div class="bank_slip_btn">
                                                        <a class="btn btn-primary bs_btn_upload" href="#"
                                                           role="button"></a>
                                                        <a class="btn bs_btn_cancel" type="button"
                                                           onclick="document.getElementById('id02').style.display='none'"><i class="fa-sharp fa-solid fa-xmark"></i></a>
                                                     </div>
                                                  </div>
                                               </div>
                                            </form>
                                         </div>
                                        <div class="btn-icon1">
                                            <i class="fa-solid fa-sim-card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <script>
                                                                    jQuery(document).ready(function($){

                                                                  

                                                                        $('input:checkbox').change(function(){
                                                                            if($(this).is(":checked")) {
                                                                                $('div.checkout-wrapper').addClass("disabled-checkout");
                                                                            } else {
                                                                                $('div.checkout-wrapper').removeClass("disabled-checkout");
                                                                            }
                                                                        });
                                                                    
                                                                       
                                                                  




                                                                    });
                                                                </script>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

