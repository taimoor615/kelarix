<?php
/**
 * Site header.
 *
 * @package Kelarix
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" data-header>
	<div class="container">
		<div class="site-header__bar">
			<div class="site-header__brand">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</div>

			<nav class="site-nav" aria-label="<?php esc_attr_e( 'Primary', 'kelarix' ); ?>">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav__list',
						'depth'          => 2,
					) );
				} else {
					echo '<ul class="site-nav__list">';
					foreach ( array( 'Services', 'About', 'Industries', 'Solutions', 'Insights' ) as $item ) {
						echo '<li><a href="#">' . esc_html( $item ) . '</a></li>';
					}
					echo '</ul>';
				}
				?>
			</nav>

			<div class="site-header__cta">
				<a href="<?php echo esc_url( kelarix_opt( 'header_cta_url', '#contact' ) ); ?>" class="btn btn--white btn--sm">
					<span><?php echo esc_html( kelarix_opt( 'header_cta_text', 'Request a Diagnostic Conversation' ) ); ?></span>
					<?php echo k_arrow(); ?>
				</a>
			</div>

			<button class="site-header__toggle" data-nav-toggle aria-label="<?php esc_attr_e( 'Toggle menu', 'kelarix' ); ?>" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<a href="<?php echo esc_url( kelarix_opt( 'header_cta_url', '#contact' ) ); ?>" class="mobile-floating-cta" aria-label="<?php echo esc_attr( kelarix_opt( 'header_cta_text', 'Request a Diagnostic Conversation' ) ); ?>">
	<span class="mobile-floating-cta__text"><?php echo esc_html( kelarix_opt( 'header_cta_text', 'Request a Diagnostic Conversation' ) ); ?></span>
	<span class="mobile-floating-cta__icon" aria-hidden="true">
		<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
	</span>
</a>
