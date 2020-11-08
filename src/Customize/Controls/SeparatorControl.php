<?php

namespace Brisko\Customize\Controls;

/**
 * Class SeparatorControl
 *
 * Custom control to display separator
 */
class SeparatorControl extends \WP_Customize_Control {

	/**
	 * Separator output
	 *
	 * @return void
	 */
	public function render_content() {
		?><br/>
		<div class="customize-section-title">
			<h3 style="color: #1c66c2;font-weight: 400;border-top: 1px solid #ddd;padding: 5px 5px 5px 14px;font-size: initial;">
				<?php echo esc_html( $this->label ); ?>
			</h3>
		</div>
		<?php
	}
}
