<?php
/**
 * Single Page Template
 *
 * Description.
 *
 * @link  URL
 * @since x.x.x
 *
 * @package    {WordPress}
 * @subpackage {Component}
 */

include $sng_plugin_dir . '/partials/header.php';

if ( ! have_posts() ) {
	include $sng_plugin_dir . '/partials/content-none.php';
}

while ( have_posts() ) :
	the_post();
	$get_meta = get_post_custom($post->ID);
	if ( ! empty( $get_meta[ 'tie_review_position' ][ 0 ] ) ) {
		$review_position = $get_meta['tie_review_position'][0] ;
		$rv = $tie_reviews_attr;
	}
	$post_width = $get_meta[ 'tie_sidebar_pos' ][ 0 ];
	if ( $post_width == 'full' ) {
		if ( tie_get_option( 'columns_num' ) == '2c' ) {
			$content_width = 955;
		} else {
			$content_width = 1160;
		}
	}
	//Above Post Banner
	if ( empty( $get_meta[ 'tie_hide_above' ][ 0 ] ) ) {
		if( ! empty( $get_meta[ 'tie_banner_above' ][ 0 ] ) ) {
			echo '<div class="ads-post">' . htmlspecialchars_decode( $get_meta[ 'tie_banner_above' ][ 0 ] ) . '</div>';
		} else {
			tie_banner( 'banner_above', '<div class="ads-post">', '</div>' );
		}
	}
	?>

	<article <?php if( !empty( $rv['review'] ) ) echo $rv['review']; post_class('post-listing'); ?>>
		<?php get_template_part( 'includes/post-head' ); // Get Post Head template ?>
		<div class="post-inner">

			<?php include $sng_plugin_dir . '/partials/content-' . get_post_type() . '.php'; ?>

		</div><!-- .post-inner -->
	</article><!-- .post-listing -->

	<?php
	if( tie_get_option( 'post_tags' ) ) {
		the_tags( '<p class="post-tag">'.__( 'Tagged with: ', 'tie' )  ,' ', '</p>');
	}

	//Below Post Banner
	if( empty( $get_meta[ 'tie_hide_below' ][ 0 ] ) ) {
		if ( ! empty( $get_meta[ 'tie_banner_below' ][ 0 ] ) ) {
			echo '<div class="ads-post">' . htmlspecialchars_decode( $get_meta[ 'tie_banner_below' ][ 0 ]) . '</div>';
		} else {
			tie_banner( 'banner_below', '<div class="ads-post">', '</div>' );
		}
	}

	if ( tie_get_option( 'post_nav' ) ) : ?>
		<div class="post-navigation">
			<div class="post-previous">
				<?php previous_post_link( '%link', '<span>' . __( 'Previous:', 'tie' ) . '</span> %title' ); ?>
			</div>
			<div class="post-next">
				<?php next_post_link( '%link', '<span>' . __( 'Next:', 'tie' ) . '</span> %title' ); ?>
			</div>
		</div><!-- .post-navigation -->
	<?php endif;

	if ( ( tie_get_option( 'post_authorbio' ) && empty( $get_meta[ 'tie_hide_author' ][ 0 ] ) ) || ( isset( $get_meta[ 'tie_hide_related' ][ 0 ] ) && $get_meta[ 'tie_hide_author' ][ 0 ] == 'no' ) ) : ?>
		<section id="author-box">
			<div class="block-head">
				<h3><?php _e( 'About', 'tie' ) ?> <?php the_author() ?> </h3>
			</div>
			<div class="post-listing">
				<?php tie_author_box() ?>
			</div>
		</section><!-- #author-box -->
	<?php endif;

	// Get Related Posts template
	get_template_part( 'includes/post-related' );

endwhile;

include $sng_plugin_dir . '/partials/footer.php';