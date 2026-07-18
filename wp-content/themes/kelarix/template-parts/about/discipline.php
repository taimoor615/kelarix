<?php
/**
 * About: Our Discipline — two infinite marquee rows.
 *
 * @package Kelarix
 */
$icons = array(
	1 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>',
	2 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/><path d="M9 12l2 2 4-4"/></svg>',
	3 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><ellipse cx="12" cy="6" rx="8" ry="3"/><path d="M4 6v6c0 1.7 3.6 3 8 3s8-1.3 8-3V6M4 12v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/></svg>',
	4 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 10h18M8 4v16"/></svg>',
	5 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="9" cy="8" r="3"/><path d="M3 20c0-3.3 2.7-6 6-6M16 11a3 3 0 1 0-2-5.2M15 20c0-2.5 1.5-4.6 3.6-5.5"/></svg>',
	6 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M2 12h3M19 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/></svg>',
	7 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/></svg>',
	8 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3v18M3 8l9-5 9 5M3 16l9 5 9-5"/></svg>',
);
$defaults = array(
	1 => array( 'Business first discovery', 'Technology decisions are guided by operating needs, not trends.' ),
	2 => array( 'Confidentiality first', 'Sensitive client work, internal workflows, and business details stay protected.' ),
	3 => array( 'Data discipline', 'Structured, governed, accurate, and reliable data trusted across systems and teams.' ),
	4 => array( 'Workflow realism', 'Systems are designed around real teams and real work, not theoretical processes.' ),
	5 => array( 'Role based thinking', 'Interfaces and access reflect roles, responsibilities, and decision authority.' ),
	6 => array( 'Responsible AI', 'AI supports decisions without removing context, control, or judgement.' ),
	7 => array( 'Documentation discipline', 'Systems are built with enough clarity to maintain, improve, and hand over.' ),
	8 => array( 'Scalable foundations', 'We avoid quick fixes that cost the business grows.' ),
);
$row1 = array( 1, 2, 3, 4 );
$row2 = array( 5, 6, 7, 8 );

$render_card = function( $i, $defaults, $icons ) {
	$item  = k_field( 'about_disc_item_' . $i, array() );
	$title = ! empty( $item['title'] ) ? $item['title'] : $defaults[ $i ][0];
	$text  = ! empty( $item['text'] ) ? $item['text'] : $defaults[ $i ][1];
	$icon  = ! empty( $item['icon'] ) ? k_icon( $item['icon'] ) : $icons[ $i ];
	?>
	<article class="ad-card">
		<span class="ad-card__icon"><?php echo $icon; // phpcs:ignore ?></span>
		<h3 class="ad-card__title"><?php echo esc_html( $title ); ?></h3>
		<p class="ad-card__text"><?php echo esc_html( $text ); ?></p>
	</article>
	<?php
};
?>
<section class="section about-discipline">
	<div class="container">
		<div class="about-discipline__head">
			<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'about_disc_badge', 'Our Discipline' ); ?></span>
			<h2 class="section__title about-discipline__title">
				<?php k_html( 'about_disc_heading', 'Built with the discipline serious business<br>systems require.' ); ?>
			</h2>
			<p class="about-discipline__text">
				<?php k_text( 'about_disc_text', 'Kelarix works on systems that can affect reporting, operations, customer processes, internal decision making. That requires clarity, structure, confidentiality, governance, and practical judgement.' ); ?>
			</p>
		</div>
	</div>

	<div class="about-discipline__marquees">
		<div class="marquee marquee--right">
			<div class="marquee__track">
				<?php foreach ( $row1 as $i ) { $render_card( $i, $defaults, $icons ); } ?>
				<?php foreach ( $row1 as $i ) { $render_card( $i, $defaults, $icons ); } ?>
				<?php foreach ( $row1 as $i ) { $render_card( $i, $defaults, $icons ); } ?>
			</div>
		</div>
		<div class="marquee marquee--left">
			<div class="marquee__track">
				<?php foreach ( $row2 as $i ) { $render_card( $i, $defaults, $icons ); } ?>
				<?php foreach ( $row2 as $i ) { $render_card( $i, $defaults, $icons ); } ?>
				<?php foreach ( $row2 as $i ) { $render_card( $i, $defaults, $icons ); } ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="about-discipline__actions">
			<?php
			k_button( 'about_disc_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
			k_button( 'about_disc_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
			?>
		</div>
	</div>
</section>
