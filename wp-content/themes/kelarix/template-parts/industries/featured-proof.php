<?php
/**
 * Industries: Featured Proof (4 numbered cards inside a panel).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Retail', 'Inventory Visibility and Store Performance System' ),
	2 => array( 'FMCG and Food and Beverage', 'Demand, Stockout, and Distributor Visibility System' ),
	3 => array( 'Financial Services', 'Compliance and Customer Operations Workflow System' ),
	4 => array( 'Healthcare', 'Healthcare Inventory and Operational Control System' ),
);
?>
<section class="section industries-proof">
	<div class="container">
		<div class="industries-proof__panel">
			<div class="industries-proof__head">
				<div class="industries-proof__head-left">
					<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'ip_badge', 'Featured Proof' ); ?></span>
					<h2 class="section__title section__title--light">
						<?php k_html( 'ip_heading', 'A structured path from<br>operational problem to<br>working system.' ); ?>
					</h2>
				</div>
				<p class="industries-proof__head-text">
					<?php k_text( 'ip_text', 'We do not start with technology. We start by understanding the business problem, the data reality, the workflow gaps, and the decisions leadership needs to make.' ); ?>
				</p>
			</div>

			<div class="industries-proof__grid">
				<?php $n = 1; foreach ( $defaults as $i => $item ) :
					$card  = k_field( 'ip_card_' . $i, array() );
					$tag   = ! empty( $card['tag'] ) ? $card['tag'] : $item[0];
					$title = ! empty( $card['title'] ) ? $card['title'] : $item[1];
					?>
					<article class="ip-card">
						<span class="ip-card__num"><?php echo esc_html( str_pad( $n, 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="ip-card__tag"><?php echo esc_html( $tag ); ?></h3>
						<p class="ip-card__title"><?php echo esc_html( $title ); ?></p>
					</article>
				<?php $n++; endforeach; ?>
			</div>

			<div class="industries-proof__cta">
				<a href="#" class="btn btn--white"><span>Explore Proof</span><?php echo k_arrow(); ?></a>
			</div>
		</div>
	</div>
</section>
