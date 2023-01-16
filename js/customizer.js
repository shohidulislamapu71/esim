/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// external js: isotope.pkgd.js
// https://isotope.metafizzy.co/

// init Isotope
var iso = new Isotope( '.grid', {
	itemSelector: '.element-item',
	layoutMode: 'fitRows'
  });
  
  // filter functions
  var filterFns = {
	// show if name ends with -ium
	ium: function( itemElem ) {
	  var name = itemElem.querySelector('.name').textContent;
	  return name.match( /ium$/ );
	}
  };
  
  // bind filter button click
  var filtersElem = document.querySelector('.filters-button-group');
  filtersElem.addEventListener( 'click', function( event ) {
	// only work with buttons
	if ( !matchesSelector( event.target, 'button' ) ) {
	  return;
	}
	var filterValue = event.target.getAttribute('data-filter');
	// use matching filter function
	filterValue = filterFns[ filterValue ] || filterValue;
	iso.arrange({ filter: filterValue });
  });
  
  // change is-checked class on buttons
  var buttonGroups = document.querySelectorAll('.button-group');
  for ( var i=0, len = buttonGroups.length; i < len; i++ ) {
	var buttonGroup = buttonGroups[i];
	radioButtonGroup( buttonGroup );
  }
  function radioButtonGroup( buttonGroup ) {
	buttonGroup.addEventListener( 'click', function( event ) {
	  // only work with buttons
	  if ( !matchesSelector( event.target, 'button' ) ) {
		return;
	  }
	  buttonGroup.querySelector('.is-checked').classList.remove('is-checked');
	  event.target.classList.add('is-checked');
	});
  
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





