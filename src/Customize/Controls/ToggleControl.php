<?php

namespace Brisko\Customize\Controls;

/**
 * ToggleControl
 *
 * @link https://github.com/soderlind/class-customizer-toggle-control
 */
class ToggleControl extends \WP_Customize_Control {

	public $type = 'ios';

	/**
	 * Enqueue scripts/styles.
	 */
	public function enqueue() {

		//wp_register_style( 'customizer-toggle-control', get_template_directory_uri() . '/js/customizer-toggle-control.js', array( 'jquery' ), Theme::VERSION );
		wp_enqueue_script( 'customizer-toggle-control', get_template_directory_uri() . '/js/customizer/toggle-button-control.js', array( 'jquery' ), time(), true );
		wp_enqueue_style( 'pure-css-toggle-buttons', get_template_directory_uri() . '/css/customizer/toggle-buttons.css', array(), time() );
		//
		// wp_enqueue_script( 'customizer-toggle-control', get_template_directory_uri() . '/js/customizer-toggle-control.js', array( 'jquery' ), rand(), true );
		// wp_enqueue_style( 'pure-css-toggle-buttons', get_template_directory_uri() . '/pure-css-toggle-buttons/pure-css-togle-buttons.css' ), array(), rand() );

		$css = '
			.disabled-control-title {
				color: #a0a5aa;
			}
			input[type=checkbox].tgl-light:checked + .tgl-btn {
				background: #0085ba;
			}
			input[type=checkbox].tgl-light + .tgl-btn {
			  background: #a0a5aa;
			}
			input[type=checkbox].tgl-light + .tgl-btn:after {
			  background: #f7f7f7;
			}
			input[type=checkbox].tgl-ios:checked + .tgl-btn {
			  background: #0085ba;
			}
			input[type=checkbox].tgl-flat:checked + .tgl-btn {
			  border: 4px solid #0085ba;
			}
			input[type=checkbox].tgl-flat:checked + .tgl-btn:after {
			  background: #0085ba;
			}
		';
		wp_add_inline_style( 'pure-css-toggle-buttons', $css );
	}

	/**
	 * Render the control's content.
	 *
	 * @author soderlind
	 * @version 1.2.0
	 */
	public function render_content() {
		?>
		<label class="customize-toogle-label">
			<div style="display:flex;flex-direction: row;justify-content: flex-start;">
				<span class="toggle-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
				<input id="cb<?php echo $this->instance_number; ?>" type="checkbox" class="tgl tgl-<?php echo $this->type; ?>" value="<?php echo esc_attr( $this->value() ); ?>"
					<?php
						$this->link();
						checked( $this->value() );
					?>
				/>
				<label for="cb<?php echo $this->instance_number; ?>" class="tgl-btn"></label>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description">
				<?php echo $this->description; ?>
			</span>
			<?php endif; ?>
		</label>
		<?php
	}

}
