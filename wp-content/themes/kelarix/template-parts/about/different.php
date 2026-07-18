<?php
/**
 * About: What Makes Kelarix Different (dark accordion).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'We start with operating problems', 'We focus on the operational problem, not tool selection, so systems address the real cause of friction.', 'clipboard' ),
	2 => array( 'We connect capabilities into systems', 'Analytics, automation, AI, and software work together in one connected system, not in isolation.', 'workflow' ),
	3 => array( 'We focus on executive outcomes', 'Every system supports specific leadership decisions, visibility needs, and business execution.', 'clock' ),
	4 => array( 'We design around real users and roles', 'Workflows, permissions, and interfaces reflect the people and roles that actually use them.', 'scatter' ),
	5 => array( 'We respect sensitive work', 'Client processes, data, and business context stay confidential and protected.', 'x' ),
	6 => array( 'We build for practical adoption', 'Systems are designed so teams can actually use, maintain, and rely on them long term.', 'ai' ),
);
?>
<section class="section about-different">
	<div class="container about-different__inner">
		<div class="about-different__aside">
			<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'diff_badge', 'What Makes Kelarix Different' ); ?></span>
			<h2 class="section__title section__title--light about-different__title">
				<?php k_html( 'diff_heading', 'Not a vendor. Not a<br>dashboard shop.<br>Not an AI hype<br>company.' ); ?>
			</h2>
			<p class="about-different__text">
				<?php k_text( 'diff_text', 'Kelarix is built for businesses that need their data, workflows, software, and decisions to work together more clearly.' ); ?>
			</p>
		</div>

		<div class="about-different__list" data-accordion>
			<?php for ( $i = 1; $i <= 6; $i++ ) :
				$item    = k_field( 'diff_item_' . $i, array() );
				$title   = ! empty( $item['title'] ) ? $item['title'] : $defaults[ $i ][0];
				$text    = ! empty( $item['text'] ) ? $item['text'] : $defaults[ $i ][1];
				$icon    = ! empty( $item['icon'] ) ? $item['icon'] : $defaults[ $i ][2];
				$is_open = ( 1 === $i );
				?>
				<div class="diff-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="diff-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="diff-item__dot" aria-hidden="true"><?php echo k_icon( $icon ); ?></span>
						<span class="diff-item__title"><?php echo esc_html( $title ); ?></span>
						<span class="diff-item__toggle" aria-hidden="true"></span>
					</button>
					<div class="diff-item__body">
						<p><?php echo esc_html( $text ); ?></p>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
