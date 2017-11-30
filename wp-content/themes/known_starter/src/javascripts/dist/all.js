/*! Conditionizr v4.3.0 | (c) 2014 @toddmotto, @markgdyr | MIT license | conditionizr.com */
!function(a,b){"function"==typeof define&&define.amd?define([],b):"object"==typeof exports?module.exports=b:a.conditionizr=b()}(this,function(){"use strict";var a,b={},c=document.head||document.getElementsByTagName("head")[0],d=function(b,d,e){var f=e?b:a+b+("style"===d?".css":".js");switch(d){case"script":var g=document.createElement("script");g.src=f,c.appendChild(g);break;case"style":var h=document.createElement("link");h.href=f,h.rel="stylesheet",c.appendChild(h);break;case"class":document.documentElement.className+=" "+b}};return b.config=function(c){var e=c||{},f=e.tests;a=e.assets||"";for(var g in f){var h=g.toLowerCase();if(b[h])for(var i=f[g],j=i.length;j--;)d(h,i[j])}},b.add=function(a,c,e){var f=a.toLowerCase();if(b[f]=e(),b[f])for(var g=c.length;g--;)d(f,c[g])},b.on=function(a,c){var d=/^\!/;(b[a.toLowerCase()]||d.test(a)&&!b[a.replace(d,"")])&&c()},b.load=b.polyfill=function(a,c){for(var e=/\.js$/.test(a)?"script":"style",f=c.length;f--;)b[c[f].toLowerCase()]&&d(a,e,!0)},b});


/*
 *
 * Mobile Nav Toggle
 *
*/
function toggleMobileNav() {
	var hamburger = document.querySelector(".hamburger");

	hamburger.addEventListener("click", function(e){
		e.preventDefault();
		document.body.classList.toggle("mobile-nav-active");
	});
}
toggleMobileNav();

/*
 *
 * Header background on scroll
 *
*/
/*
window.addEventListener("scroll", headerState, false);
function headerState()
{
	var scrollPos = window.pageYOffset || document.documentElement.scrollTop;
	if(scrollPos > 0)
	{
		document.body.classList.add("enable_header_background");
	}
	else
	{
		document.body.classList.remove("enable_header_background");
	}
}
*/


(function(){

	"use strict";

	/*
	 *
	 * Hero slider
	 *
	*/
	$(".fullscreen-slider .slides").bxSlider({
		infiniteLoop: true,
		controls: false,
		mode: "fade",
		//auto: true,
		pause: 6000
	});

	/*
	 *
	 * Mobile Nav Dropdown
	 *
	*/
	$("#mobile-nav li.menu-item-has-children > a").on("click", function(e){
		e.preventDefault();
		$(this).nextAll(".sub-menu").slideToggle();
	});

	/*
	 *
	 * Flexible Content Auto Image Slider
	 *
	*/

	$(".flexible-content .auto-image-slider ul").each(function(){
		if(window.matchMedia("(min-width: 768px)").matches) {
			$(this).bxSlider({
				minSlides: 4,
				maxSlides: 4,
				slideWidth: 1000,
				slideMargin: 20,
				ticker: true,
				speed: 100000
			});
		} else {
			// something
			$(this).bxSlider({
				minSlides: 2,
				maxSlides: 2,
				slideWidth: 500,
				slideMargin: 20,
				ticker: true,
				speed: 50000
			});
		}
	});


	/*
	 *
	 * Wholesale Product Categories Image Sliders
	 *
	*/

	/*
	$("#category-select-grid .option .image").each(function(){
		var $this = $(this);

		$this.bxSlider({
			pager: false,
			controls: false,
			auto: true,
			infiniteLoop: true,
			mode: "fade",
			pause: 3000,
			touchEnabled: false
		});
	});
	*/

	/*
	 *
	 * Animate .module-header lines
	 *
	*/

	$(window).on("scroll load", function(){
		$(".module-header").each(function(){
			var $this = $(this),
					height = $this.innerHeight(),
					scroll = $(window).scrollTop(),
					offset = $this.offset().top,
					windowH = window.innerHeight;
			if((scroll + windowH) > ((offset + height) + (windowH * 0.1))) {
				$this.addClass("active");
			}
		});
	});

	/*
	 *
	 * Product Category Image Selection
	 *
	*/
	var selectedCategories = [];

	$("#category-select-grid .option input[type=checkbox]").on("change", function(){
		var $this = $(this),
				$cat = $this.val(),
				$hiddenField = $("input#input_1_7");

		if(selectedCategories.indexOf($cat) === -1) {
			selectedCategories.push($cat);
		} else {
			for(var i = selectedCategories.length; i>=0; i--) {
				if(selectedCategories[i] === $cat) {
					selectedCategories.splice(i, 1);
				}
			}
		}

		$hiddenField.val(selectedCategories);
	});

	/*
	 *
	 * Reposition scroll after ajax form submit
	 *
	*/

	var firstGFormLoad = false;

	$(document).bind("gform_post_render", function(){
		if(firstGFormLoad) {
			var form = $("#wholesale-inquiries-form #category-select-grid + .flexible-content");

			$("html, body").animate({
				scrollTop: form.offset().top
			});
		}
		firstGFormLoad = true;
	});


})(jQuery);
