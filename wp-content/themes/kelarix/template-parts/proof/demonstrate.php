<?php
/**
 * Proof: How We Demonstrate Credibility (6 numbered cards).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Industry Pressure Maps', 'Visual breakdowns of the operating forces affecting an industry, including reporting pressure, workflow complexity, data fragmentation, compliance needs, and execution risk.' ),
	2 => array( 'Diagnostic Frameworks', 'Structured methods for identifying visibility gaps, data readiness issues, workflow friction, automation opportunities, and AI readiness.' ),
	3 => array( 'Anonymised Operating Patterns', 'Common business problems we see across industries, described without exposing client identities, internal systems, or protected details.' ),
	4 => array( 'System Concepts', 'Realistic examples of dashboards, workflows, internal tools, reporting layers, and operating systems designed around specific business problems.' ),
	5 => array( 'Demo Based Examples', 'Visual or lightweight prototype examples that show how a system could work in practice without revealing client work.' ),
	6 => array( 'Executive Briefs', 'Business focused thinking around industry pressure, operating complexity, data readiness, automation, and practical AI adoption.' ),
);
?>
<section class="section proof-demonstrate">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'demo_badge', 'How We Demonstrate Credibility' ); ?></span>
			<h2 class="section__title section__title--light proof-demonstrate__title">
				<?php k_html( 'demo_heading', 'We show how we diagnose, design, and<br>think through complex operating problems.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'demo_text', 'Our proof model is built around practical evidence. It shows how Kelarix understands industry pressure, identifies system gaps, maps workflows, structures data, and designs systems that improve visibility, decision quality, execution discipline, and scalable growth.' ); ?>
			</p>
		</div>

		<div class="proof-demonstrate__grid">
			<?php foreach ( $defaults as $i => $item ) :
				$card  = k_field( 'demo_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $item[1];
				?>
				<article class="demo-card">
					<span class="demo-card__num"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="demo-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="demo-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="proof-demonstrate__cta">
			<?php k_button( 'demo_cta', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' ); ?>
		</div>
	</div>
</section>
