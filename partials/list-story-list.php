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

if( have_rows('list_step') ) : while( have_rows('list_step') ): the_row();
	// vars
	$title = get_sub_field('step_title');
	$image = get_sub_field('step_image');
	?>
	<div class="list-step">
		<h3><?php _e( $title ); ?></h3>
		<?php if ( $description = get_sub_field('step_description') ) {
			_e( $description );
		}
		if ( $image = get_sub_field('step_image') ) : ?>
		<div id="attachment_<?php _e( $image['id'] ); ?>" class="wp-caption aligncenter">
			<a href="<?php _e( $image['url'] ); ?>"><img title="<?php _e( $image['title'] ); ?>" class="step-image wp-image-<?php _e( $image['id'] ); ?>" src="<?php _e( $image['url'] ); ?>" alt="<?php echo $image['alt'] ?>" /></a>
			<p class="wp-caption-text"><?php _e( $image['caption'] ); ?></p>
		</div>
		<?php endif; ?>
	</div>

<?php endwhile; endif; ?>