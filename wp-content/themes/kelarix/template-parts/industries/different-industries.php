<?php
/**
 * Industries: Different industries, similar operating pressure (split + numbered cards).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Visibility gaps', 'Leadership cannot easily see what is happening across teams, systems, locations, departments, or workflows.' ),
	2 => array( 'Data fragmentation', 'Important information sits across tools, spreadsheets, platforms, documents, and manual reports.' ),
	3 => array( 'Workflow friction', 'Processes depend on emails, approvals, follow ups, and unclear ownership.' ),
	4 => array( 'Reporting delays', 'Teams spend too much time preparing reports instead of using information to make decisions.' ),
	5 => array( 'Execution risk', 'Problems are detected too late, ownership is unclear, and leadership has limited control over progress.' ),
	6 => array( 'AI readiness gaps', 'AI cannot create reliable value when data, workflows, permissions, and governance are not ready.' ),
);
?>
<section class="section industries-diff">
	<div class="container industries-diff__inner">
		<div class="industries-diff__aside">
			<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'diff_badge', 'Common Operating Problems' ); ?></span>
			<h2 class="section__title industries-diff__title">
				<?php k_html( 'diff_heading', 'Different industries. Similar operating pressure.' ); ?>
			</h2>
			<p class="industries-diff__text">
				<?php k_text( 'diff_text', 'Retail, FMCG, Financial Services, and Healthcare operate differently, but many leadership challenges follow the same pattern. Data becomes fragmented, workflows become manual, reporting becomes slow, and decisions become harder to make with confidence.' ); ?>
			</p>
			<div class="industries-diff__actions">
				<?php
				k_button( 'diff_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'diff_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
				?>
			</div>
		</div>

		<div class="industries-diff__list">
			<?php $n = 1; foreach ( $defaults as $i => $item ) :
				$card  = k_field( 'diff_item_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $item[1];
				?>
				<article class="diff-card">
					<span class="diff-card__num"><?php echo esc_html( str_pad( $n, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="diff-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="diff-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php $n++; endforeach; ?>
		</div>
	</div>
</section>
