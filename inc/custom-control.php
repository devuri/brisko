<?php
if ( ! class_exists( 'Birsko_Separator_Control' ) ) {
	return null;
}

/**
 * Class Birsko_Separator_Control
 *
 * Custom control to display separator
 */
class Birsko_Separator_Control extends WP_Customize_Control {
	public function render_content() {
		?><br/>
		<div class="customize-section-title">
			<h3 style="color: #7f8285;font-weight: 400;">
				Footer Settings
			</h3>
		</div>
		<?php
	}
}
