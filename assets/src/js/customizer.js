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

	// site-navigation
    wp.customize( 'disable_nav_menu', function( value ) {
	  	value.bind( function( to ) {
	  	  	if ( true === to ) {
	  		  	$( '#site-navigation' ).addClass( "this-display-none" );
	  	  	} else {
	  		  	$( '#site-navigation' ).removeClass( "this-display-none" );
	  	  	}
	  	} );
    } );

	// disable_navigation
    wp.customize( 'disable_navigation', function( value ) {
	  	value.bind( function( to ) {
	  	  	if ( true === to ) {
	  		  	$( '#navigation' ).addClass( "this-display-none" );
	  	  	} else {
	  		  	$( '#navigation' ).removeClass( "this-display-none" );
	  	  	}
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

	// Navigation background color
    wp.customize( 'nav_background_color', function( value ) {
      	value.bind( function( to ) {
        	$('.brisko-navigation').css('background-color', to );
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

  // tags-links
  wp.customize( 'display_tags', function( value ) {
	value.bind( function( to ) {
	  	if ( false === to ) {
		  	$( '.tags-links' ).addClass( "this-display-none" );
	  	} else {
		  	$( '.tags-links' ).removeClass( "this-display-none" );
	  	}
	} );
  } );

  // post-navigation
  wp.customize( 'display_previous_next', function( value ) {
	value.bind( function( to ) {
	  	if ( false === to ) {
		  	$( '.post-navigation' ).addClass( "this-display-none" );
	  	} else {
		  	$( '.post-navigation' ).removeClass( "this-display-none" );
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

	// site-footer
    wp.customize( 'disable_footer', function( value ) {
	  	value.bind( function( to ) {
	  	  	if ( true === to ) {
	  		  	$( '.site-footer' ).addClass( "this-display-none" );
	  	  	} else {
	  		  	$( '.site-footer' ).removeClass( "this-display-none" );
	  	  	}
	  	} );
    } );

	// Footer Links color.
    wp.customize( 'footer_links_color', function( value ) {
      	value.bind( function( to ) {
        	$('.site-footer a').css('color', to );
      	} );
    } );

	// Footer Text color.
    wp.customize( 'footer_text_color', function( value ) {
      	value.bind( function( to ) {
        	$('.site-footer').css('color', to );
      	} );
    } );

	// Footer background color.
    wp.customize( 'footer_background_color', function( value ) {
      	value.bind( function( to ) {
        	$('.site-footer').css('background-color', to );
      	} );
    } );

	// Footer Border color.
    wp.customize( 'footer_border_color', function( value ) {
      	value.bind( function( to ) {
        	$('.site-footer').css('border-color', to );
      	} );
    } );

}( jQuery ) );
