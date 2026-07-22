<?php
/**
 * What We Build: Built for Business Reality (split + accordion).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Business first', 'We start from the business problem, not the technology stack.' ),
	2 => array( 'Data clarity', 'We work with structured, reliable data models that leadership can trust.' ),
	3 => array( 'Workflow realism', 'Systems are designed around real teams and how work actually happens.' ),
	4 => array( 'Documentation discipline', 'Every system is documented so it can be maintained and improved.' ),
	5 => array( 'Scalable foundations', 'We avoid quick fixes that break down as the business grows.' ),
);
?>
<section class="section section--accent ww-discipline discipline">
	<div class="container discipline__inner">
		<div class="discipline__aside">
			<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'ww_disc_badge', 'Delivery Principles' ); ?></span>
			<h2 class="section__title section__title--light">
				<?php k_html( 'ww_disc_heading', 'Built for business reality.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'ww_disc_text', 'Kelarix engineers systems around the operating context of the business — data pipelines, workflows, execution, and improvement — designed to grow with the business.' ); ?>
			</p>
		</div>

		<div class="discipline__list" data-accordion>
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$item    = k_field( 'ww_disc_item_' . $i, array() );
				$title   = ! empty( $item['title'] ) ? $item['title'] : $defaults[ $i ][0];
				$text    = ! empty( $item['text'] ) ? $item['text'] : $defaults[ $i ][1];
				$is_open = ( 1 === $i );
				?>
				<div class="disc-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="disc-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="disc-item__icon"><?php echo k_icon( 'workflow' ); ?></span>
						<span class="disc-item__main">
							<span class="disc-item__title"><?php echo esc_html( $title ); ?></span>
							<span class="disc-item__text"><?php echo esc_html( $text ); ?></span>
						</span>
						<span class="disc-item__toggle" aria-hidden="true"></span>
					</button>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
