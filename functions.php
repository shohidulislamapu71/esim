<?php
/**
 * WPdev01 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPdev01
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpdev01_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WPdev01, use a find and replace
		* to change 'wpdev01' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wpdev01', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wpdev01' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wpdev01_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'wpdev01_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpdev01_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpdev01_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpdev01_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpdev01_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wpdev01' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wpdev01' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wpdev01_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpdev01_scripts() {
	wp_enqueue_style( 'wpdev01-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wpdev01-style', 'rtl', 'replace' );
	
	wp_enqueue_style( 'wpdev01-navigation-font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array(), _S_VERSION);
	wp_enqueue_style( 'wpdev01-navigation-bootstrap-css', '//cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style( 'wpdev01-navigation-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);


	wp_enqueue_script( 'wpdev01-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpdev02-custom-poper-js', '//cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpdev02-custom-bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wpdev02-custom-isotop-js', '//npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpdev01_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function esimpost(){
	?>
	<section class="esim-area">
        
            <div class="row box-row">
				<?php 
				
					
					$query = new WP_Query(array(
						'post_type' => 'esim-type',
						'posts_per_page' => 8,
						'tax_query' => array(
							array(
								'taxonomy' => 'esim-location',
								'field'    => 'slug',
								'terms'    => 'global',
								'operator' => 'NOT IN',
							),
						),
						
					));

					while($query->have_posts()): $query->the_post();
				?>
				
                <div class="col-xl-3 col-md-4 col-sm-4 box-sim">
					<div class="box-sim-area box-res-area">
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
									
									<span><i class="fa-solid fa-location-dot"></i><?php
									$terms = get_the_terms( $post->ID , 'esim-location' );
									foreach ( $terms as $term ) {
									echo $term->name;
									}
									
									?></span>
								</div>
							</div>
						</div>
						</a>
					</div>
                </div>
				
				<?php endwhile; wp_reset_query(); ?>
            </div>
        
      
    </section>
	<?php
}
add_shortcode( 'ESIM','esimpost' );


function create_post_type(){
	register_post_type('esim-type',array(
		'label'	=> 'eSim',
		'public'=> true,
		'supports'=> array('title','thumbnail'),
	));

	register_taxonomy( 'esim-location','esim-type', array(

		'labels' 	=> array(
			'name' 	=> 'Location',
			'add_new_items' 	=> 'Add New Location',
			'parent_item_colon' => 'Parent item Location',
		),
		'hierarchical' => true,	

		

	) );
}
add_action('init','create_post_type');



function create_post_type_global(){
	register_post_type('global-type',array(
		'label'	=> 'Global',
		'public'=> true,
		'supports'=> array('title','thumbnail'),
	));

	register_taxonomy( 'global-location','global-type', array(

		'labels' 	=> array(
			'name' 	=> 'Location global',
			'add_new_items' 	=> 'Add New global',
			'parent_item_colon' => 'Parent item global',
		),
		'hierarchical' => true,	

		

	) );
}
add_action('init','create_post_type_global');



function create_post_type_filter(){
	register_post_type('filter-type',array(
		'label'	=> 'Filter',
		'public'=> true,
		'supports'=> array('title','thumbnail'),
	));

	register_taxonomy( 'filter-location','filter-type', array(

		'labels' 	=> array(
			'name' 	=> 'Filter location',
			'add_new_items' 	=> 'Add New location',
			'parent_item_colon' => 'Parent item location',
		),
		'hierarchical' => true,	

		

	) );
}
add_action('init','create_post_type_filter');



function create_post_type_taxsonomy_proudct(){

	register_taxonomy( 'Support-location','product', array(

		'labels' 	=> array(
			'name' 	=> 'Support location',
			'add_new_items' 	=> 'Add New Support location',
			'parent_item_colon' => 'Parent item Support location',
			
		),
		'hierarchical' => true,	
	

		

	) );
}
add_action('init','create_post_type_taxsonomy_proudct');


add_action( 'woocommerce_review_order_before_submit', 'bbloomer_add_checkout_privacy_policy', 9 );
    
function bbloomer_add_checkout_privacy_policy() {
   
woocommerce_form_field( 'privacy_policy', array(
   'type'          => 'checkbox',
   'class'         => array('form-row privacy'),
   'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
   'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
   'required'      => true,
   'label'         => 'please confirm your device is eSIM compatible and network-unlocked.<a style="color:#0694ff;" target="_blank" rel="noopener noreferrer" href="'.site_url().'/see-if-your-device-can-use-our-esim/">Learn More</a></label>',
)); 
   
}



