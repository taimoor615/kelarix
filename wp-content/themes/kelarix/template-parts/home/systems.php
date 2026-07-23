<?php
/**
 * Section: Systems We Build (CPT: kx_system).
 *
 * @package Kelarix
 */
$icons = array(
	'scatter'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="2"/><circle cx="18" cy="7" r="2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M8 7l8 .5M7.5 15 16 9M9 16l6 .5"/></svg>',
	'database' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><ellipse cx="12" cy="6" rx="7" ry="3"/><path d="M5 6v6c0 1.7 3.1 3 7 3s7-1.3 7-3V6M5 12v6c0 1.7 3.1 3 7 3s7-1.3 7-3v-6"/></svg>',
	'workflow' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="4" width="6" height="5" rx="1.5"/><rect x="15" y="15" width="6" height="5" rx="1.5"/><rect x="15" y="4" width="6" height="5" rx="1.5"/><path d="M9 6.5h6M18 9v6M9 6.5c0 6 3 11 6 11"/></svg>',
	'ai'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="6" y="6" width="12" height="12" rx="2"/><path d="M9 9h6v6H9zM9 3v3M15 3v3M9 18v3M15 18v3M3 9h3M3 15h3M18 9h3M18 15h3"/></svg>',
	'window'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.01M10 6.5h.01"/></svg>',
);
$defaults = array(
	array( 'Operational Intelligence Systems', 'Dashboards, KPI visibility, reporting layers, and performance monitoring for leadership teams.', 'scatter' ),
	array( 'Data Engineering Foundations', 'Data pipelines, integrations, models, and quality structures that make business data usable.', 'database' ),
	array( 'Workflow Automation Systems', 'Approval flows, task routing, notifications, and exception handling that reduce manual work.', 'workflow' ),
	array( 'AI Assisted Decision Systems', 'Practical AI support for summarisation, monitoring, recommendations, and decision support.', 'ai' ),
	array( 'Custom Business Platforms', 'Internal tools, portals, admin systems, and role based platforms built around real workflows.', 'window' ),
);
$items = k_cpt_items( 'kx_system', $defaults );
?>
<section class="section systems" id="systems">
	<div class="container systems__inner">
		<div class="systems__aside">
			<span class="badge badge--light badge--soft"><span class="dot"></span><?php k_text( 'systems_heading_badge', 'Systems We Build' ); ?></span>
			<h2 class="section__title"><?php k_text( 'systems_heading', 'Systems We Build' ); ?></h2>
			<p class="section__lead"><?php k_text( 'systems_text', 'Our capabilities work together to create practical business systems, not isolated technology outputs.' ); ?></p>
			<div class="systems__actions">
				<?php
				k_button( 'systems_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary btn--sm' );
				k_button( 'systems_cta_secondary', 'Explore What We Build', '#', 'btn btn--ghost btn--sm' );
				?>
			</div>
		</div>

		<div class="systems__list">
			<?php
			$i = 0;
			foreach ( $items as $item ) {
				if ( $item instanceof WP_Post ) {
					$title = get_the_title( $item );
					$desc  = k_field( 'description', '', $item->ID );
					$ikey  = k_field( 'icon', '', $item->ID );
				} else {
					$title = $item[0];
					$desc  = $item[1];
					$ikey  = $item[2];
				}
				// Uploaded SVG (array) → render as <img>; legacy slug → hardcoded SVG.
				if ( is_array( $ikey ) && ! empty( $ikey['url'] ) ) {
					$icon = sprintf( '<img src="%s" alt="" class="k-icon-img" loading="lazy" />', esc_url( $ikey['url'] ) );
				} else {
					$slug = is_string( $ikey ) && $ikey ? $ikey : 'scatter';
					$icon = isset( $icons[ $slug ] ) ? $icons[ $slug ] : $icons['scatter'];
				}
				$corner = ( 0 === $i % 2 ) ? 'system-card--tr' : 'system-card--bl';
				$i++;
				?>
				<article class="system-card <?php echo esc_attr( $corner ); ?>">
					<span class="system-card__icon"><?php echo $icon; // phpcs:ignore ?></span>
					<h3 class="system-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="system-card__desc"><?php echo esc_html( $desc ); ?></p>
				</article>
				<?php
			}
			?>
		</div>
	</div>
</section>
