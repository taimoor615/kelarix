<?php
/**
 * Section: A structured path (process steps, CPT: kx_process).
 *
 * @package Kelarix
 */
$defaults = array(
	array( 'Diagnose', 'Understand the business problem, visibility gaps, workflow pain, and decision needs.' ),
	array( 'Map', 'Map processes, data sources, roles, systems, bottlenecks, and reporting gaps.' ),
	array( 'Design', 'Define the right system, workflows, dashboards, user journeys, architecture, and success criteria.' ),
	array( 'Build', 'Develop the data layer, dashboards, automation, AI assisted features, and custom software.' ),
	array( 'Integrate', 'Connect the system with existing tools, data sources, workflows, and teams.' ),
	array( 'Improve', 'Refine the system based on usage, feedback, performance, and changing business needs.' ),
);
$items = k_cpt_items( 'kx_process', $defaults );
?>
<section class="section section--accent process">
	<div class="container">
		<div class="process__panel">
			<div class="process__head">
				<div class="process__head-left">
					<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'process_badge', 'Process' ); ?></span>
					<h2 class="section__title section__title--light">
						<?php k_html( 'process_heading', 'A structured path from operational problem to working system.' ); ?>
					</h2>
				</div>
				<p class="process__head-text">
					<?php k_text( 'process_text', 'We do not start with technology. We start by understanding the business problem, the data reality, the workflow gaps, and the decisions leadership needs to make.' ); ?>
				</p>
			</div>

			<div class="process__grid">
				<?php
				$n = 1;
				foreach ( $items as $item ) :
					if ( $item instanceof WP_Post ) {
						$title = get_the_title( $item );
						$desc  = k_field( 'description', '', $item->ID );
					} else {
						$title = $item[0];
						$desc  = $item[1];
					}
					$corner = ( 1 === $n % 2 ) ? 'process-step--br' : 'process-step--tl';
					?>
					<article class="process-step <?php echo esc_attr( $corner ); ?>">
						<span class="process-step__num"><?php echo esc_html( str_pad( $n, 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="process-step__title"><?php echo esc_html( $title ); ?></h3>
						<p class="process-step__desc"><?php echo esc_html( $desc ); ?></p>
					</article>
				<?php $n++; endforeach; ?>
			</div>
		</div>
	</div>
</section>
