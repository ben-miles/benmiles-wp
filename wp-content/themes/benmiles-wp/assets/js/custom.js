/* IMPORTS ********************************************************************/
import { spline } from "/wp-content/themes/benmiles-wp/assets/js/spline.min.js";
import SimplexNoise from "/wp-content/themes/benmiles-wp/assets/js/simplex-noise.min.js";

/* VARS ***********************************************************************/
// let isotope;
let navToggle = document.getElementById('nav-toggle');
let navLinks = document.getElementsByClassName('nav-link');

/* ON LOAD... *****************************************************************/
window.onload = function(e){

	// Apply animations
    applyAnimations();

	// Home only
	if( document.body.classList.contains('home') ){
		// Animated blob effect on portrait
		animateBlob();
	}

	// Home, Portfolio & Archives
	if( document.body.classList.contains('home') || document.body.classList.contains('portfolio') || document.body.classList.length == 0 ){
		// Update video sizes
		resizeVideoThumbnails();
		// Add event listeners to video thumbnails
		controlVideoThumbnails();
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

	// Home, Portfolio & Archives
	if( document.body.classList.contains('home') || document.body.classList.contains('portfolio') || document.body.classList.length == 0 ){
		// Update video thumbnails
		resizeVideoThumbnails();
	}

	// Add/Remove mobile menu toggle, based on viewport width
	let vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
	for(let navLink of navLinks){
		if(vw < 768){
			navLink.addEventListener('click', toggleNav);
		} else {
			navLink.removeEventListener('click', toggleNav);
		}
	}

};

/* isScrolledIntoView *********************************************************
	Returns true if a given Element is anywhere inside the viewport 
	Based on https://stackoverflow.com/a/22480938/6853842 */

function isScrolledIntoView(el) {
	var rect = el.getBoundingClientRect();
    var elemTop = rect.top;
    var elemBottom = rect.bottom;
    var isVisible = elemTop < window.innerHeight && elemBottom >= 0;
    return isVisible;
}

/* applyAnimations ************************************************************
	Applies animation class to an Element */

function applyAnimations(){
	var animatedElements = document.getElementsByClassName('animated');
	for(const animatedElement of animatedElements){
		if(isScrolledIntoView(animatedElement)){
			var animation = animatedElement.getAttribute('data-animation');
            animatedElement.classList.add( animation );
		}	
	};
};

/* BLOB ***************************************************************************
	Based on "Build a Smooth, Animated Blob Using SVG + JavaScript" by George Francis
	https://georgefrancis.dev/writing/build-a-smooth-animated-blob-with-svg-and-js/ */

const noiseStep = 0.0025;   // rate of speed
const effect = 10;          // range of motion
const numPoints = 6;        // number of  points
const rad = 90;             // radius of circle
const path = document.querySelector("svg#portrait #path");
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

/* Portfolio Item: Video Thumbnails */
let portfolioItems = document.querySelectorAll('.portfolio-item.has-video');

/* Add event listeners to the Portfolio Items so that their videos only play on hover/mouseenter, and pause on mouseleave */
function controlVideoThumbnails () {
	for(let portfolioItem of portfolioItems){
		let video = portfolioItem.querySelector('.thumbnail-video');
		portfolioItem.addEventListener('mouseenter', function(e){video.play()});
		portfolioItem.addEventListener('mouseleave', function(e){video.pause()});
	}
}

/* Resize videos to match their corresponding image thumbnails, to avoid a "jump" when switching between them */
function resizeVideoThumbnails () {
	for(let portfolioItem of portfolioItems){
		if(portfolioItem.querySelector('.thumbnail-image')){
			let image = portfolioItem.querySelector('.thumbnail-image');
			let size = image.getBoundingClientRect();
			let video = portfolioItem.querySelector('.thumbnail-video');
			video.setAttribute('style','height: ' + (Math.round(size.height * 100) / 100) + 'px; width: ' + (Math.round(size.width * 100) / 100) + 'px;');
		}
	}
}

// NAV TOGGLER
navToggle.addEventListener('click', toggleNav);
function toggleNav(){
	let menuIsOpen = document.body.classList.toggle('menu-open');
	navToggle.setAttribute('aria-expanded', menuIsOpen);
}

/* LIGHTBOX ***********************************************************************
	Based on "How to Create a Lightbox Using HTML, CSS, and JavaScript" by FreeCodeCamp
	https://www.freecodecamp.org/news/how-to-create-a-lightbox-using-html-css-and-javascript/ */

var lightbox = document.getElementsByClassName('lightbox-container')[0];
var lightboxImages = document.getElementsByClassName('open-in-lightbox');
for(let lightboxImage of lightboxImages){
	lightboxImage.addEventListener('click', openLightbox);
}
function openLightbox(target) {
	// override default behavior of opening link in new tab/window
	event.preventDefault();
	// clear contents of lightbox-body
	var lightboxBody = lightbox.getElementsByClassName('lightbox-body')[0];
	lightboxBody.innerHTML = '';
	// get full-size image from the clicked link
	var fullSizeImageURL = target.path[1].href;
	var img = document.createElement('img');
	img.src = fullSizeImageURL;
	// add it to lightbox body
	lightboxBody.append(img);
	// disable vertical scroll on html
	document.documentElement.style.overflow = 'hidden';
	// open the lightbox
	lightbox.style.display = 'block';
}
var lightboxCloseButton = document.getElementsByClassName('lightbox-close')[0];
lightboxCloseButton.addEventListener('click', closeLightbox);
function closeLightbox() {
	// re-enable vertical scroll on html
	document.documentElement.style.overflow = 'auto';
	// close the lightbox
	lightbox.style.display = 'none';
};

// TODO: Scroll from top to bottom slowly (for recording video thumbnails)
// let footer = document.getElementById('footer');
// console.log(footer);
// footer.scrollIntoView(true,{behavior:'smooth',block:'center',inline:'center'});