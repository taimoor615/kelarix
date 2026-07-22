<?php
/**
 * Single Industry: Retail systems accordion — Solution tag + SUPPORTS chip list + close X.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array(
		'tag'      => 'Solution 1',
		'title'    => 'Retail Performance Intelligence System',
		'desc'     => 'A leadership view across stores, regions, products, channels, sales, margins, targets, and operating exceptions.',
		'supports' => "Store and channel comparison\nSales and margin visibility\nRegional performance monitoring\nProduct and category analysis\nExecutive reporting",
	),
	2 => array(
		'tag'      => 'Solution 2',
		'title'    => 'Inventory Visibility and Exception System',
		'desc'     => 'Visibility across stock positions, movement, and exceptions so teams can act before issues become losses.',
		'supports' => "Stock position tracking\nAgeing and slow movers\nStockout alerts\nExceptions workflow",
	),
	3 => array(
		'tag'      => 'Solution 3',
		'title'    => 'Returns and Refund Workflow System',
		'desc'     => 'Automated return handling, refund tracking, and workflow visibility.',
		'supports' => "Return case handling\nRefund tracking\nExceptions and escalation\nCustomer-service visibility",
	),
	4 => array(
		'tag'      => 'Solution 4',
		'title'    => 'Customer and Product Intelligence Layer',
		'desc'     => 'Combined product, customer, and channel intelligence for merchandising and margin teams.',
		'supports' => "Customer segmentation\nProduct performance\nChannel intelligence\nMargin drivers",
	),
	5 => array(
		'tag'      => 'Solution 5',
		'title'    => 'Retail Operations Platform',
		'desc'     => 'A shared operating layer for store managers, regional heads, and central operations.',
		'supports' => "Store execution\nRegional oversight\nCentral operations\nTask visibility",
	),
);
?>
<section class="section sind-systems">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'sind_sys_badge', 'What Kelarix Can Build' ); ?></span>
			<h2 class="section__title sind-systems__title">
				<?php k_html( 'sind_sys_heading', 'Retail systems built around the decisions<br>leadership needs to make.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'sind_sys_text', 'Kelarix combines retail operating context, data engineering, analytics, dashboards, workflow automation, AI readiness, and custom software to create connected systems — not isolated technology outputs.' ); ?>
			</p>
		</div>

		<div class="sind-systems__list" data-accordion>
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$card     = k_field( 'sind_sys_' . $i, array() );
				$tag      = ! empty( $card['tag'] ) ? $card['tag'] : $defaults[ $i ]['tag'];
				$title    = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ]['title'];
				$desc     = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ]['desc'];
				$supports = ! empty( $card['supports'] ) ? $card['supports'] : $defaults[ $i ]['supports'];
				$chips    = array_filter( array_map( 'trim', explode( "\n", (string) $supports ) ) );
				$is_open  = ( 1 === $i );
				?>
				<div class="sind-sys-item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
					<button class="sind-sys-item__head" data-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
						<span class="sind-sys-item__tag"><?php echo esc_html( $tag ); ?></span>
						<span class="sind-sys-item__title"><?php echo esc_html( $title ); ?></span>
						<span class="sind-sys-item__toggle" aria-hidden="true"></span>
					</button>
					<div class="sind-sys-item__body">
						<div class="sind-sys-item__grid">
							<div class="sind-sys-item__col">
								<p class="sind-sys-item__desc"><?php echo esc_html( $desc ); ?></p>
							</div>
							<div class="sind-sys-item__col">
								<h4 class="sind-sys-item__sub"><?php k_text( 'sind_sys_supports_label', 'SUPPORTS' ); ?></h4>
								<div class="sind-sys-item__chips">
									<?php foreach ( $chips as $chip ) : ?>
										<span class="chip"><?php echo esc_html( $chip ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>

		<div class="sind-systems__cta">
			<?php k_button( 'sind_sys_cta', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' ); ?>
		</div>
	</div>
</section>
