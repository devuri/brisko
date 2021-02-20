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

}
