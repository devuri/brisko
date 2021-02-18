<?php

namespace Brisko\Customize\Controls;

/**
 * Class GroupSettings
 *
 * Custom control for grouped inputs
 */
class GroupSettings extends \WP_Customize_Control {

	/**
	 * HTML ouput
	 *
	 * @var array .
	 */
	public $html = array();

	/**
	 * Inline Display.
	 *
	 * @var array .
	 */
	public $inline = true;

	/**
	 * Label.
	 *
	 * @return void
	 */
	public function label() {
		?><label class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</label>
			<hr/>
			<p class="description" style="padding-right:8px; margin-top: unset;color: #848484;">
				<?php echo wp_kses_post( $this->description ); ?>
			</p>
		<?php
	}

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 *
	 * @since 3.4.0
	 */
	protected function render() {

		$display = ( ( $this->inline ) ? 'display:inline-flex;' : '' );

		$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
		$class = 'customize-control customize-control-' . $this->type;

		$this->label();

		printf( '<li  style="' . $display . ' color: #989898;" id="%s" class="%s">', esc_attr( $id ), esc_attr( $class ) );
		$this->render_content();
		echo '</li>';
	}

	/**
	 * Render HTML ouput of the field.
	 *
	 * @param  string $key     setting key.
	 * @param  string $setting setting value.
	 *
	 * @return void
	 */
	public function input_field( $key, $setting ) { // @codingStandardsIgnoreLine

		$value = '';
		$style = 'style="border-radius: 0; border-color: #dddddd;"';

		if ( isset( $this->settings[ $key ] ) ) {
			$value = $this->settings[ $key ]->value();
		}

		$this->html[] = '<div class="brisko-input-group">
		<input ' . $style . ' type="' . $this->type . '" value="' . $value . '" ' . $this->get_link( $key ) . ' />
		<label for="padding-control-top" class="brisko-input-control-label">
		' . ucfirst( $key ) . '</label></div>';
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
		foreach ( $this->settings as $key => $setting ) {
			$this->input_field( $key, $setting );
		}
		echo implode( '', $this->html ); // @codingStandardsIgnoreLine
	}

}
