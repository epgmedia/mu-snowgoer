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

$post_meta['gear_brand'] = get_field('gear_brand');
$post_meta['gear_product_name'] = get_field('gear_product_name');
$post_meta['gear_msrp'] = get_field('gear_msrp');
$post_meta['gear_address'] = get_field('gear_address');
$post_meta['gear_website'] = get_field('gear_website');

$gear_website_parts = parse_url( $post_meta['gear_website'] );
?>
<h1 class="name post-title entry-title" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></h1>

<?php get_template_part( 'includes/post-meta' ); // Get Post Meta template ?>
<div class="entry">
	<?php
	if ( ! empty( $review_position ) && ( $review_position == 'top' || $review_position == 'both'  ) )  {
		tie_get_review('review-top');
	}

	the_content(); ?>

	<aside class="gear-box" vocab="http://schema.org/" typeof="Product">
		<div class="gear-box-header">
			<h2 itemprop="name" ><?php _e( $post_meta['gear_product_name'] ); ?></h2>
		</div>
		<div class="gear-image">
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail( 'thumbnail' );
			} ?>
		</div>
		<dl class="gear-stats">
		<?php if ( ! empty( $post_meta['gear_brand'] ) ) {
			$gear_brand = get_term( $post_meta['gear_brand'], 'brands' );
			$gear_brand_link = get_term_link( $gear_brand );
			?>
			<dt><strong>Brand:</strong></dt>
			<dd><span property="brand"><a href="<?php _e( esc_url( $gear_brand_link ) ); ?>"><?php _e( $gear_brand->name ); ?></a></span></dd>
		<?php } ?>
			<dt><strong>Product:</strong></dt>
			<dd><span property="name"><?php _e( $post_meta['gear_product_name'] ); ?></span></dd>
		<?php if( ! empty( $post_meta['gear_address'] ) ) : ?>
			<dt><strong>Address:</strong></dt>
			<dd><a href="https://google.com/maps/?q=<?php _e( $post_meta['gear_address']['address'] ); ?>" target="_blank"><?php _e( $post_meta['gear_address']['address'] ); ?></a></dd>
			<dt><strong>MSRP:</strong></dt>
			<dd>$<?php _e( $post_meta['gear_msrp'] ); ?></dd>
			<dt><strong>Website:</strong></dt>
			<dd><span property="url"><a href="<?php _e( $post_meta['gear_website'] )?>" target="_blank"><?php _e( $gear_website_parts['host'] ); ?></a></span></dd>
		<?php endif; ?>
		</dl>
	</aside>

	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tie' ), 'after' => '</div>' ) );

	if( ! empty( $review_position ) && ( $review_position == 'bottom' || $review_position == 'both' ) ) {
		tie_get_review('review-bottom');
	}

	edit_post_link( __( 'Edit', 'tie' ), '<span class="edit-link">', '</span>' ); ?>

</div><!-- .entry /-->

<?php the_tags( '<span style="display:none">',' ', '</span>'); ?>
<span style="display:none" class="updated"><?php the_time( 'Y-m-d' ); ?></span>

<?php if ( get_the_author_meta( 'google' ) ) { ?>
	<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person">
		<strong class="fn" itemprop="name"><a href="<?php the_author_meta( 'google' ); ?>?rel=author">+<?php echo get_the_author(); ?></a></strong>
	</div>
<?php } else { ?>
	<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person">
		<strong class="fn" itemprop="name"><?php the_author_posts_link(); ?></strong>
	</div>
<?php }
// Get Share Button template
if ( ( tie_get_option( 'share_post' ) && empty( $get_meta[ "tie_hide_share" ][ 0 ] ) ) || $get_meta[ "tie_hide_share" ][ 0 ] == 'no' ) {
	get_template_part( 'includes/post-share' );
}