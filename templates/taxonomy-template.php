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
include $sng_plugin_dir . '/partials/header.php';
global $wp_query;
$term = $wp_query->queried_object;
?>
<div class="page-head">
	<?php if ( have_posts() ) the_post(); ?>
	<h2 class="page-title"><?php _e( $term->name ); ?></h2>
	<div class="stripe-line"></div>
</div>
<?php
rewind_posts();
get_template_part( 'loop', 'archive' );	?>
<?php if ( $wp_query->max_num_pages > 1 ) tie_pagenavi(); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
