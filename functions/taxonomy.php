<?php
// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'web_chunks_create_events_custom_taxonomy', 0 );

//create a custom taxonomy name it "type" for your posts
function web_chunks_create_events_custom_taxonomy() {

  $labels = array(
    'name' => _x( 'Chunk Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Chunk Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Søg Chunk Type' ),
    'all_items' => __( 'Alle Chunks Typer' ),
    'parent_item' => __( 'Parent Chunk Type' ),
    'parent_item_colon' => __( 'Parent Chunk Type:' ),
    'edit_item' => __( 'Ret Chunk Type' ),
    'update_item' => __( 'Updater Chunk Type' ),
    'add_new_item' => __( 'Tilføj ny Chunk Type' ),
    'new_item_name' => __( 'Ny Chunk Type navn' ),
    'menu_name' => __( 'Typer' ),
  );

  register_taxonomy('web_chunk_type',array('chunks'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'publicly_queryable' => false,
    'show_in_rest' => true,
    'rewrite' => array( 'slug' => 'chunk-type' ),
  ));
}