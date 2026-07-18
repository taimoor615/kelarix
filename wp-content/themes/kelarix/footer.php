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

<?php wp_footer(); ?>
</body>
</html>
