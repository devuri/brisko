<?php

namespace Brisko\Customize\Traits;

trait SettingsTrait {

	/**
	 * Customizer transport
	 *
	 * @var $transport
	 */
	public static $transport = 'postMessage';

	/**
	 * Brisko Section name only.
	 */
	public static function short_name() {
		$class = new \ReflectionClass( new self() );
		return strtolower( $class->getShortName() );
	}

	/**
	 * Brisko Section
	 */
	public static function section() {
		return 'brisko_section_' . self::short_name();
	}

	/**
	 * Brisko Section
	 */
	public static function install_plugin() {

		$css_style = 'padding: 16px;border-radius: 2px;font-style: italic;';

		$button  = '<a href="' . esc_url( network_admin_url( 'plugin-install.php?tab=search&type=tag&s=brisko' ) ) . '" class="button button-secondary">';
		$button .= __( 'Install Plugin', 'brisko' );
		$button .= '</a>';

		// render info.
		return sprintf(
			/* translators: %2$s: Plugin info. */
			__( '<p style="%1$s"> %2$s </p> %3$s', 'brisko' ),
			$css_style,
			'Get ' . ucwords( self::short_name() ) . ' Options and Custom features. Install the Brisko Elements Plugin.',
			$button
		);
	}

}
