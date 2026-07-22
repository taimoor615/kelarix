<?php
/**
 * Site footer — content pulled from Site Settings ACF page.
 *
 * @package Kelarix
 */
$linkedin       = k_setting( 'footer_linkedin', array() );
$instagram      = k_setting( 'footer_instagram', array() );
$linkedin_url   = ! empty( $linkedin['url'] ) ? $linkedin['url'] : '#';
$instagram_url  = ! empty( $instagram['url'] ) ? $instagram['url'] : '#';
$linkedin_icon  = k_setting( 'footer_linkedin_icon', 'linkedin' );
$instagram_icon = k_setting( 'footer_instagram_icon', 'instagram' );

$build_cta      = k_setting( 'footer_build_cta', array() );
$build_cta_url  = ! empty( $build_cta['url'] ) ? $build_cta['url'] : '#contact';
$build_cta_text = ! empty( $build_cta['title'] ) ? $build_cta['title'] : 'Request a Diagnostic Conversation';

$email = k_setting( 'footer_email', 'info@kelarix.com' );
?>
<footer class="site-footer" id="contact">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-footer__logo"><?php echo esc_html( k_setting( 'footer_logo_text', get_bloginfo( 'name' ) ) ); ?></a>
			<p class="site-footer__about">
				<?php echo esc_html( k_setting( 'footer_about', 'AI agents that automate work, scale operations and give your team time back.' ) ); ?>
			</p>
			<div class="site-footer__social">
				<a href="<?php echo esc_url( $linkedin_url ); ?>" aria-label="LinkedIn" target="_blank" rel="noopener"><?php echo k_icon( $linkedin_icon ); ?></a>
				<a href="<?php echo esc_url( $instagram_url ); ?>" aria-label="Instagram" target="_blank" rel="noopener"><?php echo k_icon( $instagram_icon ); ?></a>
			</div>
		</div>

		<div class="site-footer__col">
			<h4 class="site-footer__title"><?php echo esc_html( k_setting( 'footer_col1_title', 'Quick links' ) ); ?></h4>
			<ul class="site-footer__list">
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$link = k_setting( 'footer_col1_link_' . $i, array() );
					if ( empty( $link['title'] ) ) {
						continue;
					}
					$target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
					?>
					<li><a href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"<?php echo $target; // phpcs:ignore ?>><?php echo esc_html( $link['title'] ); ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>

		<div class="site-footer__col">
			<h4 class="site-footer__title"><?php echo esc_html( k_setting( 'footer_col2_title', "Industry's" ) ); ?></h4>
			<ul class="site-footer__list">
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$link = k_setting( 'footer_col2_link_' . $i, array() );
					if ( empty( $link['title'] ) ) {
						continue;
					}
					$target = ! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
					?>
					<li><a href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"<?php echo $target; // phpcs:ignore ?>><?php echo esc_html( $link['title'] ); ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>

		<div class="site-footer__col site-footer__build">
			<h4 class="site-footer__title"><?php echo esc_html( k_setting( 'footer_build_title', 'Build your team:' ) ); ?></h4>
			<p><?php echo esc_html( k_setting( 'footer_build_text', 'Get tips, product updates, and insights on working smarter with AI.' ) ); ?></p>
			<a href="<?php echo esc_url( $build_cta_url ); ?>" class="btn btn--primary btn--sm"><span><?php echo esc_html( $build_cta_text ); ?></span><?php echo k_arrow(); ?></a>
		</div>
	</div>

	<div class="container site-footer__bottom">
		<p><?php echo esc_html( str_replace( '{year}', date( 'Y' ), k_setting( 'footer_copyright', '© {year} Kelarix. All rights reserved.' ) ) ); ?></p>
		<p>
			<?php echo esc_html( k_setting( 'footer_email_label', 'Build your team:' ) ); ?>
			<a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>" class="site-footer__email"><?php echo esc_html( antispambot( $email ) ); ?></a>
		</p>
	</div>
</footer>

<!-- Request a Diagnostic Conversation modal — opens on click of any [data-modal-open="request"], a[href="#contact"], or the mobile floating CTA -->
<div class="request-modal" id="requestModal" role="dialog" aria-modal="true" aria-labelledby="requestModalTitle" aria-hidden="true">
	<div class="request-modal__backdrop" data-modal-close></div>
	<div class="request-modal__panel" role="document">
		<button type="button" class="request-modal__close" data-modal-close aria-label="<?php esc_attr_e( 'Close', 'kelarix' ); ?>">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
		</button>
		<h2 class="request-modal__title" id="requestModalTitle">
			<?php echo esc_html( k_setting( 'request_modal_title', 'Share enough context for a serious first review.' ) ); ?>
		</h2>
		<div class="request-modal__body">
			<?php
			$shortcode = k_setting( 'request_modal_shortcode', '' );
			if ( $shortcode ) {
				echo do_shortcode( $shortcode ); // phpcs:ignore
			} else {
				echo '<p class="request-modal__placeholder">Paste your Contact Form 7 shortcode in <strong>Pages → Site Settings → Request Modal → Shortcode</strong>. Example: <code>[contact-form-7 id="123" title="Diagnostic Request"]</code></p>';
			}
			?>
			<div class="request-modal__thanks" hidden>
				<div class="request-modal__thanks-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
				</div>
				<h3><?php esc_html_e( 'Thank you — we have received your request.', 'kelarix' ); ?></h3>
				<p><?php esc_html_e( 'A Kelarix team member will reach out within one business day.', 'kelarix' ); ?></p>
				<button type="button" class="btn btn--white btn--sm" data-modal-close><span><?php esc_html_e( 'Close', 'kelarix' ); ?></span></button>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
