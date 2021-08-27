<?php
/* -------------------------------------- */
/* -------------------------------------- */
add_shortcode('chunks', 'web_chunks');
function web_chunks($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(array('grid' => 'g-d-3', 'gap' =>'gap-2', 'type' => 'none', 'class' => 'no-class', 'display' => 'normal', 'wrap' =>'none-wrap', 'card' => 'no-card' ), $atts));


/* -------------------------------------- */

    $loop = new WP_Query( array(
        'post_type' => 'chunks',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array(
        array (
            'taxonomy' => 'web_chunk_type',
            'field' => 'slug',
            'terms' => $type,
        )
    ),
    )
);

/* -------------------------------------- */

if ( $loop->have_posts() ) {
    if (  $display != 'banner' && $display != 'parallax') {
	   echo '<div class="grid ' . $wrap . ' ' . $gap . ' ' . $grid . ' ' . $type . ' ' . $class . '">';
    } else {
        echo '<div class="chunk-banner ' .  $display . ' ' . $class . '">';
    }

	while ( $loop->have_posts() ) : $loop->the_post();

        if( !get_field('billede_som_baggrund') && has_post_thumbnail() ) {
		  echo '<div id="chunk-id-' . get_the_ID() . '" class="chunk-item' . web_chunk_custom_class() . ' chunk-item-bg-image"' . web_chunk_baggrund() . '>';
        } 
else if(  get_field('baggrundsfarve') ) {
          echo '<div id="chunk-id-' . get_the_ID() . '" class="chunk-item' . web_chunk_custom_class() . ' chunk-item-bg-color"' . web_chunk_baggrund_color() . '>';
        }
        else {
            echo '<div id="chunk-id-' . get_the_ID() . '" class="chunk-item' . web_chunk_custom_class() . '">';
        }
            web_chunks_content();

        echo '</div>';

    endwhile; wp_reset_query();
    echo '</div>';
}

    $myvariable = ob_get_clean();
    return $myvariable;
}
/* -------------------------------------- */
/* -------------------------------------- */


/* -------------------------------------- */
/* -------------------------------------- */
add_shortcode('chunks-id', 'web_chunks_id');
function web_chunks_id($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(array('grid' => 'g-d-3', 'gap' =>'gap-2', 'postid' => '1', 'class' => 'no-class', 'display' => 'normal', 'wrap' =>'none-wrap' ), $atts));

    $id_array = explode(',', $postid);

/* -------------------------------------- */

    $loop = new WP_Query( array(
        'post_type' => 'chunks',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'orderby' => 'post__in',
        'post__in' => $id_array,
    )
);

/* -------------------------------------- */

if ( $loop->have_posts() ) {

    if ( $display != 'banner' && $display != 'parallax') {
       echo '<div class="grid ' . $wrap . ' ' . $gap . ' ' . $grid . ' ' . $class . '">';
    } else {
        echo '<div class="grids ' .  $display . '">';
    }

    while ( $loop->have_posts() ) : $loop->the_post();

        if( !get_field('billede_som_baggrund') && has_post_thumbnail() ) {
          echo '<div id="chunk-id-' . get_the_ID() . '" class="chunk-item chunk-item-bg"' . web_chunk_baggrund() . '>';
        } else {
            echo '<div id="chunk-id-' . get_the_ID() . '" class="chunk-item">';
        }
            web_chunks_content();
        echo '</div>';

    endwhile; wp_reset_query();
    echo '</div>';
}

    $myvariable = ob_get_clean();
    return $myvariable;
}
/* -------------------------------------- */
/* -------------------------------------- */