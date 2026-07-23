<?php
/**
 * Case Studies page: filter chips + card grid + pagination.
 *
 * Args:
 *   query  — WP_Query of kx_case_study posts (already filtered/paged)
 *   active — active industry slug ('' = All)
 *   paged  — current page number
 *
 * @package Kelarix
 */
$query    = $args['query']  ?? null;
$active   = $args['active'] ?? '';
$paged    = $args['paged']  ?? 1;
$card_cta = k_field( 'cs_card_cta', 'Explore' );
$all_lbl  = k_field( 'cs_grid_all_label', 'All' );

/* Industry chips — auto-generated from the taxonomy terms. */
$terms = get_terms( array(
	'taxonomy'   => 'kx_case_ind',
	'hide_empty' => false,
	'orderby'    => 'term_order',
	'order'      => 'ASC',
) );

$page_url = get_permalink();

/* Helper: chip URL preserving-clearing paged. */
$chip_url = function( $slug ) use ( $page_url ) {
	if ( '' === $slug ) {
		return $page_url;
	}
	return add_query_arg( 'industry', $slug, $page_url );
};
?>
<section class="section cs-grid" id="grid">
	<div class="container cs-grid__inner">
		<span class="badge badge--soft cs-grid__badge">
			<span class="dot"></span>
			<?php k_text( 'cs_grid_badge', 'Proof Library' ); ?>
		</span>

		<h2 class="section__title cs-grid__title">
			<?php k_html( 'cs_grid_heading', 'Explore proof by industry' ); ?>
		</h2>

		<div class="cs-chips" role="tablist" aria-label="Filter by industry">
			<a href="<?php echo esc_url( $chip_url( '' ) ); ?>" class="cs-chip <?php echo '' === $active ? 'is-active' : ''; ?>" data-filter="">
				<?php echo esc_html( $all_lbl ); ?>
			</a>
			<?php if ( ! is_wp_error( $terms ) ) : foreach ( $terms as $term ) : ?>
				<a href="<?php echo esc_url( $chip_url( $term->slug ) ); ?>" class="cs-chip <?php echo $active === $term->slug ? 'is-active' : ''; ?>" data-filter="<?php echo esc_attr( $term->slug ); ?>">
					<?php echo esc_html( $term->name ); ?>
				</a>
			<?php endforeach; endif; ?>
		</div>

		<?php if ( $query && $query->have_posts() ) : ?>
			<div class="cs-cards">
				<?php while ( $query->have_posts() ) : $query->the_post();
					$icon    = get_field( 'icon' );
					$eyebrow = get_field( 'eyebrow' ) ?: 'FLAGSHIP SCENARIO STUDY';
					$desc    = get_field( 'description' ) ?: get_the_excerpt();
					$link    = get_field( 'link' );
					$url     = ! empty( $link['url'] ) ? $link['url'] : get_permalink();
					$target  = ! empty( $link['target'] ) ? $link['target'] : '';
					?>
					<article class="cs-card">
						<div class="cs-card__icon" aria-hidden="true">
							<?php echo k_icon_render( $icon, 'basket' ); ?>
						</div>
						<p class="cs-card__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
						<h3 class="cs-card__title"><?php the_title(); ?></h3>
						<p class="cs-card__text"><?php echo esc_html( wp_trim_words( $desc, 22 ) ); ?></p>
						<a class="btn btn--white btn--sm cs-card__cta" href="<?php echo esc_url( $url ); ?>"<?php echo $target ? ' target="' . esc_attr( $target ) . '"' : ''; ?>>
							<span><?php echo esc_html( $card_cta ); ?></span><?php echo k_arrow(); ?>
						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<?php
			/* Pagination — preserves the industry filter. */
			$total = (int) $query->max_num_pages;
			if ( $total > 1 ) :
				$base = $active ? add_query_arg( 'industry', $active, $page_url ) : $page_url;
				$pag  = paginate_links( array(
					'base'      => trailingslashit( $base ) . '%_%',
					'format'    => '?paged=%#%',
					'add_args'  => false,
					'add_fragment' => '',
					'current'   => $paged,
					'total'     => $total,
					'type'      => 'array',
					'end_size'  => 1,
					'mid_size'  => 1,
					'prev_text' => '<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>',
					'next_text' => '<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>',
				) );
				if ( $pag ) : ?>
					<nav class="cs-pager" aria-label="Case study pages">
						<?php foreach ( $pag as $link ) {
							echo '<span class="cs-pager__item">' . $link . '</span>'; // phpcs:ignore
						} ?>
					</nav>
				<?php endif;
			endif; ?>

		<?php else : ?>
			<p class="cs-empty">
				<?php esc_html_e( 'No case studies published yet. Add some under Case Studies in the admin.', 'kelarix' ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>
