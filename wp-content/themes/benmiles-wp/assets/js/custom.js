/* ON SCROLL... ***************************************************************/

var opacityMin = 0.25, // initial background-color-opacity for nav
    opacityMax = 1, // background-color-opacity for nav at bottom of Intro section
    rgbMin = 255, // initial rgb() color for nav items
    rgbMax = 119; // rgb() color for nav items at bottom of Intro section

$( window ).scroll( function( e ){

    // Apply animations
    applyAnimations();

    // Determine scroll
    var pxToTop = $( this ).scrollTop(), // px between top of viewport and top of document ( 0 = scrolled all the way up )
        pxClientHeight = document.getElementById( 'hey' ).clientHeight; // px height of the Intro section (100vh)

    if( pxToTop < pxClientHeight ){

        var scrollProgress = ( pxToTop / pxClientHeight ).toFixed( 1 ), // decimal ( 0.0 - 1.0 ) representing percentage of scroll position in Intro section
            opacity = ( opacityMin + ( scrollProgress * ( opacityMax - opacityMin ) ) ).toFixed( 2 ),
            rgb = Math.round( rgbMin - ( scrollProgress * ( rgbMin - rgbMax ) ) );

        $( 'nav' ).css( 'background-color', 'rgba( 255, 255, 255, ' + opacity + ' )' );
        $( '.navbar-brand, .nav-link, .navbar-toggler-right' ).css( 'color', 'rgb( ' + rgb + ', ' + rgb + ', ' + rgb + ' )' );
        $( 'nav, .navbar-toggler' ).css( 'border-color', 'rgb( ' + rgb + ', ' + rgb + ', ' + rgb + ' )' );
        $( '#backToTop' ).css( 'opacity', scrollProgress );
    }

    else {
        $( 'nav' ).css( 'background-color', 'rgba( 255, 255, 255, ' + opacityMax + ' )' );
        $( '.navbar-brand, .nav-link, .navbar-toggler-right' ).css( 'color', 'rgb( ' + rgbMax + ', ' + rgbMax + ', ' + rgbMax + ' )' );
        $( 'nav, .navbar-toggler' ).css( 'border-color', 'rgb( ' + rgbMax + ', ' + rgbMax + ', ' + rgbMax + ' )' );
        $( '#backToTop' ).css( 'opacity', 1 );
    }

} );

/* ON CLICK... ****************************************************************/
// ...Auto-Scrolling Links/Buttons
$( '.scroll' ).click( function( e ) {
    // Prevent anchor click from following href attribute
    e.preventDefault;
    // Get clicked link/button's destination section from data-section attribute
    var $section = $( this ).data( 'section' );
    // Close the mobile menu
    $( '#navbarCollapse' ).collapse( 'hide' );
    // Scroll to the section from the link's data-section attribute
    $( 'html, body' )
        .animate(
            { scrollTop: $( '#' + $section ).offset().top },
            1000
        );
});

// Gallery /////////////////////////////////////////////////////////////////////
// var $galleryitem = $( '.gallery-item' ),
//     $modal = $( '#modal' ),
//     id;

// // On click of gallery item
// $galleryitem.click( this, function(){

//     // Fetch and interpret data for this gallery item
//     var $this = $( this ),
//         id = $( this ).data( 'id' ),
//         data = jsonPortfolio[id];

//     // title
//     // var title = $( '<h2>', { text: ( data.client ? data.client + ': ' : '' ) + data.title } );
//     var title = $( '<h2>', { html: data.title } ),
//         client = $( '<h6>', { class: 'client', html: data.client ? '<small>CLIENT: ' + data.client + '</small>' : '' } ),
//         agency = $( '<h6>', { class: 'agency', html: data.agency ? '<small>AGENCY: ' + data.agency + '</small>' : '' } );
//     $modal.find( '.header' ).html( title ).append( client, agency );

//     // meta
//     var date = $( '<small>', { text: data.date, class: 'date' } ),
//         cats = $( '<small>', { text: data.cats.join(', '), class: 'cats' } ),
//         tags = $( '<small>', { text: data.tags.join(', '), class: 'tags' } );
//     $modal.find( '.meta' ).html( date ).append( cats ).append( tags );

