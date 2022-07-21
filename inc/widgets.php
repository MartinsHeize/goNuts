<?php
function wd_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer 1', 'wdstartertheme' ),
		'id' => 'footer-1',
		'description' => __( '', 'wdstartertheme' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 2', 'wdstartertheme' ),
		'id' => 'footer-2',
		'description' => __( '', 'wdstartertheme' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Footer 3', 'wdstartertheme' ),
		'id' => 'footer-3',
		'description' => __( '', 'wdstartertheme' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	

	
}
add_action( 'widgets_init', 'wd_widgets_init' );
?>