<?php
/**
 * What We Build: Practical Systems — staggered K side + Business Challenge list.
 *
 * @package Kelarix
 */
$can_build = array(
	'Executive operating dashboard',
	'Automated reporting and data pipeline',
	'Workflow automation systems',
	'Operational intelligence layer',
	'AI assisted monitoring or recommendation system',
	'Custom internal platform',
	'Data foundation and AI readiness system',
	'Role based workflow and visibility system',
);
$challenges = array(
	'Leadership cannot see performance clearly',
	'Teams rely on manual reporting',
	'Approvals happen through email and spreadsheets',
	'Stock, sales, or operations data is scattered',
	'Teams need better decision support',
	'Teams need better decision support',
	'Existing tools do not match the workflow',
	'Business wants AI but lacks readiness',
	'Processes are growing harder to control',
);
?>
<section class="section ww-practical">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'ww_prac_badge', 'Use Cases' ); ?></span>
			<h2 class="section__title section__title--light ww-practical__title">
				<?php k_html( 'ww_prac_heading', 'Practical systems for real operating<br>challenges.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'ww_prac_text', "Kelarix builds systems around the problems leadership teams need to see, control, and improve." ); ?>
			</p>
		</div>

		<div class="ww-practical__panel">
			<div class="ww-practical__card ww-practical__card--k">
				<div class="ww-practical__k" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M6 3h3v7l6-7h4l-7 8 8 10h-4l-6-8-1 1v7H6z"/></svg>
				</div>
				<h3 class="ww-practical__sub"><?php k_text( 'ww_prac_col1_title', 'What Kelarix Can Build' ); ?></h3>
				<ul class="ww-practical__list ww-practical__list--check">
					<?php foreach ( $can_build as $item ) : ?>
						<li><span class="ww-practical__check ww-practical__check--white" aria-hidden="true">
							<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
						</span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="ww-practical__card ww-practical__card--white">
				<h3 class="ww-practical__sub"><?php k_text( 'ww_prac_col2_title', 'Business Challenge' ); ?></h3>
				<ul class="ww-practical__list ww-practical__list--check">
					<?php foreach ( $challenges as $item ) : ?>
						<li><span class="ww-practical__check" aria-hidden="true">
							<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
						</span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
