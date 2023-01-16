<?php get_header(); ?>
<?php echo do_shortcode('[elementor-template id="1825"]'); ?>
<style>
    
/* ----------------------------------------------------------------
    [ 08 Start Works ]
-----------------------------------------------------------------*/
.work_filter ul {
	padding: 0;
	list-style: none;
	margin-bottom: 30px;
}
.work_filter ul li {
    font-weight: 600;
    text-transform: capitalize;
    display: inline-block;
    cursor: pointer;
    font-size: 16px;
    border-radius: 30px;
    padding: 7px 20px;
    letter-spacing: 1px;
	background: #fafafa;
    margin: 0 5px 20px;
    transition: all 0.5s ease-in-out;
}
.work_filter ul li:hover{
	border-color: #0694FF;
	background: #0694FF;
	color: #fff;
}
.work_filter .active {
    color: #fff;
	border-color: #0694FF;
    background: #0694FF;
}
.work_content_area .item-img {
	position: relative;
	margin-bottom: 30px;
	-webkit-transition: all .4s;
	transition: all .4s;
}
.work_content_area .item-img:hover {
	-webkit-box-shadow: -10px 10px 30px rgba(0, 0, 0, 0.1);
	box-shadow: -10px 10px 30px rgba(0, 0, 0, 0.1);
}
.work_content_area .item-img:hover .item-img-overlay {
	visibility: visible;
	opacity: 1;
}
.work_content_area .item-img-overlay {
	position: absolute;
	top: 10px;
	left: 10px;
	right: 10px;
	bottom: 10px;
	padding: 30px;
	background: rgba(0, 0, 0, 0.6);
	opacity: 0;
	visibility: hidden;
	-webkit-transition: all .5s;
	transition: all .5s;
}
.work_content_area .item-img-overlay .icon {
	position: absolute;
	right: 30px;
	bottom: 30px;
	width: 40px;
	height: 40px;
	line-height: 40px;
	border-radius: 50%;
	border: 1px solid #0694FF;
	text-align: center;
	font-size: 20px;
	color: #0694FF;
}
.work_content_area .item-img-overlay p {
	color: #0694FF;
	font-weight: 400;
	font-size: 13px;
}
.work_content_area .item-img-overlay h5{
	font-weight: 400;
	color: #fff;
	font-size: 16px;
	margin-top: 5px;
}
.row {

    flex-direction: column;
}
.text-post-area {
    padding: 0px 17px 0px 2px;
}
#portfolio{
    margin-bottom: 100px;
}
.text-area-center.text-center {
    padding-top: 50px;
}
/* ----------------------------------------------------------------
    [ End Works ]
-----------------------------------------------------------------*/

</style>

		<!-- START PORTFOLIO -->
        <section id="portfolio"  class="gray_bg section_padding">
			
            <div class="container">
                <div class="text-area-center text-center">
                <?php $term = get_queried_object();?>
                <h4><?php echo $term->name; ?></h4>
                
            
                </div>
                
            <div class="row">

<div class="work_content_area" style="padding-top:25px;">

    <?php





    $args = array(
        'post_type' => 'esim-type',
        'tax_query' => array( array(
            'taxonomy'	=> 'esim-location',
            'field'		=> 'slug',
            'terms'		=> $term->slug,
        ) ),

        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();

        
           
        ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box-sim-area">
        <?php
        $link_page = get_field('page_url_here');?>
        <a href="<?php echo $link_page;?>">
        <div class="single-esim-post" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ;?>);">
            <div class="content-img">
                    <?php $imageas = get_field('flags');
                        $img_url =  $imageas['url'];
                    ?>
                <img src="<?php echo $img_url;  ?>" alt="">
                <h5><?php the_title(); ?></h5>
            </div>
        </div>
        <div class="text-post-area">
            <div class="left-post-area">
                <span><?php the_field('starting_from'); ?></span>
            </div>
            <div class="right-post-area">
                <div class="price-sim">
                    <h6><?php the_field('perusd'); ?></h6>
                    <?php the_content(); ?>
                </div>
                <div class="location-sim">
                    
                    <span><i class="fa-solid fa-location-dot"></i> <?php the_field('address_a'); ?></span>
                </div>
            </div>
        </div>
        </a>
    </div>
            </div>
        <?php
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
    ?>
    
</div>
</div>
            </div>
				
				
		</section>
	<!-- END PORTFOLIO -->
    <script>
        





        jQuery(document).ready(function($){
	
           
    /* START ISOTOP JS */
			var $grid = $('.work_content_area').isotope({
			  // options
			});
			// filter items on button click
			$('.work_filter').on( 'click', 'li', function() {
			  var filterValue = $(this).attr('data-filter');
			  $grid.isotope({ filter: filterValue });
			});
			// filter items on button click
			$('.work_filter').on( 'click', 'li', function() {
				$(this).addClass('active').siblings().removeClass('active')
			});
		/* END ISOTOP JS */
});
    </script>
<?php get_footer(); ?>