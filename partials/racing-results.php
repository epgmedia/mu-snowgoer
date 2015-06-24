<?php
/** 
 * Racing Results Box
 *
 * @since 0.1.0
 *
 * @package WordPress
 */
?>
<aside class="racing-stats-box">
	<h2 class="racing-stats-header">Results</h2>
	<div class="racing-stats-body">
		<h3><?php the_field( 'race_name_of_circuit' ); ?></h3>
		<!-- Information -->
		<ul>
		<?php if ( $race_location = get_field( 'race_location' ) ) { ?>
			<li><?php _e( $race_location ); ?></li>
		<?php } ?>
		<?php if ( $race_date = get_field( 'race_date' ) ) { ?>
			<li><?php _e( $race_date ); ?></li>
		<?php } ?>
		<?php $racer_id = get_field( 'race_type_of_racing' );
		if ( $race_type = get_term( $racer_id, 'racing-type' ) ) { ?>
			<li><a href="<?php _e( get_term_link( $race_type ) ); ?>"><?php _e( $race_type->name ); ?></a></li>
		<?php } ?>
		</ul>
		<?php if( have_rows( 'race_results' ) ) : ?>
			<ul class="race-results">
				<!-- Results -->
				<?php while( have_rows( 'race_results' ) ) : the_row();
					if ( $race_class = get_sub_field('race_class') ) {
						echo '<h3>' . __( $race_class ) . '</h3>';
					}
					if( have_rows( 'race_finishing_order' ) ): ?>
						<ol>
							<!-- Race -->
						<?php while( have_rows( 'race_finishing_order' ) ) : the_row();
							$racer_id = get_sub_field( 'racer_racer' );
							if ( $racer_term = get_term( $racer_id, 'post_tag' ) ) { ?>
								<li><a href="<?php _e( get_term_link( $racer_term ) ); ?>"><?php _e( $racer_term->name ); ?></a>,
								<?php
								$racer_manu = get_sub_field( 'racer_manufacturer' );
								if ( $racer_manu_term = get_term( $racer_manu, 'brands' ) ) { ?>
									<a href="<?php _e( get_term_link( $racer_manu_term ) ); ?>"><?php _e( $racer_manu_term->name ); ?></a>
								<?php } ?>
								</li>
							<?php } ?>
						<?php endwhile;
						echo '</ol>';
					endif;
				endwhile;
			echo '</ul>';
		endif; ?>
	</div>
</aside>
