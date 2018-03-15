// add class to body if mobile detected

if(mobileDetected){
	document.body.classList.add('is-mobile');
}

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

	/*
	 *
	 * Modal
	 *
	*/

	class Modal {
		constructor(id) {
			this.modalID = id;

			this.createCookie();

			if($('#newsletter-modal').length) {
				addMailchimpScripts('#newsletter-modal-container');
			}

			this.showModal();

			$('#modal-close, .modal-bg').click(this.closeModal.bind(this));
		}

		createCookie() {
			var date = new Date();
			var expires = '';
			date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
			expires = ";path=/;expires=" + date.toGMTString();

		  if (document.cookie.replace(/(?:(?:^|.*;\s*)newsletterModal\s*\=\s*([^;]*).*$)|^.*$/, "$1") !== "true") {
		    document.cookie = "newsletterModal=true" + expires;
		  }
		}

		showModal() {
			setTimeout(function(){
				$('body').addClass('modal-active');
				$(this.modalID).show();
			}.bind(this), 5000);
		}

		closeModal() {
			$('body').removeClass('modal-active');
			$(this.modalID).hide();
		}
	}

	// Display footer newsletter signup if the modal cookie is set
	// This avoids conflicts with multiple mailchimp forms on one page
	if($('#newsletter-modal').length) {
		if (document.cookie.replace(/(?:(?:^|.*;\s*)newsletterModal\s*\=\s*([^;]*).*$)|^.*$/, "$1") === "true") {
			if(!$('.page-template-page-shop-coming-soon').length) {
				$('.newsletter-signup').addClass('active');
				addMailchimpScripts('#footer-newsletter-signup');
			}
		} else {
			if(!$('.page-template-page-shop-coming-soon').length) {
				var NewsletterModal = new Modal('#newsletter-modal');
			}
		}
	}

	// Inserts mailchimp form and scripts
	function addMailchimpScripts(container) {
		var formFields = '<div class="mc-field-group"><input type="email" value="" name="EMAIL" placeholder="example@email.com" class="required email" id="mce-EMAIL"></div><div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7df2ba034c9d88245475dc567_58c6176cc6" tabindex="-1" value=""></div><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"><div id="mce-responses" class="clear"><div class="response" id="mce-error-response" style="display:none"></div><div class="response" id="mce-success-response" style="display:none"></div></div>';

		var container = document.querySelector(container);
		var form = document.createElement('div');
		var formEle = document.createElement('form');
		var formInputWrapper = document.createElement('div');
		var formInput = document.createElement('input');
		var formSubmit = document.createElement('input');
		var formResponses = document.createElement('div');
		var formResponseErr = document.createElement('div');
		var formResponseSucc = document.createElement('div');

		form.id = 'mc_embed_signup';

		formEle.id = 'mc-embedded-subscribe-form';
		formEle.action = '//preservebrands.us16.list-manage.com/subscribe/post?u=7df2ba034c9d88245475dc567&amp;id=58c6176cc6';
		formEle.method = 'post';
		formEle.classList.add('validate');
		formEle.target = '_blank';
		formEle.name = 'mc-embedded-subscribe-form';
		formEle.noValidate;

		formInputWrapper.classList.add('mc-field-group');

		formInput.type = 'email';
		formInput.name = 'EMAIL';
		formInput.id = 'mce-EMAIL';
		formInput.placeholder = 'Example@email.com';
		formInput.classList.add('required');
		formInput.classList.add('email');

		formSubmit.type = 'submit';
		formSubmit.name = 'subscribe';
		formSubmit.id = 'mc-embedded-subscribe';
		formSubmit.classList.add('button');

		formResponses.id = 'mce-responses';
		formResponseErr.id = 'mce-error-response';
		formResponseErr.classList.add('response');
		formResponseErr.style.display = 'none';
		formResponseSucc.id = 'mce-success-response';
		formResponseSucc.classList.add('response');
		formResponseSucc.style.display = 'none';

		formInputWrapper.appendChild(formInput);
		formEle.appendChild(formInputWrapper);
		formEle.appendChild(formSubmit);
		formResponses.appendChild(formResponseErr);
		formResponses.appendChild(formResponseSucc);
		formEle.appendChild(formResponses);
		form.appendChild(formEle);
		container.appendChild(form);

		var script = document.createElement('script');
		//script.src = '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js';
		script.src = blogURL + '/wp-content/themes/known_starter/src/mc-validate.js';
		document.head.appendChild(script);
		script.onload = function() {
			window.fnames = new Array();
			window.ftypes = new Array();
				fnames[0]='EMAIL';
				ftypes[0]='email';
			var $mcj = jQuery.noConflict(true);
		}
	}


})(jQuery);
