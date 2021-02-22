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

		$button  = '<a href="' . esc_url( network_admin_url( 'plugin-install.php?tab=search&type=tag&s=brisko' ) ) . '" class="button button-secondary">';
		$button .= 'Install Plugin';
		$button .= '</a>';
		return "<p>Get Advanced Options and Custom features. Install the Brisko Elements Plugin.</p>$button";
	}

}
