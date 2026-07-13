<?php
/**
 * Proof: How we are different (Kelarix vs Traditional comparison + quote).
 *
 * @package Kelarix
 */
$kelarix_items = array(
	'Confidentiality first',
	'Scenario based system concepts',
	'Diagnostic frameworks',
	'Operating logic and problem breakdowns',
	'Structured system thinking',
);
$trad_items = array(
	'Client logos',
	'Public screenshots',
	'Testimonials',
	'Case study claims',
	'Surface level portfolio',
);
?>
<section class="section proof-different">
	<div class="container">
		<div class="proof-different__head">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'diff_badge', 'How we are different' ); ?></span>
			<h2 class="section__title section__title--light proof-different__title">
				<?php k_html( 'diff_heading', 'Sensitive systems require a different<br>kind of proof.' ); ?>
			</h2>
			<div class="proof-different__body">
				<p><?php k_text( 'diff_text_1', 'Much of our work sits inside operational data, internal workflows, reporting systems, software platforms, and business critical processes. We do not publicly expose client names, confidential screenshots, testimonials, or protected project details.' ); ?></p>
				<p><?php k_text( 'diff_text_2', 'Instead, we demonstrate credibility through structured thinking, realistic operating scenarios, diagnostic models, system concepts, and clear before and after logic.' ); ?></p>
			</div>
		</div>

		<div class="proof-compare">
			<div class="proof-compare__card proof-compare__card--kelarix">
				<span class="proof-compare__logo" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="20" height="20" fill="#1a48ff"><path d="M6 3h4v6l6-6h5l-8 8 8 10h-5l-6-7v7H6z"/></svg>
				</span>
				<h3 class="proof-compare__title">Kelarix</h3>
				<ul class="proof-compare__list">
					<?php foreach ( $kelarix_items as $item ) : ?>
						<li><span class="proof-compare__tick" aria-hidden="true">✓</span> <?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="proof-compare__card proof-compare__card--trad">
				<h3 class="proof-compare__title">Traditional public proof</h3>
				<ul class="proof-compare__list">
					<?php foreach ( $trad_items as $item ) : ?>
						<li><span class="proof-compare__tick proof-compare__tick--muted" aria-hidden="true">✓</span> <?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<div class="proof-different__quote">
			<p><?php k_text( 'diff_quote', 'Client work stays protected. The quality of our thinking stays visible.' ); ?></p>
		</div>
	</div>
</section>
