<?php
/**
 * Section: Built with the discipline (split + accordion).
 *
 * @package Kelarix
 */
$icons = array(
	1 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>',
	2 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M21 12a9 9 0 1 1-3-6.7M21 4v5h-5"/></svg>',
	3 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/></svg>',
	4 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l2.5 5.5L20 9l-4 4 1 6-5-3-5 3 1-6-4-4 5.5-.5z"/></svg>',
	5 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 9h5M8 13h8M8 17h6"/></svg>',
	6 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="9" cy="8" r="3"/><path d="M3 20c0-3.3 2.7-6 6-6M16 11a3 3 0 1 0-2-5.2M15 20c0-2.5 1.5-4.6 3.6-5.5"/></svg>',
	7 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3v18M3 8l9-5 9 5M3 16l9 5 9-5"/></svg>',
);
$defaults = array(
	1 => array( 'Confidentiality first', 'Sensitive client work, internal workflows, and business details are protected.' ),
	2 => array( 'Business first discovery', 'We start from the business problem, not the technology.' ),
	3 => array( 'Documentation discipline', 'Every system is documented so it can be maintained and scaled.' ),
	4 => array( 'Role based thinking', 'Systems are designed around the people and roles that use them.' ),
	5 => array( 'Data governance awareness', 'Structured, governed data that the business can trust.' ),
	6 => array( 'Human review where needed', 'Automation supports people; critical decisions keep human review.' ),
	7 => array( 'Scalable foundations', 'Built to grow with the business instead of being rebuilt later.' ),
);
?>
<section class="section section--accent discipline">
	<div class="container discipline__inner">
		<div class="discipline__aside">
			<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'discipline_badge', 'Our Value' ); ?></span>
			<h2 class="section__title section__title--light">
				<?php k_html( 'discipline_heading', 'Built with the discipline sensitive business systems require.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'discipline_text', 'Kelarix works with systems that affect reporting, workflows, operations, customer processes, internal visibility, and decision making. That requires clarity, confidentiality, documentation, governance, and responsible automation.' ); ?>
			</p>
		</div>

		<div class="discipline__list" data-accordion>
			<?php for ( $i = 1; $i <= 7; $i++ ) :
				$item    = k_field( 'discipline_item_' . $i, array() );
				$title   = ! empty( $item['title'] ) ? $item['title'] : $defaults[ $i ][0];
				$text    = ! empty( $item['text'] ) ? $item['text'] : $defaults[ $i ][1];
				$icon    = ! empty( $item['icon'] ) ? k_icon( $item['icon'] ) : $icons[ $i ];
				$is_open = ( 1 === $i );
				?>
				<div class="disc-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="disc-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="disc-item__icon"><?php echo $icon; // phpcs:ignore ?></span>
						<span class="disc-item__main">
							<span class="disc-item__title"><?php echo esc_html( $title ); ?></span>
							<span class="disc-item__text"><?php echo esc_html( $text ); ?></span>
						</span>
						<span class="disc-item__toggle" aria-hidden="true"></span>
					</button>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
