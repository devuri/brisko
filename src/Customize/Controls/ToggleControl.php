<?php

namespace Brisko\Customize\Controls;

use Brisko\Setup\Assets;

/**
 * ToggleControl
 *
 * @link https://github.com/soderlind/class-customizer-toggle-control
 */
class ToggleControl extends \WP_Customize_Control {

	/**
	 * Button Type.
	 *
	 * Uses light, ios, flat.
	 *
	 * @var string
	 */
	public $type = 'ios';

	/**
	 * Enqueue scripts/styles.
	 */
	public function enqueue() {

		wp_enqueue_script( 'customizer-toggle-control', Assets::uri() . '/js/customizer/toggle-button-control.js', array( 'jquery' ), time(), true );
		wp_enqueue_style( 'css-toggle-buttons', Assets::uri() . '/css/customizer/toggle-buttons.css', array(), time() );

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
		wp_add_inline_style( 'css-toggle-buttons', $css );
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
			<div
				style="display:flex;flex-direction: row;justify-content: flex-start; padding: 4px;">
				<span class="toggle-control-title"
					style="flex: 2 0 0; vertical-align: middle; padding: 4px; font-size: 15px;">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<input id="cb<?php echo esc_attr( $this->instance_number ); ?>"
					type="checkbox" class="tgl tgl-<?php echo esc_attr( $this->type ); ?>"
					value="<?php echo esc_attr( $this->value() ); ?>"
					<?php
						$this->link();
						checked( $this->value() );
					?>
				/>
				<label for="cb<?php echo esc_attr( $this->instance_number ); ?>" class="tgl-btn"></label>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description" style="padding-left: 8px;">
				<?php echo wp_kses_post( $this->description ); ?>
			</span>
			<?php endif; ?>
		</label>
		<?php
	}

}
