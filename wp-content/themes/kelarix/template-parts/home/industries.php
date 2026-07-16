<?php
/**
 * Section: Built for industries (carousel) + Also relevant.
 *
 * @package Kelarix
 */
$check = '<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm-1.2 14.2-4-4 1.4-1.4 2.6 2.6 5.2-5.2 1.4 1.4z"/></svg>';

// Decorative outline icons per main industry card (two boxes, bottom-right).
$d_bag    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6 8h12l-1 12H7zM9 8V6a3 3 0 0 1 6 0v2"/></svg>';
$d_store  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 9l1-4h14l1 4M4 9v10h16V9M4 9h16M9 19v-5h6v5"/></svg>';
$d_tools  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M14 6l4 4-9 9-4-4zM3 21l3-1M16 4l4 4"/></svg>';
$d_basket = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M5 9h14l-1.5 10h-11zM9 9l3-5 3 5"/></svg>';
$d_shield  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>';
$d_doc     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M8.5 8h7M8.5 12h7M8.5 16h4"/></svg>';
$d_monitor = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4M7 10l2 2 3-4 3 3"/></svg>';
$d_health  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 21s-8-5-8-11a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 6-8 11-8 11z"/><path d="M9 12h2v-2h2v2h2v2h-2v2h-2v-2H9z"/></svg>';

$main_defaults = array(
	array(
		'title'    => 'Retail',
		'desc'     => 'Improve visibility across stores, stock, sales, returns, customers, and operational performance.',
		'features' => array( 'Inventory visibility', 'Store performance', 'Returns workflows', 'Sales reporting' ),
		'decor'    => $d_bag . $d_store,
	),
	array(
		'title'    => 'FMCG and Food and Beverage',
		'desc'     => 'Support demand visibility, distributor performance, stock movement, production coordination, and supply workflows.',
		'features' => array( 'Stockout alerts', 'Distributor dashboards', 'Product movement', 'Quality tracking' ),
		'decor'    => $d_tools . $d_basket,
	),
	array(
		'title'    => 'Financial Services',
		'desc'     => 'Build systems for compliance, reporting, document handling, and customer operations control.',
		'features' => array( 'Customer onboarding workflows', 'Compliance tasks', 'Risk dashboards', 'Document approvals' ),
		'decor'    => $d_shield . $d_doc,
	),
	array(
		'title'    => 'Healthcare',
		'desc'     => 'Improve visibility across inventory, procurement, patient operations, internal workflows, and capacity planning.',
		'features' => array( 'Medical inventory', 'Procurement workflows', 'Usage dashboards', 'Capacity reporting' ),
		'decor'    => $d_monitor . $d_health,
	),
);
$also_defaults = array(
	'Operational Intelligence Systems',
	'Real Estate and Construction',
	'Manufacturing',
	'Energy and Utilities',
);

$all  = k_cpt_items( 'kx_industry', array() );
$main = array();
$also = array();
if ( ! empty( $all ) ) {
	foreach ( $all as $post ) {
		if ( k_field( 'is_secondary', false, $post->ID ) ) {
			$also[] = get_the_title( $post );
		} else {
			$feat = array_filter( array_map( 'trim', explode( "\n", (string) k_field( 'features', '', $post->ID ) ) ) );
			$main[] = array(
				'title'    => get_the_title( $post ),
				'desc'     => k_field( 'description', '', $post->ID ),
				'features' => $feat,
				'decor'    => $d_bag . $d_store,
			);
		}
	}
}
if ( empty( $main ) ) { $main = $main_defaults; }
if ( empty( $also ) ) { $also = $also_defaults; }
?>
<section class="section industries">
	<div class="industries__bg" aria-hidden="true"></div>
	<div class="container industries__inner">
		<div class="section__head section__head--center">
			<span class="badge badge--light badge--center badge--soft"><span class="dot"></span><?php k_text( 'industries_badge', 'Industry Focus' ); ?></span>
			<h2 class="section__title">
				<?php k_html( 'industries_heading', 'Built for industries where visibility, control, and execution matter.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'industries_text', 'Kelarix focuses on complex operating environments where data, workflows, compliance, and decision making directly affect business performance.' ); ?>
			</p>
		</div>

		<div class="industries__carousel" data-carousel>
			<div class="industries__track" data-carousel-track>
				<?php foreach ( $main as $ind ) : ?>
					<article class="industry-card">
						<h3 class="industry-card__title"><?php echo esc_html( $ind['title'] ); ?></h3>
						<p class="industry-card__desc"><?php echo esc_html( $ind['desc'] ); ?></p>
						<ul class="industry-card__list">
							<?php foreach ( $ind['features'] as $feat ) : ?>
								<li><span class="industry-card__check"><?php echo $check; // phpcs:ignore ?></span><?php echo esc_html( $feat ); ?></li>
							<?php endforeach; ?>
						</ul>
						<div class="industry-card__decor" aria-hidden="true"><?php echo $ind['decor']; // phpcs:ignore ?></div>
						<?php
						$ind_link = ( isset( $ind['post'] ) && $ind['post'] instanceof WP_Post ) ? k_field( 'link', array(), $ind['post']->ID ) : array();
						$ind_url  = ! empty( $ind_link['url'] ) ? $ind_link['url'] : '#';
						$ind_text = ! empty( $ind_link['title'] ) ? $ind_link['title'] : k_field( 'industries_card_cta_text', 'Explore Now' );
						?>
						<a href="<?php echo esc_url( $ind_url ); ?>" class="btn btn--ghost btn--sm industry-card__cta"><span><?php echo esc_html( $ind_text ); ?></span><?php echo k_arrow(); ?></a>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="industries__controls">
				<div class="industries__nav">
					<button class="carousel-btn" data-carousel-prev aria-label="Previous">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
					</button>
					<button class="carousel-btn carousel-btn--play" data-carousel-next aria-label="Next">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
					</button>
				</div>
				<div class="industries__progress"><span data-carousel-progress></span></div>
			</div>
		</div>

		<div class="also">
			<h3 class="also__title"><?php k_text( 'also_heading', 'Also relevant for complex operating environments' ); ?></h3>
			<div class="also__grid">
				<?php foreach ( $also as $name ) : ?>
					<a href="#" class="also__item">
						<span class="also__icon"><?php echo k_icon( 'default' ); ?></span>
						<span class="also__chevron" aria-hidden="true">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
						</span>
						<span class="also__name"><?php echo esc_html( $name ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
			<div class="also__actions">
				<?php
				k_button( 'industries_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary btn--sm' );
				k_button( 'industries_cta_secondary', 'Explore What We Build', '#', 'btn btn--white btn--sm' );
				?>
			</div>
		</div>
	</div>
</section>
