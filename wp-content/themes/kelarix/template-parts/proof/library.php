<?php
/**
 * Proof: Future Proof Library (5 industry columns with checklist items).
 *
 * @package Kelarix
 */
$icons = array(
	'book'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 5a2 2 0 0 1 2-2h13v16H6a2 2 0 0 0-2 2zM19 19H6a2 2 0 0 1-2-2"/></svg>',
	'flask' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M10 3v6L4 20a1 1 0 0 0 1 1.5h14A1 1 0 0 0 20 20l-6-11V3M8 3h8"/></svg>',
	'coin'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M9 10.5c0-1 1-2 3-2s3 1 3 2c0 2-6 1-6 3 0 1 1 2 3 2s3-1 3-2"/></svg>',
	'plus'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/><path d="M12 9v6M9 12h6"/></svg>',
	'grid'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>',
);
$defaults = array(
	1 => array(
		'title'    => 'Retail',
		'icon'     => 'book',
		'items'    => "Inventory Visibility and Store Performance System\nReturns Workflow and Refund Tracking System\nCustomer and Sales Intelligence Dashboard",
	),
	2 => array(
		'title'    => 'FMCG and Food and Beverage',
		'icon'     => 'flask',
		'items'    => "Demand, Stockout, and Distributor Visibility System\nBatch, Quality, and Issue Tracking Workflow\nProduction and Supply Coordination System",
	),
	3 => array(
		'title'    => 'Financial Services',
		'icon'     => 'coin',
		'items'    => "Compliance and Customer Operations Workflow System\nCustomer Onboarding Decision Support System\nRisk and Performance Visibility Dashboard",
	),
	4 => array(
		'title'    => 'Healthcare',
		'icon'     => 'plus',
		'items'    => "Healthcare Inventory and Operational Control System\nProcurement and Department Usage Dashboard\nPatient Operations and Capacity Visibility System",
	),
	5 => array(
		'title'    => 'Cross Industry',
		'icon'     => 'grid',
		'items'    => "Operational Visibility Diagnostic\nData Readiness and AI Readiness Framework\nWorkflow Automation Opportunity Map",
	),
);
?>
<section class="section proof-library">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'lib_badge', 'Future Proof Library' ); ?></span>
			<h2 class="section__title proof-library__title">
				<?php k_html( 'lib_heading', 'A growing library of practical system<br>thinking.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'lib_text', 'Over time, the proof library will expand into 10 to 15 scenario based assets across our core industries. These assets will show realistic industry problems, system opportunities, before and after logic, diagnostic thinking, and future demo based walkthroughs.' ); ?>
			</p>
		</div>

		<div class="proof-library__grid">
			<?php foreach ( $defaults as $i => $col ) :
				$data  = k_field( 'lib_col_' . $i, array() );
				$title = ! empty( $data['title'] ) ? $data['title'] : $col['title'];
				$icon  = $data['icon'] ?? $col['icon'];
				$items = ! empty( $data['items'] ) ? $data['items'] : $col['items'];
				if ( is_array( $icon ) && ! empty( $icon['url'] ) ) {
					$svg = sprintf( '<img src="%s" alt="" class="k-icon-img" loading="lazy" />', esc_url( $icon['url'] ) );
				} else {
					$slug = is_string( $icon ) && $icon ? $icon : $col['icon'];
					$svg  = isset( $icons[ $slug ] ) ? $icons[ $slug ] : $icons['book'];
				}
				?>
				<div class="lib-col">
					<span class="lib-col__icon"><?php echo $svg; // phpcs:ignore ?></span>
					<h3 class="lib-col__title"><?php echo esc_html( $title ); ?></h3>
					<ul class="lib-col__list">
						<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $items ) ) ) as $line ) : ?>
							<li>
								<span class="lib-col__tick" aria-hidden="true">
									<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12l6 6L20 6"/></svg>
								</span>
								<span><?php echo esc_html( $line ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
