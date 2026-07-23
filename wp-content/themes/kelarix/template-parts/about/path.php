<?php
/**
 * About: A structured path — Systems-We-Build style cards using kx_process CPT.
 *
 * @package Kelarix
 */
$icons = array(
	1 => 'scatter',
	2 => 'workflow',
	3 => 'window',
	4 => 'database',
	5 => 'ai',
	6 => 'clock',
);
$defaults = array(
	array( 'Diagnose', 'Understand the business problem, visibility gaps, workflow friction, decision needs, and data reality.' ),
	array( 'Map', 'Map data sources, processes, roles, systems, bottlenecks, dependencies, and reporting gaps.' ),
	array( 'Design', 'Define the right system, workflows, dashboards, user journeys, architecture, and success criteria.' ),
	array( 'Build', 'Develop the data layer, dashboards, automation, AI assisted features, and custom software components.' ),
	array( 'Integrate', 'Connect the system with existing tools, data sources, workflows, and teams.' ),
	array( 'Improve', 'Refine based on adoption, feedback, performance, and changing business needs.' ),
);
$items = k_cpt_items( 'kx_process', $defaults );
?>
<section class="section about-path">
	<div class="container about-path__inner">
		<div class="about-path__aside">
			<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'path_badge', 'How We Work' ); ?></span>
			<h2 class="section__title about-path__title">
				<?php k_html( 'path_heading', 'A structured path from<br>business problem to working<br>system.' ); ?>
			</h2>
			<p class="about-path__text">
				<?php k_text( 'path_text', 'We do not start with technology for its own sake. We start by understanding where visibility, workflow control, data quality, and decision making need to improve — then move step by step.' ); ?>
			</p>
			<div class="about-path__actions">
				<?php
				k_button( 'path_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'path_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
				?>
			</div>
		</div>

		<div class="about-path__list">
			<?php
			$n = 1;
			foreach ( $items as $item ) :
				if ( $item instanceof WP_Post ) {
					$title    = get_the_title( $item );
					$desc     = k_field( 'description', '', $item->ID );
					$icon_key = k_field( 'icon', $icons[ $n ] ?? 'scatter', $item->ID );
				} else {
					$title    = $item[0];
					$desc     = $item[1];
					$icon_key = $icons[ $n ] ?? 'scatter';
				}
				$corner = ( 1 === $n % 2 ) ? 'path-step--tr' : 'path-step--bl';
				?>
				<article class="path-step <?php echo esc_attr( $corner ); ?>">
					<span class="path-step__icon"><?php echo k_icon_render( $icon_key, is_string( $icon_key ) ? $icon_key : 'scatter' ); ?></span>
					<h3 class="path-step__title"><?php echo esc_html( $title ); ?></h3>
					<p class="path-step__text"><?php echo esc_html( $desc ); ?></p>
				</article>
			<?php $n++; endforeach; ?>
		</div>
	</div>
</section>
