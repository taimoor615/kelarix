<?php
/**
 * Site footer.
 *
 * @package Kelarix
 */
?>
<footer class="site-footer" id="contact">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-footer__logo"><?php bloginfo( 'name' ); ?></a>
			<p class="site-footer__about">
				<?php echo esc_html( kelarix_opt( 'footer_about', 'AI agents that automate work, scale operations and give your team time back.' ) ); ?>
			</p>
			<div class="site-footer__social">
				<a href="<?php echo esc_url( kelarix_opt( 'footer_linkedin', '#' ) ); ?>" aria-label="LinkedIn"><?php echo k_icon( 'linkedin' ); ?></a>
				<a href="<?php echo esc_url( kelarix_opt( 'footer_instagram', '#' ) ); ?>" aria-label="Instagram"><?php echo k_icon( 'instagram' ); ?></a>
			</div>
		</div>

		<div class="site-footer__col">
			<h4 class="site-footer__title"><?php echo esc_html( kelarix_opt( 'footer_col1_title', 'Quick links' ) ); ?></h4>
			<ul class="site-footer__list">
				<li><a href="#">About Us</a></li>
				<li><a href="#">Solutions</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>

		<div class="site-footer__col">
			<h4 class="site-footer__title"><?php echo esc_html( kelarix_opt( 'footer_col2_title', "Industry's" ) ); ?></h4>
			<ul class="site-footer__list">
				<li><a href="#">Retail</a></li>
				<li><a href="#">FMCG &amp; F&amp;B</a></li>
				<li><a href="#">Financial</a></li>
				<li><a href="#">Healthcare</a></li>
			</ul>
		</div>

		<div class="site-footer__col site-footer__build">
			<h4 class="site-footer__title"><?php echo esc_html( kelarix_opt( 'footer_build_title', 'Build your team:' ) ); ?></h4>
			<p><?php echo esc_html( kelarix_opt( 'footer_build_text', 'Get tips, product updates, and insights on working smarter with AI.' ) ); ?></p>
			<a href="<?php echo esc_url( kelarix_opt( 'footer_build_cta_url', '#contact' ) ); ?>" class="btn btn--primary btn--sm"><span><?php echo esc_html( kelarix_opt( 'footer_build_cta_text', 'Request a Diagnostic Conversation' ) ); ?></span><?php echo k_arrow(); ?></a>
		</div>
	</div>

	<div class="container site-footer__bottom">
		<p><?php echo esc_html( str_replace( '{year}', date( 'Y' ), kelarix_opt( 'footer_copyright', '© {year} Kelarix. All rights reserved.' ) ) ); ?></p>
		<p><?php echo esc_html( kelarix_opt( 'footer_email_line', 'Build your team: info@kelarix.com' ) ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
