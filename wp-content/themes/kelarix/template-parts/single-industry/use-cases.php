<?php
/**
 * Single Industry: Practical Retail Use Cases (2 columns — Challenge + System) with check icons.
 *
 * @package Kelarix
 */
$challenges = array(
	'Store reporting takes too long to prepare',
	'Inventory figures differ across systems',
	'Stock risks are identified too late',
	'Returns are difficult to track end to end',
	'Leadership lacks margin clarity',
	'Operational issues lack clear ownership',
	'Existing tools do not match real workflows',
	'AI is being considered without reliable data',
);
$systems = array(
	'Automated retail performance reporting',
	'Unified inventory visibility layer',
	'Inventory alert and exception system',
	'Returns and refund workflow system',
	'Sales and margin intelligence dashboard',
	'Alerting and action-management system',
	'Custom retail operations platform',
	'Retail data and AI-readiness foundation',
);
$check = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>';
?>
<section class="section sind-usecases">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'sind_uc_badge', 'User Cases' ); ?></span>
			<h2 class="section__title sind-usecases__title">
				<?php k_html( 'sind_uc_heading', 'Practical Retail Use Cases' ); ?>
			</h2>
		</div>

		<div class="sind-usecases__panel">
			<div class="sind-usecases__col">
				<span class="sind-usecases__badge" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/></svg>
				</span>
				<h3 class="sind-usecases__sub"><?php k_text( 'sind_uc_col1_title', 'Business Challenge' ); ?></h3>
				<ul class="sind-usecases__list">
					<?php foreach ( $challenges as $item ) : ?>
						<li><span class="sind-usecases__check" aria-hidden="true"><?php echo $check; // phpcs:ignore ?></span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="sind-usecases__col">
				<span class="sind-usecases__badge" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 10h18M8 4v14"/></svg>
				</span>
				<h3 class="sind-usecases__sub"><?php k_text( 'sind_uc_col2_title', 'Possible System' ); ?></h3>
				<ul class="sind-usecases__list">
					<?php foreach ( $systems as $item ) : ?>
						<li><span class="sind-usecases__check" aria-hidden="true"><?php echo $check; // phpcs:ignore ?></span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
