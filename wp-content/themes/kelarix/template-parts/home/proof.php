<?php
/**
 * Section: Proof through industry problems (accordion + featured analytics).
 *
 * @package Kelarix
 */
$defaults = array(
	array(
		'tag'      => 'Retail',
		'title'    => 'Inventory Visibility and Store Performance System',
		'desc'     => 'We understand workflows, roles, bottlenecks, decisions, and reporting needs.',
		'tags'     => array( 'Stock visibility', 'Store performance', 'Sales reporting', 'Operational Dashboards' ),
		'stat_l'   => 'Analytics Data',
		'stat_v'   => '94.7%',
		'featured' => true,
	),
	array(
		'tag'      => 'FMCG & F&B',
		'title'    => 'Demand, Stockout, and Distributor Visibility System',
		'desc'     => 'End-to-end distribution visibility that prevents stockouts across the channel.',
		'tags'     => array(),
		'stat_l'   => 'Analytics Data',
		'stat_v'   => '91.2%',
		'featured' => false,
	),
	array(
		'tag'      => 'Financial',
		'title'    => 'Compliance and Customer Operations Workflow System',
		'desc'     => 'Automated compliance and customer operations workflows with full auditability.',
		'tags'     => array(),
		'stat_l'   => 'Analytics Data',
		'stat_v'   => '88.5%',
		'featured' => false,
	),
	array(
		'tag'      => 'Healthcare',
		'title'    => 'Healthcare Inventory and Operational Control System',
		'desc'     => 'Operational control over critical inventory across facilities.',
		'tags'     => array(),
		'stat_l'   => 'Analytics Data',
		'stat_v'   => '96.1%',
		'featured' => false,
	),
);

$posts = k_cpt_items( 'kx_proof', array() );
$items = array();
if ( ! empty( $posts ) ) {
	foreach ( $posts as $p ) {
		$items[] = array(
			'tag'      => k_field( 'tag', '', $p->ID ),
			'title'    => get_the_title( $p ),
			'desc'     => k_field( 'description', '', $p->ID ),
			'tags'     => array_filter( array_map( 'trim', explode( "\n", (string) k_field( 'tags', '', $p->ID ) ) ) ),
			'stat_l'   => k_field( 'stat_label', 'Analytics Data', $p->ID ),
			'stat_v'   => k_field( 'stat_value', '', $p->ID ),
			'featured' => (bool) k_field( 'is_featured', false, $p->ID ),
		);
	}
} else {
	$items = $defaults;
}

// Inline analytics line chart (static visual that matches the design).
$chart = '<svg class="proof-chart__svg" viewBox="0 0 320 150" preserveAspectRatio="none">'
	. '<line x1="0" y1="30" x2="320" y2="30" stroke="#e8e8ee" stroke-width="1"/>'
	. '<line x1="0" y1="80" x2="320" y2="80" stroke="#e8e8ee" stroke-width="1"/>'
	. '<line x1="0" y1="125" x2="320" y2="125" stroke="#e8e8ee" stroke-width="1"/>'
	. '<path d="M0 110 C50 105 80 112 120 100 S190 78 230 70 300 40 320 36" fill="none" stroke="#1a48ff" stroke-width="2.5"/>'
	. '<path d="M0 110 C50 105 80 112 120 100 S190 78 230 70 300 40 320 36 L320 150 L0 150 Z" fill="url(#pg)" opacity="0.12"/>'
	. '<defs><linearGradient id="pg" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#1a48ff"/><stop offset="1" stop-color="#1a48ff" stop-opacity="0"/></linearGradient></defs>'
	. '<line x1="230" y1="0" x2="230" y2="150" stroke="#1a48ff" stroke-width="1" stroke-dasharray="4 4" opacity="0.5"/>'
	. '<circle cx="230" cy="70" r="6" fill="#fff" stroke="#1a48ff" stroke-width="3"/></svg>';
?>
<section class="section proof">
	<div class="proof__bg" aria-hidden="true"></div>
	<div class="container proof__inner">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'proof_badge', 'Featured Proof' ); ?></span>
			<h2 class="section__title section__title--light">
				<?php k_html( 'proof_heading', 'Proof through industry problems, system concepts, and operating logic.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'proof_text', 'Our proof assets show how Kelarix thinks through real operational challenges and turns them into practical data driven systems.' ); ?>
			</p>
		</div>

		<div class="proof__list" data-accordion>
			<?php foreach ( $items as $it ) :
				$is_open = ! empty( $it['featured'] );
				?>
				<div class="proof-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="proof-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="proof-item__tag"><?php echo esc_html( $it['tag'] ); ?></span>
						<span class="proof-item__title"><?php echo esc_html( $it['title'] ); ?></span>
						<span class="proof-item__toggle" aria-hidden="true"></span>
					</button>
					<div class="proof-item__body">
						<div class="proof-item__grid">
							<div class="proof-item__content">
								<p class="proof-item__desc"><?php echo esc_html( $it['desc'] ); ?></p>
								<?php if ( ! empty( $it['tags'] ) ) : ?>
									<div class="proof-item__chips">
										<?php foreach ( $it['tags'] as $t ) : ?>
											<span class="chip"><?php echo esc_html( $t ); ?></span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
							<?php if ( ! empty( $it['stat_v'] ) ) : ?>
								<div class="proof-analytics">
									<div class="proof-analytics__head">
										<span class="proof-analytics__label"><?php echo esc_html( $it['stat_l'] ); ?></span>
										<span class="proof-analytics__dots">&#8942;</span>
									</div>
									<div class="proof-analytics__value"><?php echo esc_html( $it['stat_v'] ); ?></div>
									<div class="proof-chart">
										<div class="proof-chart__axis"><span>100%</span><span>60%</span><span>40%</span></div>
										<?php echo $chart; // phpcs:ignore ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="proof__cta">
			<?php k_button( 'proof_cta', 'Explore Proof', '#', 'btn btn--white btn--sm' ); ?>
		</div>
	</div>
</section>
