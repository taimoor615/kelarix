<?php
/**
 * Proof: Case Studies accordion (first item Retail expanded with analytics).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array(
		'tag'         => 'Retail',
		'title'       => 'Inventory Visibility and Store Performance System',
		'explores'    => "Store performance visibility\nInventory movement\nReturns and refund workflows\nSales reporting\nLeadership dashboards",
		'proves'      => 'Kelarix understands how retail leaders need to see stock, sales, store performance, customer behaviour, returns, and operational exceptions in one clearer operating view.',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '94.7%',
		'is_featured' => true,
	),
	2 => array(
		'tag'         => 'FMCG & F&B',
		'title'       => 'Demand, Stockout, and Distributor Visibility System',
		'explores'    => '',
		'proves'      => '',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '91.2%',
		'is_featured' => false,
	),
	3 => array(
		'tag'         => 'Financial',
		'title'       => 'Compliance and Customer Operations Workflow System',
		'explores'    => '',
		'proves'      => '',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '88.5%',
		'is_featured' => false,
	),
	4 => array(
		'tag'         => 'Healthcare',
		'title'       => 'Healthcare Inventory and Operational Control System',
		'explores'    => '',
		'proves'      => '',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '96.1%',
		'is_featured' => false,
	),
);
?>
<section class="section proof-cases">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'cases_badge', 'Case Studies' ); ?></span>
			<h2 class="section__title proof-cases__title">
				<?php k_html( 'cases_heading', 'Scenario based proof built around real<br>industry pressure.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'cases_text', 'These assets are not fake client case studies. They are scenario based proof assets built around realistic industry problems, operating patterns, and system opportunities.' ); ?>
			</p>
		</div>

		<div class="proof-cases__list" data-accordion>
			<?php foreach ( $defaults as $i => $item ) :
				$is_open = ! empty( $item['is_featured'] );
				?>
				<div class="pcase <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="pcase__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="pcase__tag"><?php echo esc_html( $item['tag'] ); ?></span>
						<span class="pcase__title"><?php echo esc_html( $item['title'] ); ?></span>
						<span class="pcase__toggle" aria-hidden="true"></span>
					</button>
					<?php if ( $is_open ) : ?>
						<div class="pcase__body">
							<div class="pcase__grid">
								<div class="pcase__col">
									<h4 class="pcase__sub">WHAT IT EXPLORES</h4>
									<div class="pcase__chips">
										<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $item['explores'] ) ) ) as $chip ) : ?>
											<span class="chip"><?php echo esc_html( $chip ); ?></span>
										<?php endforeach; ?>
									</div>
									<h4 class="pcase__sub">WHAT IT PROVES</h4>
									<p class="pcase__desc"><?php echo esc_html( $item['proves'] ); ?></p>
									<a href="#" class="btn btn--ghost btn--sm"><span>Explore</span><?php echo k_arrow(); ?></a>
								</div>
								<div class="pcase__col">
									<div class="proof-analytics">
										<div class="proof-analytics__head">
											<span class="proof-analytics__label"><?php echo esc_html( $item['stat_label'] ); ?></span>
											<span class="proof-analytics__dots">···</span>
										</div>
										<div class="proof-analytics__value"><?php echo esc_html( $item['stat_value'] ); ?></div>
										<div class="proof-chart">
											<div class="proof-chart__axis"><span>100%</span><span>60%</span><span>40%</span><span>20%</span></div>
											<svg class="proof-chart__svg" viewBox="0 0 400 130" preserveAspectRatio="none">
												<defs>
													<linearGradient id="pc-grad" x1="0" x2="0" y1="0" y2="1">
														<stop offset="0" stop-color="#1a48ff" stop-opacity=".22"/>
														<stop offset="1" stop-color="#1a48ff" stop-opacity="0"/>
													</linearGradient>
												</defs>
												<path d="M0 100 Q80 70 160 80 T320 40 T400 45 L400 130 L0 130 Z" fill="url(#pc-grad)"/>
												<path d="M0 100 Q80 70 160 80 T320 40 T400 45" fill="none" stroke="#1a48ff" stroke-width="2" stroke-dasharray="3 3"/>
												<circle cx="320" cy="42" r="5" fill="#fff" stroke="#1a48ff" stroke-width="2"/>
											</svg>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="proof-cases__cta">
			<?php k_button( 'cases_cta', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' ); ?>
		</div>
	</div>
</section>
