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

	// Link color
    wp.customize( 'link_color', function( value ) {
      value.bind( function( to ) {
        $('body a').css('color', to );
        $('button, input[type="button"], input[type="reset"], input[type="submit"]').css('background-color', to );
        $('button, input[type="button"], input[type="reset"], input[type="submit"]').css('border-color', to );
      } );
    } );

  // footer copyright text
  wp.customize( 'footer_copyright', function( value ) {
    value.bind( function( to ) {
      $( '.brisko-footer-copyright' ).text( to );
    } );
  } );

  // cat-links
  wp.customize( 'display_post_categories', function( value ) {
    value.bind( function( to ) {
		if ( false === to ) {
			$( '.cat-links' ).addClass( "this-display-none" );
		} else {
			$( '.cat-links' ).removeClass( "this-display-none" );
		}
    } );
  } );

  // footer poweredby
  wp.customize( 'poweredby', function( value ) {
    value.bind( function( to ) {
      $( '.brisko-footer-poweredby' ).html( to );
    } );
  } );

	// TODO Post Featured Image

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
