<?php 

/* -------------------------------------- */
function web_chunk_img() {

	if ( has_post_thumbnail() ) {
		if( get_field('billede_som_baggrund') ) {

	    $link = get_field('link');
	    
		if( $link ) {
			$link_url = $link['url'];
			$link_target = $link['target'] ? $link['target'] : '_self';

			echo '<div class="web-chunk-img img-zoom">';
				echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">';
	        		the_post_thumbnail();
	        	echo '</a>';
	        echo '</div>';

		} else {
			echo '<div class="web-chunk-img">';
	        	the_post_thumbnail();
	        echo '</div>';
		}
	}
}

}

/* -------------------------------------- */

function web_chunk_baggrund() {
	
		if( !get_field('billede_som_baggrund') && !get_field('tekstfarve') ) {
			 	return 'style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(),'full') . ');"';
		}
		if( !get_field('billede_som_baggrund') && get_field('tekstfarve') ) {
			 	return 'style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(),'full') . '); color:' . get_field('tekstfarve') . '"';
		}
		if( get_field('baggrundsfarve') && get_field('tekstfarve') ) {
			 	return 'style="background-color:' . get_field('baggrundsfarve') . '; color:' . get_field('tekstfarve') . '"';
		}
	
}

/* -------------------------------------- */
function web_chunk_link() {
	$link = get_field('link');
	if( $link ): 
    	$link_url = $link['url'];
    	$link_title = $link['title'];
    	$link_target = $link['target'] ? $link['target'] : '_self';

    	echo '<p class="read-more"><a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a></p>';
endif; 
}

/* -------------------------------------- */

function web_chunk_fakta() {

if( have_rows('fakta') ):
	echo '<ul class="web-chunk-fakta">';
    // Loop through rows.
    while( have_rows('fakta') ) : the_row();

        $sub_label = get_sub_field('label');
        $sub_item = get_sub_field('item');
        $sub_class = get_sub_field('custom_class');

        if ( $sub_label ) {
        	$label = '<span class="web-chunk-label">' . $sub_label . ':</span>';
    	} else {
    		$label = '';
    	}

         echo '<li class="' . $sub_class . '">' . $label . $sub_item . '</li>';

    endwhile;
    echo '</ul>';
endif;
}

/* -------------------------------------- */
/* -------------------------------------- */

function web_chunks_content() {
	echo '<div class="chunk-item-content">';
	if( get_field('title') == 'Vis' ) {
    	the_title('<h4 class="widget-title before-img">', '</h4>');
		web_chunk_img();
	}
	else if( get_field('title') == 'Under billede' ) {
    	
		web_chunk_img();
		the_title('<h4 class="widget-title after-img">', '</h4>');
	}
	else {
		web_chunk_img();
		
	}
	
		the_content();
		web_chunk_link();
		web_chunk_fakta();
	
		edit_post_link( __( 'Edit', 'web-chunks' ));
	echo '</div>';
}