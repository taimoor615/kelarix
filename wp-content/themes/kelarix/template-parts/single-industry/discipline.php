<?php
/**
 * Single Industry: Built with the discipline (split + 7-item accordion).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Business first discovery', 'We start from the retail operating problem before choosing technology.' ),
	2 => array( 'Consistent metric definitions', 'Every metric has a shared meaning across stores, channels, and reports.' ),
	3 => array( 'Reliable and traceable data', 'Data flows are documented, structured, and easy to audit.' ),
	4 => array( 'Role-based access', 'Interfaces reflect the roles that use them — store, region, category, central.' ),
	5 => array( 'Workflow ownership visibility', 'Every process has a clear owner and next action.' ),
	6 => array( 'Responsible automation', 'Automation supports people; critical decisions keep human review.' ),
	7 => array( 'Confidentiality and discipline', 'Sensitive client work, workflows, and business context stay protected.' ),
	8 => array( 'Maintainable systems', 'Every system is built so it can be maintained and improved.' ),
);
?>
<section class="section section--accent sind-discipline discipline">
	<div class="container discipline__inner">
		<div class="discipline__aside">
			<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'sind_disc_badge', 'Delivery Principles' ); ?></span>
			<h2 class="section__title section__title--light">
				<?php k_html( 'sind_disc_heading', 'Built with the<br>discipline fast-<br>moving operations<br>require.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'sind_disc_text', 'Retail systems affect inventory, revenue, margin, customer trust, and daily execution. That requires calm engineering, business first thinking, and clarity.' ); ?>
			</p>
		</div>

		<div class="discipline__list" data-accordion>
			<?php for ( $i = 1; $i <= 8; $i++ ) :
				$item    = k_field( 'sind_disc_item_' . $i, array() );
				$title   = ! empty( $item['title'] ) ? $item['title'] : $defaults[ $i ][0];
				$text    = ! empty( $item['text'] ) ? $item['text'] : $defaults[ $i ][1];
				$icon    = ! empty( $item['icon'] ) ? $item['icon'] : 'workflow';
				$is_open = ( 1 === $i );
				?>
				<div class="disc-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="disc-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="disc-item__icon"><?php echo k_icon( $icon ); ?></span>
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
