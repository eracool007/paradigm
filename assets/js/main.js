// Smooth Scroll on anchor links
(function() {

	'use strict';

   // Feature Test
   if ( 'querySelector' in document && 'addEventListener' in window && Array.prototype.forEach ) {

	   // Function to animate the scroll
	   var smoothScroll = function (anchor, duration) {

		   // Calculate how far and how fast to scroll
		   var startLocation = window.pageYOffset;
		   var endLocation = anchor.offsetTop;
		   var distance = endLocation - startLocation;
		   var increments = distance/(duration/16);
		   var stopAnimation;

		   // Scroll the page by an increment, and check if it's time to stop
		   var animateScroll = function () {
			   window.scrollBy(0, increments);
			   stopAnimation();
		   };

		   // If scrolling down
		   if ( increments >= 0 ) {
			   // Stop animation when you reach the anchor OR the bottom of the page
			   stopAnimation = function () {
				   var travelled = window.pageYOffset;
				   if ( (travelled >= (endLocation - increments)) || ((window.innerHeight + travelled) >= document.body.offsetHeight) ) {
					   clearInterval(runAnimation);
				   }
			   };
		   }
		   // If scrolling up
		   else {
			   // Stop animation when you reach the anchor OR the top of the page
			   stopAnimation = function () {
				   var travelled = window.pageYOffset;
				   if ( travelled <= (endLocation || 0) ) {
					   clearInterval(runAnimation);
				   }
			   };
		   }

		   // Loop the animation function
		   var runAnimation = setInterval(animateScroll, 16);
	  
	   };

	   // Define smooth scroll links
	   var scrollToggle = document.querySelectorAll('.scroll');

	   // For each smooth scroll link
	   [].forEach.call(scrollToggle, function (toggle) {

		   // When the smooth scroll link is clicked
		   toggle.addEventListener('click', function(e) {

			   // Prevent the default link behavior
			   e.preventDefault();

			   // Get anchor link and calculate distance from the top
			   var dataID = toggle.getAttribute('href');
			   var dataTarget = document.querySelector(dataID);
			   var dataSpeed = toggle.getAttribute('data-speed');

			   // If the anchor exists
			   if (dataTarget) {
				   // Scroll to the anchor
				   smoothScroll(dataTarget, dataSpeed || 500);
			   }

		   }, false);

	   });

   }

})();

//Smooth Scroll
SmoothScroll({
   // Scrolling Core
   animationTime    : 400, // [ms]
   stepSize         : 100, // [px]

   // Acceleration
   accelerationDelta : 50,  // 50
   accelerationMax   : 3,   // 3

   // Keyboard Settings
   keyboardSupport   : true,  // option
   arrowScroll       : 50,    // [px]

   // Pulse (less tweakable)
   // ratio of "tail" to "acceleration"
   pulseAlgorithm   : true,
   pulseScale       : 4,
   pulseNormalize   : 1,

   // Other
   touchpadSupport   : false, // ignore touchpad by default
   fixedBackground   : true, 
   excluded          : ''    
});

// Change style of navbar on scroll
window.onscroll = function() {
 myFunction()
};

function myFunction() {
 var navbar = document.getElementById("myNavbar");
 if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
   navbar.className = "w3-navbar" + " w3-card-2" + " w3-animate-top" + " w3-white";
 } else {
   navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
 }
}


//Portfolio: zoom image
const modalContainer = document.getElementById("modal01");
var modalImage = document.getElementById("img01");
const images = document.querySelectorAll('.w3-hover-opacity');

images.forEach(function(image){
	image.addEventListener('click', function(e) {
		let currentUrl = this.src;
		zoomImage(currentUrl);
	});
	
});

function zoomImage(current){
	modalContainer.style.display = "block";
	modalImage.src= current;
}