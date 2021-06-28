<?php 
// Posttype Chunks

add_action( 'init', 'create_posttype_web_chunks' );

	function create_posttype_web_chunks() {
		 register_post_type(
	    	'chunks',
	    	array(
	    		'labels' => array(
	    			'name' => __('Chunks', 'web-chunks'),
	    			'singular_name' => __('Chunks', 'web-chunks')
	    		),
	    		'public' => true,
	    		'publicly_queryable' => false,
	    		'menu_icon' => 'dashicons-format-gallery',
	    		'supports' => array(
	    			'title',
	    			'editor',
	    			'thumbnail',
	    			'page-attributes'
	    		),
	    		'show_in_rest' => true,
	    		'rewrite' => array(
	    			'slug' => 'chunks'
	    		),
	    	)
	    );
	}

function posttype_function_web_chunks() {
	create_posttype_web_chunks();
}