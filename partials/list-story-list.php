<?php
/** 
 * Summary
 *
 * Description.
 *
 * @link  URL
 * @since x.x.x
 *
 * @package    {WordPress}
 * @subpackage {Component} 
 */

function sng_get_list_content() {
	$content = '';

	if( have_rows('list_step') ) : while( have_rows('list_step') ): the_row();
		// vars
		$title = get_sub_field('step_title');
		$image = get_sub_field('step_image');
		$content .= '<div class="list-step">';
		$content .= '<h3>' . __( $title ) . '</h3>';
		if ( $description = get_sub_field('step_description') ) {
			$content .= __( $description );
		}
		if ( $image = get_sub_field('step_image') ) {
			$content .= '<div id="attachment_' . __( $image['id'] ) . '" class="wp-caption aligncenter">';
			$content .= '<a href="' . __( $image['url'] ) . '"><img title="' . __( $image['title'] ) . '" class="step-image wp-image-' . __( $image['id'] ) . '" src="' . __( $image['url'] ) . '" alt="' . __( $image['alt'] ) . '" /></a>';
			$content .= '<p class="wp-caption-text">' . __( $image['caption'] ) . '</p>';
			$content .= '</div>';
		}
		$content .= '</div>';
	endwhile;
	endif;

	return $content;
}