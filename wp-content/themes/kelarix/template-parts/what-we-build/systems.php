<?php
/**
 * What We Build: Systems We Build accordion — tag + title + body with WHAT THIS HELPS WITH chips.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array(
		'tag'      => 'System Area 1',
		'title'    => 'Operational Intelligence Systems',
		'desc'     => 'Dashboards, KPI visibility, reporting layers, alerts, and performance monitoring that help leadership understand what is happening across the business.',
		'supports' => "Executive visibility\nPerformance tracking\nOperational reporting\nException monitoring\nFaster decision making",
	),
	2 => array(
		'tag'      => 'System Area 2',
		'title'    => 'Data Engineering Foundations',
		'desc'     => 'Data pipelines, integrations, models, and quality structures that make business data usable.',
		'supports' => "Trusted data\nClean integrations\nStructured models\nQuality checks",
	),
	3 => array(
		'tag'      => 'System Area 3',
		'title'    => 'Workflow Automation Systems',
		'desc'     => 'Approval flows, task routing, notifications, and exception handling that reduce manual work.',
		'supports' => "Approval flows\nTask routing\nNotifications\nException handling",
	),
	4 => array(
		'tag'      => 'System Area 4',
		'title'    => 'AI Assisted Decision Systems',
		'desc'     => 'Practical AI support for summarisation, monitoring, recommendations, and decision support.',
		'supports' => "Summaries\nRecommendations\nMonitoring\nDecision support",
	),
	5 => array(
		'tag'      => 'System Area 5',
		'title'    => 'Custom Business Platforms',
		'desc'     => 'Internal tools, portals, admin systems, and role based platforms built around real workflows.',
		'supports' => "Internal tools\nPortals\nAdmin systems\nRole-based platforms",
	),
);
?>
<section class="section ww-systems" id="systems">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'ww_sys_badge', 'Systems We Build' ); ?></span>
			<h2 class="section__title ww-systems__title">
				<?php k_html( 'ww_sys_heading', 'Systems We Build' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'ww_sys_text', 'Our capabilities work together to create practical business systems, not isolated technology outputs.' ); ?>
			</p>
		</div>

		<div class="ww-systems__list" data-accordion>
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$card     = k_field( 'ww_system_' . $i, array() );
				$tag      = ! empty( $card['tag'] ) ? $card['tag'] : $defaults[ $i ]['tag'];
				$title    = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ]['title'];
				$desc     = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ]['desc'];
				$supports = ! empty( $card['supports'] ) ? $card['supports'] : $defaults[ $i ]['supports'];
				$chips    = array_filter( array_map( 'trim', explode( "\n", (string) $supports ) ) );
				$is_open  = ( 1 === $i );
				?>
				<div class="ww-sys-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="ww-sys-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="ww-sys-item__tag"><?php echo esc_html( $tag ); ?></span>
						<span class="ww-sys-item__title"><?php echo esc_html( $title ); ?></span>
						<span class="ww-sys-item__toggle" aria-hidden="true"></span>
					</button>
					<div class="ww-sys-item__body">
						<div class="ww-sys-item__grid">
							<div class="ww-sys-item__col">
								<p class="ww-sys-item__desc"><?php echo esc_html( $desc ); ?></p>
							</div>
							<div class="ww-sys-item__col">
								<h4 class="ww-sys-item__sub"><?php k_text( 'ww_sys_supports_label', 'WHAT THIS HELPS WITH' ); ?></h4>
								<div class="ww-sys-item__chips">
									<?php foreach ( $chips as $chip ) : ?>
										<span class="chip"><?php echo esc_html( $chip ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>

		<div class="ww-systems__cta">
			<?php k_button( 'ww_sys_cta', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' ); ?>
		</div>
	</div>
</section>
