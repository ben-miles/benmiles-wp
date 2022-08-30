/* IMPORTS ********************************************************************/
import { spline } from "/wp-content/themes/benmiles-wp/assets/js/spline.min.js";
import SimplexNoise from "/wp-content/themes/benmiles-wp/assets/js/simplex-noise.min.js";

/* VARS ***********************************************************************/
let isotope;
let navToggle = document.getElementById('nav-toggle');
let navLinks = document.getElementsByClassName('nav-link');

/* ON LOAD... *****************************************************************/
window.onload = function(e){

	// Apply animations
    applyAnimations();

	// Home page only
	if(document.body.classList.contains('home')){
		// Animated blob effect on portrait
		animateBlob();
		// Update video sizes
		resizeVideoThumbnails();
		// Add event listeners to video thumbnails
		controlVideoThumbnails();
	}

	// Portfolio page only
	if(document.body.classList.contains('portfolio')){
		// Initialize Isotope
		initIsotope();
	}

};

/* ON SCROLL... ***************************************************************/
window.onscroll = function(e){

    // Apply animations
    applyAnimations();

	// Add or remove the 'scrolled' class, based on scroll position
	if( window.scrollY > 50 ){
		document.body.classList.add('scrolled');
	} else {
		document.body.classList.remove('scrolled');
	}

};

/* ON RESIZE... ***************************************************************/
window.onresize = function(e){

	// Home page only
	if (document.body.classList.contains('home')) {
		// Update video thumbnails
		resizeVideoThumbnails();
	}

	let vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
	for(let navLink of navLinks){
		if(vw < 768){
			navLink.addEventListener('click', toggleNav);
		} else {
			navLink.removeEventListener('click', toggleNav);
		}
	}

};

/* Footer social menu *********************************************************/
// var $footer = $( "footer" ),
//     color = {
//         linkedin: "#283e4a",
//         codepen: "#191919",
//         github: "#959da5"
//     };
// $( "a" ).hover( function(){
//   var thisSocial = $( this ).attr( "class" );
//   $footer.css( "background", color[thisSocial] );
// } );
// $( ".social" ).mouseleave( function(){
//   $footer.css( "background", "#111111" );
// } );

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
        var animation = $( el ).data('animation');
        if ( el.visible( true ) ) {
            el.addClass( animation );
        }
    } );
}

/* ISOTOPE ********************************************************************/

// INIT
function initIsotope(){
	isotope = new Isotope(
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
}

/* BLOB ***************************************************************************/
// Based on "Build a Smooth, Animated Blob Using SVG + JavaScript" by George Francis
// https://georgefrancis.dev/writing/build-a-smooth-animated-blob-with-svg-and-js/

const noiseStep = 0.0025;   // rate of speed
const effect = 10;          // range of motion
const numPoints = 6;        // number of  points
const rad = 90;             // radius of circle
const path = document.querySelector("svg#portrait path");
const simplex = new SimplexNoise();
const points = createPoints();

function animateBlob() {
  path.setAttribute("d", spline(points, 1, true));

  // for every point...
  for (let i = 0; i < points.length; i++) {
    const point = points[i];

    // return a pseudo random value between -1 / 1 based on this point's current x, y positions in "time"
    const nX = noise(point.noiseOffsetX, point.noiseOffsetX);
    const nY = noise(point.noiseOffsetY, point.noiseOffsetY);
    // map this noise value to a new value, somewhere between it's original location -20 and it's original location + 20
    const x = map(nX, -1, 1, point.originX - effect, point.originX + effect);
    const y = map(nY, -1, 1, point.originY - effect, point.originY + effect);

    // update the point's current coordinates
    point.x = x;
    point.y = y;

    // progress the point's x, y values through "time"
    point.noiseOffsetX += noiseStep;
    point.noiseOffsetY += noiseStep;
  }

  requestAnimationFrame(animateBlob);
};

function map(n, start1, end1, start2, end2) {
  return ((n - start1) / (end1 - start1)) * (end2 - start2) + start2;
}

function noise(x, y) {
  return simplex.noise2D(x, y);
}

function createPoints() {
  const points = [];
  // used to equally space each point around the circle
  const angleStep = (Math.PI * 2) / numPoints;
  for (let i = 1; i <= numPoints; i++) {
    // x & y coordinates of the current point
    const theta = i * angleStep;

    const x = 100 + Math.cos(theta) * rad;
    const y = 100 + Math.sin(theta) * rad;

    // store the point's position
    points.push({
      x: x,
      y: y,
      // we need to keep a reference to the point's original point for when we modulate the values later
      originX: x,
      originY: y,
      noiseOffsetX: Math.random() * 1000,
      noiseOffsetY: Math.random() * 1000
    });
  }

  return points;
}

/* Home > Portfolio: Video Thumbnails */
let portfolioItems = document.querySelectorAll('.portfolio-item.has-video');

/* Add event listeners to the Portfolio Items so that their videos only play on hover/mouseenter, and pause on mouseleave */
function controlVideoThumbnails () {
	for(let portfolioItem of portfolioItems){
		let video = portfolioItem.querySelector('.video');
		portfolioItem.addEventListener('mouseenter', function(e){video.play()});
		portfolioItem.addEventListener('mouseleave', function(e){video.pause()});
	}
}

/* Resize videos to match their corresponding image thumbnails, to avoid a "jump" when switching between them */
function resizeVideoThumbnails () {
	for(let portfolioItem of portfolioItems){
		let image = portfolioItem.querySelector('.image');
		let size = image.getBoundingClientRect();
		let video = portfolioItem.querySelector('.video');
		video.setAttribute('style','height: ' + (Math.round(size.height * 100) / 100) + 'px; width: ' + (Math.round(size.width * 100) / 100) + 'px;');
	}
}


// FILTER
let isotopeFilterBtns = document.getElementsByClassName('btn-filter');
for(let isotopeFilterBtn of isotopeFilterBtns){
	isotopeFilterBtn.addEventListener('click', isotopeFilter);
}
function isotopeFilter(el){
	console.log(event.target);
	// clear other btns' active states
	for(let isotopeFilterBtn of isotopeFilterBtns){
		isotopeFilterBtn.classList.remove( 'active' );
	}
	// set this btn active
	event.target.classList.add( 'active' );
	// set filter to btn's data-filter value
	var filter = el.getAttribute( 'data-filter' );
	// filter
	isotope.arrange( { filter: filter } );
};

// SORT
let isotopeSortBtns = document.getElementsByClassName('btn-sort');
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

// NAV TOGGLER


navToggle.addEventListener('click', toggleNav);
function toggleNav(){
	let menuIsOpen = document.body.classList.toggle('menu-open');
	navToggle.setAttribute('aria-expanded', menuIsOpen);
}

// TODO: Scroll from top to bottom slowly (for recording video thumbnails)
// let footer = document.getElementById('footer');
// console.log(footer);
// footer.scrollIntoView(true,{behavior:'smooth',block:'center',inline:'center'});