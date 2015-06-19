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

$sled_brand = get_field('sled_brand');
$sled_class = get_field( 'sled_class' );

?>
<aside class="snowmobile-stats-box">
	<h2 class="stats-header">SPECS</h2>
	<div class="snowmobile-stats">
		<h3><?php _e( $sled_brand->name . '<br />' . get_field( 'sled_model' ) ); ?></h3>
		<dl>
			<?php if( $sled_brand ) :
				$sled_brand_url = get_term_link( $sled_brand ); ?>
				<dt>Brand</dt>
				<dd><a href="<?php echo esc_url( $sled_brand_url ); ?>"><?php _e( $sled_brand->name ); ?></a></dd>
			<?php endif; ?>
			<dt>Model</dt>
			<dd><?php the_field( 'sled_model' ); ?></dd>
			<?php if( $sled_class ) :
				$sled_class_url = get_term_link( $sled_class ); ?>
				<dt>Class</dt>
				<dd><a href="<?php echo esc_url( $sled_class_url ); ?>"><?php _e( $sled_class->name ); ?></a></dd>
			<?php endif; ?>
			<dt>Engine</dt>
			<dd><?php the_field( 'sled_engine' ); ?></dd>
			<dt>Front Suspension</dt>
			<dd><?php the_field( 'sled_front_suspension' ); ?></dd>
			<dt>Rear Suspension</dt>
			<dd><?php the_field( 'sled_rear_suspension' ); ?></dd>
			<dt>Track</dt>
			<dd><?php the_field( 'sled_track' ); ?></dd>
			<dt>MSRP</dt>
			<dd>$<?php the_field( 'sled_msrp' ); ?></dd>
		</dl>
	</div>
</aside>
