<?php
	/**
	 * get_brisko_secondary_font
	 */
	if ( ! function_exists( 'get_brisko_secondary_font' ) ) :
		function get_brisko_secondary_font() {
			return 'secondary-font';
		}
	endif;

	/**
	 * brisko_secondary_font
	 */
	if ( ! function_exists( 'brisko_secondary_font' ) ) :
		function brisko_secondary_font() {
			echo	get_brisko_secondary_font();
		}
	endif;
