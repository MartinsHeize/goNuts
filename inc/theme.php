<?php

/**
 * WD styles. 
 * WD css/js assets.
 */

add_action('init', 'wd_register_styles');

function wd_register_styles() {
	
	
	
  
}


function wd_enqueue_styles() {
	
}

add_action('wp_enqueue_scripts', 'wd_enqueue_styles');

function wd_adding_scripts() {
	
}
add_action( 'wp_enqueue_scripts', 'wd_adding_scripts' ); 



add_theme_support( 'post-thumbnails' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
/**
 * WD menus. 
 * WD side menu.
 */

function wd_register_my_menus() {
  register_nav_menus(
    array(  
    	'top_navigation' => __( 'Top menu' ),
      'footer_navigation' => __( 'Footer menu' )
    )
  );
} 
add_action( 'init', 'wd_register_my_menus' );

require_once('wp_bootstrap_navwalker.php');



/**
 * WD images sizes. 
 * Global images sizes.
 */
add_image_size('plan-thumb', 303, 440, array( 'center', 'center' ) );


if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

add_filter( 'wp_nav_menu_objects', 'add_has_children_to_nav_items' );

function add_has_children_to_nav_items( $items )
{
    $parents = wp_list_pluck( $items, 'menu_item_parent');

    foreach ( $items as $item )
        in_array( $item->ID, $parents ) && $item->classes[] = 'has-children';

    return $items;
}

function wpse_remove_empty_links( $menu ) {
    return str_replace( '<a href="#">', '', $menu );
}

add_filter( 'wp_nav_menu_items', 'wpse_remove_empty_links' );

class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


//attach our function to the wp_pagenavi filter
add_filter( 'wp_pagenavi', 'wd_pagination', 10, 2 );
 
//customize the PageNavi HTML before it is output
function wd_pagination($html) {
	$out = '';
 
	//wrap a's and span's in li's
	$out = str_replace("<a","<li><a",$html);	
	$out = str_replace("</a>","</a></li>",$out);
	$out = str_replace("<span","<li><span",$out);	
	$out = str_replace("</span>","</span></li>",$out);
	$out = str_replace("<div class='wp-pagenavi'>","",$out);
	$out = str_replace("</div>","",$out);
 
	return '<div class="pagination-box">
			<ul class="pagination clearfix">'.$out.'</ul>
		</div>';
}



function my_custom_mime_types( $mimes ) {
 
// New allowed mime types.
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';
 
// Optional. Remove a mime type.
unset( $mimes['exe'] );
unset( $mimes['php'] );
 
return $mimes;
}

add_filter( 'upload_mimes', 'my_custom_mime_types' );

function wd_theme_load_theme_textdomain() {
    load_theme_textdomain( 'wdstartertheme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wd_theme_load_theme_textdomain' );