//     // thumbs
//     $modal.find( '.thumbs' ).html('');
//     if( data.img.gallery.length >= 2 ){
//         for ( i = 0; i < data.img.gallery.length; i++ ) {
//             var thumbImg = $( '<img>', { class: 'img-fluid', src: 'img/portfolio/' +  data.img.gallery[i].thumb } ),
//                 thumb = $( '<a>', { class: 'thumb', 'data-full': data.img.gallery[i].full, href: 'javascript:void(0)' } ).append( thumbImg );
//             $modal.find( '.thumbs' ).append( thumb );
//         }
//         $modal.find( '.thumbs' ).show( 0 );
//     } else {
//         $modal.find( '.thumbs' ).hide( 0 );
//     }

//     // body
//     var link = ( data.link ?  $( '<a>', { href: data.link, text: data.link, target: '_blank', class: 'external' } ) : '' );
//     $modal.find( '.body' ).html( data.description ).append( link );

//     $modal.find( '.image > .wrapper' ).html( '<img src="/wp-content/themes/benmiles-wp/img/portfolio/' + data.img.gallery[0].full + '" />' );

//     // show modal
//     $modal.modal( 'show' );
// } );

// On click of gallery item details item (!)
// $( '.thumbs' ).on( 'click', '.thumb', function(){
//     var full = $( this ).data( 'full' );
//     $modal.find( '.image > .wrapper' ).html( '<img src="/wp-content/themes/benmiles-wp/img/portfolio/' + full + '" />' );
// } );

// Footer social menu //////////////////////////////////////////////////////////
var $footer = $( "footer" ),
    color = {
        facebook: "#3b5998",
        twitter: "#1da1f2",
        instagram: "radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)),"
                     + "linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%)",
        linkedin: "#283e4a",
        codepen: "#191919",
        github: "#959da5"
    };
$( "a" ).hover( function(){
  var thisSocial = $( this ).attr( "class" );
  $footer.css( "background", color[thisSocial] );
} );
$( ".social" ).mouseleave( function(){
  $footer.css( "background", "#111111" );
} );

/* FUNCTIONS... ***************************************************************/

// Checks if an element is visible (within the viewport)
(function($) {
/** Copyright 2012, Digital Fusion
* Licensed under the MIT license.
* http://teamdf.com/jquery-plugins/license/
* @author Sam Sehnert
*/
  $.fn.visible = function(partial) {
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
  };
})(jQuery);

// Applys animation-type class to a visible element with a data-animation attribute
function applyAnimations(){
    $( '.animated' ).each( function( i, el ) {
        var el = $( el );
        var animation = $( el ).data( 'animation');
        if ( el.visible( true ) ) {
            el.addClass( animation );
        }
    } );
}

/* ISOTOPE ********************************************************************/

// INIT
var isotope = new Isotope(
	'#gallery', 
	{
		itemSelector: '.gallery-item',
		getSortData: {
			agency: '.agency',
			client: '.client',
			date: '[data-date]',
			title: '.title'
		},
		sortAscending: {
			date: false
		},
		masonry: {
			columnWidth: '.gallery-item.square'
		},
		sortBy: 'date',
		filter: '*'
	}
);

// FILTER
var isotopeFilterBtns = document.getElementsByClassName('btn-filter');
function isotopeFilter(el){
	// clear other btns' active states
	for(isotopeFilterBtn of isotopeFilterBtns){
		isotopeFilterBtn.classList.remove( 'active' );
	}
	// set this btn active
	el.classList.add( 'active' );
	// set filter to btn's data-filter value
	var filter = el.getAttribute( 'data-filter' );
	// filter
	isotope.arrange( { filter: filter } );
};

// SORT
var isotopeSortBtns = document.getElementsByClassName('btn-sort');
function isotopeSort(el){
	// clear other btns' active states
	for(isotopeSortBtn of isotopeSortBtns){
		isotopeSortBtn.classList.remove('active');
	}
	// set this btn active
	el.classList.add( 'active' );
	// set sort to btn's data-sort value
	var sort = el.getAttribute( 'data-sort' );
	// sort
	isotope.arrange( { sortBy: sort } );
};