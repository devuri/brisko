<?php

namespace Brisko\Customize\Controls;

/**
 * Class SeparatorControl
 *
 * Custom control to display separator
 */
class HeaderControl extends \WP_Customize_Control {

	/**
	 * Render Control
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<label class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</label>
			<hr/>
		<?php
	}
}
