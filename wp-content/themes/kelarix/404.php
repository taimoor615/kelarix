<?php
/**
 * 404 Not Found template.
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main error-404-page">
	<section class="section error-404">
		<div class="container">
			<div class="error-404__inner">
				<span class="error-404__code" aria-hidden="true">404</span>
				<h1 class="error-404__title">
					<?php k_html( 'error_404_title', 'The page you are looking for<br>could not be found.' ); ?>
				</h1>
				<p class="error-404__text">
					<?php k_text( 'error_404_text', 'It might have moved, been renamed, or never existed. Head back home or explore what Kelarix builds.' ); ?>
				</p>
				<div class="error-404__actions">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
						<span><?php echo esc_html( k_field( 'error_404_home_label', 'Back to Home' ) ); ?></span>
						<?php echo k_arrow(); ?>
					</a>
					<a href="<?php echo esc_url( home_url( '/#systems' ) ); ?>" class="btn btn--ghost">
						<span><?php echo esc_html( k_field( 'error_404_explore_label', 'Explore What We Build' ) ); ?></span>
						<?php echo k_arrow(); ?>
					</a>
				</div>
			</div>
			<div class="error-404__glyph" aria-hidden="true">
				<svg viewBox="0 0 400 260" xmlns="http://www.w3.org/2000/svg">
					<defs>
						<linearGradient id="e404g" x1="0" x2="1" y1="0" y2="1">
							<stop offset="0" stop-color="#1a48ff" stop-opacity=".18"/>
							<stop offset="1" stop-color="#1a48ff" stop-opacity="0"/>
						</linearGradient>
					</defs>
					<rect x="0" y="0" width="400" height="260" rx="16" fill="url(#e404g)"/>
					<g stroke="#1a48ff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".65">
						<circle cx="200" cy="130" r="72"/>
						<path d="M164 130h72M200 94v72"/>
						<circle cx="80" cy="60" r="4"/>
						<circle cx="330" cy="200" r="4"/>
						<circle cx="60" cy="210" r="4"/>
						<circle cx="340" cy="50" r="4"/>
					</g>
				</svg>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
