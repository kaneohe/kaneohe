<?php
function kaneohe_button() {

    $content = '';

    $link = false;

    if ( 'internal' == get_sub_field( 'type' ) ) {
        $href = get_sub_field( 'internal' );
        $link = true;
    }
    elseif ( 'external' == get_sub_field( 'type' ) ) {
        $href = get_sub_field( 'external' );
        $link = true;
    }

    if ( $link ) {
        $content .= '<a href="' . $href .  '" class="button primary">' . get_sub_field( 'label' ) . '</a>';
    }
    else {
        $hash = hash( 'ripemd160', get_sub_field( 'modal' ) );
        $modal = '';

        if ( 'modal' == get_sub_field( 'type' ) ) {
            $modal = '<div class="reveal" id="' . $hash . '" data-reveal>';
            $modal .= get_sub_field( 'modal' );
            $modal .= '<button class="close-button" data-close aria-label="Close modal" type="button">';
            $modal .= '<span aria-hidden="true">&times;</span>';
            $modal .= '</button>';
            $modal .= '</div>';
        }

        $content .= '<button type="button" class="button primary"';
        if ( $modal != '' ) {
            $content .= ' data-open="' . $hash . '"';
        }
        $content .= '>' . get_sub_field( 'label' ) . '</button>';
        if ( $modal != '' ) {
            $content .= $modal;
        }
    }
    return $content;
}

function kaneohe_media_object() {

    $content = '<section class="kaneohe-media-object">';
    $content .= '	<div class="row">';
    $content .= '		<div class="small-12 columns">';
    $content .= '			<div class="media-object">';
    $content .= '				<div class="row">';
    $content .= '					<div class="small-12 medium-6 columns">';
    if ( get_sub_field( 'media_type' ) == 'image' && $img = get_sub_field( 'image' ) ) :
        $content .= '						<div class="media-object-section">';
        $content .= '							<img src="' . $img['url'] . '">';
        $content .= '						</div> <!-- .media-object-section -->';
    elseif ( get_sub_field( 'media_type' ) == 'youtube' && get_sub_field('youtube') ) :
        //$content .= '<div class="embed-container">';
        $oembed = get_sub_field( 'youtube' );
        $content .= $oembed;
        //$content .= '</div>';

    endif;
    $content .= '					</div> <!-- .small-12 -->';
    $content .= '					<div class="small-12 medium-6 columns">';
    $content .= '						<div class="media-object-section">';
    $content .= '							<h4>' . get_sub_field( 'heading' ) . '</h4>';
    $content .= 							get_sub_field( 'content' );
    $content .= '						</div> <!-- .media-object-section -->';
    $content .= '					</div> <!-- .small-12 -->';
    $content .= '				</div><!-- .row -->';
    $content .= '			</div> <!-- .media-object -->';
    $content .= '		</div> <!-- .small-12 -->';
    $content .= '	</div> <!-- .row -->';
    $content .= '</section>';

    return $content;
}

function kaneohe_image() {
    $content = '';
    if ( $img = get_sub_field( 'image' ) ) :

        $content .= '<img src="' . $img['url'] . '">';

    endif;

    return $content;
}

function kaneohe_slideshow() {
    $content = '';
    $num_slides = get_sub_field( 'slides' );
    $column_class = 'small-4 columns';
    switch ( $num_slides ) {
        case 1 : $column_class = 'small-12 columns'; break;
        case 2 : $column_class = 'small-6 columns'; break;
        case 3 : $column_class = 'small-4 columns'; break;
        case 4 : $column_class = 'small-3 columns'; break;
        case 6 : $column_class = 'small-2 columns'; break;
        case 12 : $column_class = 'small-1 columns'; break;
        default : break;
    }

    if ( have_rows( 'slide' ) ) :

        $content .= '<section class="kaneohe-gallery">';
        $content .= '<div class="row">';
        $content .= '<div class="slideshow">';

        while ( have_rows( 'slide' ) ) : the_row();

            $photo = get_sub_field( 'photo' );
            $content .= '<div class="' . $column_class . '">';

            $link_before = '';
            $link_after = '';
            if ( get_sub_field( 'image_link' ) ) {
                switch ( get_sub_field( 'image_link' ) ) {

                    case 'internal' :
                        $link_before = '<a href="' . get_sub_field( 'link' ) . '">';
                        $link_after = '</a>';
                        break;
                    case 'external' :
                        $link_before = '<a href="' . get_sub_field( 'external_link' ) . '" target="_blank">';
                        $link_after = '</a>';
                        break;
                    case 'none' :
                    default :
                        break;
                }
            }

            $content .= $link_before;

            $content .= '<img src="' . $photo['url'] . '" alt="' . $photo['alt'] . '" />';

            $content .= $link_after;

            //$content .= '<p>' . $image['caption'] . '</p>';
            $content .= '</div>';

        endwhile;

        $content .= '</div><!-- .slidshow -->';
        $content .= '</div><!-- .row -->';
        $content .= '</section>';


    endif;

    return $content;
}

function kaneohe_gallery() {
    $content = '';
    $gallery = get_sub_field( 'gallery' );

    if ( $gallery ) :

        $content .= '<section class="kaneohe-gallery">';
        $content .= '<div class="row">';
        $content .= '<div class="small-6 medium-3 columns">';
        foreach ( $gallery as $image ) :
            $content .= '<a href="' . $image['url'] . '">';
            $content .= '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '" />';
            $content .= '</a>';
            //$content .= '<p>' . $image['caption'] . '</p>';
        endforeach;
        $content .= '</div>';
        $content .= '</div><!-- .row -->';
        $content .= '</section>';

    endif;

    return $content;
}

function kaneohe_text() {
    $content = '';

    if ( get_sub_field( 'columns' ) ) :

        $content .= '<section class="kaneohe-text">';
        $content .= '<div class="row">';

        switch ( get_sub_field( 'columns' ) ) {

            case '1' :

                $content .= '<div class="small-12 columns">';
                $content .= get_sub_field('column_1');
                $content .= '</div>';
                break;

            case '2' :
                $content .= '<div class="small-12 medium-6 columns">';
                $content .= get_sub_field('column_1');
                $content .= '</div>';
                $content .= '<div class="small-12 medium-6 columns">';
                $content .= get_sub_field('column_2');
                $content .= '</div>';
                break;

            case '3' :
                $content .= '<div class="small-12 medium-4 columns">';
                $content .= get_sub_field('column_1');
                $content .= '</div>';
                $content .= '<div class="small-12 medium-4 columns">';
                $content .= get_sub_field('column_2');
                $content .= '</div>';
                $content .= '<div class="small-12 medium-4 columns">';
                $content .= get_sub_field('column_2');
                $content .= '</div>';
                break;

        }

        $content .= '</div><!-- .row -->';
        $content .= '</section>';

    else :

        $content .= get_sub_field('text');

    endif;

    return $content;
}
