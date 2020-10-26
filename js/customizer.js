/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

  // footer copyright text
  wp.customize( 'brisko_options[copyright]', function( value ) {
    value.bind( function( to ) {
      $( '.brisko-footer-copyright' ).text( to );
    } );
  } );


	// Post Featured Image
	wp.customize( 'brisko_options[featured_image]', function( value ) {
		value.bind( function( val ) {
			  if ( true === val ) {
				$( '.post-featured-image' ).hide();
				console.log(val);
			} else if ( false === val) {
				$( '.post-featured-image' ).show();
				console.log(val);
			  }
		 } );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
}( jQuery ) );
