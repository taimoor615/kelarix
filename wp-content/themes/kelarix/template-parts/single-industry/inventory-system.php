<?php
/**
 * Single Industry: Scenario study — Concept Explores (blue) offset over Demonstrates (white).
 *
 * @package Kelarix
 */
$explores = array(
	'FMCG operating-pressure map',
	'Demand and product-availability views',
	'Distributor and regional comparison',
	'Inventory movement and stockout risks',
	'Slow-moving product visibility',
	'Exception and escalation workflows',
	'Data-flow structure',
	'Role-based visibility',
	'Before-and-after operating logic',
	'Governance and access considerations',
);
?>
<section class="section sind-inventory">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'sind_inv_badge', 'Scenario Study and System Concept' ); ?></span>
			<h2 class="section__title section__title--light sind-inventory__title">
				<?php k_html( 'sind_inv_heading', 'Inventory Visibility and Store<br>Performance System' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'sind_inv_text', 'A scenario-based proof asset exploring how a multi-location retailer could connect inventory, store performance, returns, sales, and operational exceptions into one clearer leadership view.' ); ?>
			</p>
		</div>

		<div class="sind-inventory__panel">
			<div class="sind-inventory__card sind-inventory__card--k">
				<h3 class="sind-inventory__sub"><?php k_text( 'sind_inv_col1_title', 'The Concept Explores' ); ?></h3>
				<ul class="sind-inventory__list">
					<?php foreach ( $explores as $item ) : ?>
						<li><span class="sind-inventory__check" aria-hidden="true">
							<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
						</span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="sind-inventory__card sind-inventory__card--white">
				<h3 class="sind-inventory__sub"><?php k_text( 'sind_inv_col2_title', 'What It Demonstrates' ); ?></h3>
				<p class="sind-inventory__desc"><?php k_text( 'sind_inv_col2_text', 'The concept shows how Kelarix translates realistic FMCG operating pressure into a connected system across data, dashboards, workflows, decision support, and software.' ); ?></p>
				<?php k_button( 'sind_inv_cta', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' ); ?>
			</div>
		</div>

		<div class="sind-inventory__note">
			<p><?php k_text( 'sind_inv_scenario_note', 'A scenario-based concept reflecting common FMCG and Food &amp; Beverage challenges.' ); ?></p>
		</div>
	</div>
</section>
