<?php
/**
 * Template Name: Case Studies
 *
 * Dynamic case-study listing page. Pulls from the kx_case_study CPT and
 * filters by the kx_case_ind taxonomy chips. Shared bg-img covers hero
 * through the final CTA.
 *
 * @package Kelarix
 */
get_header();

$per_page  = max( 1, (int) k_field( 'cs_grid_per_page', 9 ) );
$active    = isset( $_GET['industry'] ) ? sanitize_title( wp_unslash( $_GET['industry'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
$paged     = max( 1, (int) ( get_query_var( 'paged' ) ?: ( isset( $_GET['paged'] ) ? $_GET['paged'] : 1 ) ) ); // phpcs:ignore

$args = array(
	'post_type'      => 'kx_case_study',
	'post_status'    => 'publish',
	'posts_per_page' => $per_page,
	'paged'          => $paged,
	'meta_key'       => 'is_featured',
	'orderby'        => array( 'meta_value_num' => 'DESC', 'menu_order' => 'ASC', 'date' => 'DESC' ),
);
if ( $active ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'kx_case_ind',
			'field'    => 'slug',
			'terms'    => $active,
		),
	);
}
$cases = new WP_Query( $args );
?>
<main id="primary" class="site-main cs-page">
	<div class="cs-block">
		<?php
		get_template_part( 'template-parts/case-studies/hero' );
		get_template_part( 'template-parts/case-studies/grid', null, array(
			'query'  => $cases,
			'active' => $active,
			'paged'  => $paged,
		) );
		get_template_part( 'template-parts/case-studies/cta' );
		?>
	</div>
</main>
<?php
wp_reset_postdata();
get_footer();
