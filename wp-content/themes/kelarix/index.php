<?php
/**
 * Fallback template.
 *
 * @package Kelarix
 */

get_header();
?>
<main class="container" style="padding: var(--space-64) 0;">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
			<?php
		endwhile;
	else :
		echo '<p>' . esc_html__( 'Nothing found.', 'kelarix' ) . '</p>';
	endif;
	?>
</main>
<?php
get_footer();
