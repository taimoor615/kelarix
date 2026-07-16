<?php
/**
 * Industries: Industry Focus accordion (first item expanded with analytics panel).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array(
		'tag'         => 'Retail',
		'title'       => 'Retail visibility systems for stores, stock, customers, and performance.',
		'pressure'    => 'Retail leaders need clear visibility across sales, inventory, customers, and channels, but growth often scatters data across multiple tools.',
		'challenges'  => "Stores are hard to compare\nInventory visibility is limited\nReturns add complexity\nMaking trends and gaps harder to spot\nSales, margin, and customer data stay disconnected",
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '94.7%',
		'is_featured' => true,
	),
	2 => array(
		'tag'         => 'FMCG & F&B',
		'title'       => 'Demand, Stockout, and Distributor Visibility System',
		'pressure'    => '',
		'challenges'  => '',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '91.2%',
		'is_featured' => false,
	),
	3 => array(
		'tag'         => 'Financial',
		'title'       => 'Compliance and Customer Operations Workflow System',
		'pressure'    => '',
		'challenges'  => '',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '88.5%',
		'is_featured' => false,
	),
	4 => array(
		'tag'         => 'Healthcare',
		'title'       => 'Healthcare Inventory and Operational Control System',
		'pressure'    => '',
		'challenges'  => '',
		'stat_label'  => 'Analytics Data',
		'stat_value'  => '96.1%',
		'is_featured' => false,
	),
);
?>
<section class="section industries-focus">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'focus_badge', 'Industry Focus' ); ?></span>
			<h2 class="section__title industries-focus__title">
				<?php k_html( 'focus_heading', 'Built for industries where visibility, control,<br>and execution matter.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'focus_text', 'Kelarix focuses on complex operating environments where data, workflows, compliance, and decision making directly affect business performance.' ); ?>
			</p>
		</div>

		<div class="industries-focus__list" data-accordion>
			<?php foreach ( $defaults as $i => $item ) :
				$is_open = ! empty( $item['is_featured'] );
				?>
				<div class="focus-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="focus-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="focus-item__tag"><?php echo esc_html( $item['tag'] ); ?></span>
						<span class="focus-item__title"><?php echo esc_html( $item['title'] ); ?></span>
						<span class="focus-item__toggle" aria-hidden="true"></span>
					</button>
					<div class="focus-item__body">
						<div class="focus-item__grid">
							<div class="focus-item__col">
								<h4 class="focus-item__sub">INDUSTRY PRESSURE</h4>
								<p class="focus-item__desc"><?php echo esc_html( $item['pressure'] ?: 'Leaders in this industry need connected visibility across operating data, workflow control, and decision support.' ); ?></p>
								<h4 class="focus-item__sub">COMMON CHALLENGES</h4>
								<div class="focus-item__chips">
									<?php foreach ( array_filter( array_map( 'trim', explode( "\n", (string) $item['challenges'] ) ) ) as $chip ) : ?>
										<span class="chip"><?php echo esc_html( $chip ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="focus-item__col">
								<div class="proof-analytics">
									<div class="proof-analytics__head">
										<span class="proof-analytics__label"><?php echo esc_html( $item['stat_label'] ); ?></span>
										<span class="proof-analytics__dots">···</span>
									</div>
									<div class="proof-analytics__value"><?php echo esc_html( $item['stat_value'] ); ?></div>
									<div class="proof-chart">
										<div class="proof-chart__axis"><span>100%</span><span>60%</span><span>40%</span></div>
										<svg class="proof-chart__svg" viewBox="0 0 400 130" preserveAspectRatio="none">
											<defs>
												<linearGradient id="fp-grad-<?php echo (int) $i; ?>" x1="0" x2="0" y1="0" y2="1">
													<stop offset="0" stop-color="#1a48ff" stop-opacity=".22"/>
													<stop offset="1" stop-color="#1a48ff" stop-opacity="0"/>
												</linearGradient>
											</defs>
											<path d="M0 90 Q80 60 160 70 T320 40 T400 30 L400 130 L0 130 Z" fill="url(#fp-grad-<?php echo (int) $i; ?>)"/>
											<path d="M0 90 Q80 60 160 70 T320 40 T400 30" fill="none" stroke="#1a48ff" stroke-width="2"/>
											<circle cx="330" cy="42" r="5" fill="#fff" stroke="#1a48ff" stroke-width="2"/>
										</svg>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="industries-focus__cta">
			<?php k_button( 'focus_cta', 'Explore Proof', '#proof', 'btn btn--ghost' ); ?>
		</div>
	</div>
</section>
