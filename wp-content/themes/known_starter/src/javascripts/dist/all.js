/*! Conditionizr v4.3.0 | (c) 2014 @toddmotto, @markgdyr | MIT license | conditionizr.com */
!function(a,b){"function"==typeof define&&define.amd?define([],b):"object"==typeof exports?module.exports=b:a.conditionizr=b()}(this,function(){"use strict";var a,b={},c=document.head||document.getElementsByTagName("head")[0],d=function(b,d,e){var f=e?b:a+b+("style"===d?".css":".js");switch(d){case"script":var g=document.createElement("script");g.src=f,c.appendChild(g);break;case"style":var h=document.createElement("link");h.href=f,h.rel="stylesheet",c.appendChild(h);break;case"class":document.documentElement.className+=" "+b}};return b.config=function(c){var e=c||{},f=e.tests;a=e.assets||"";for(var g in f){var h=g.toLowerCase();if(b[h])for(var i=f[g],j=i.length;j--;)d(h,i[j])}},b.add=function(a,c,e){var f=a.toLowerCase();if(b[f]=e(),b[f])for(var g=c.length;g--;)d(f,c[g])},b.on=function(a,c){var d=/^\!/;(b[a.toLowerCase()]||d.test(a)&&!b[a.replace(d,"")])&&c()},b.load=b.polyfill=function(a,c){for(var e=/\.js$/.test(a)?"script":"style",f=c.length;f--;)b[c[f].toLowerCase()]&&d(a,e,!0)},b});
// Woocommerce

// add loader to the add to cart button on product page
$( '.single_add_to_cart_button' ).on( 'click', function(){
    $(this).addClass('loading');
});

// add loader to the proceed to checkout button on cart page
$( '.checkout-button' ).on( 'click', function(){
    $(this).addClass('loading');
});

var shopCategories = document.querySelector('#woocommerce-main .page-nav-bar');
var productGrid = document.querySelector('#woocommerce-main ul.products');
var loader = document.getElementById('loader-gif');

function getMatches(string, regex, index) {
    index || (index = 1); // default to the first capturing group
    var matches = [];
    var match;
    while (match = regex.exec(string)) {
        matches.push(match[index]);
    }
    return matches;
}

if(shopCategories) {
  shopCategories.addEventListener('click', function(e){
    e.preventDefault();
    if(e.target.tagName === 'A' && !e.target.classList.contains('active')) {
      var catID = e.target.dataset.cat;
      var cats = shopCategories.querySelectorAll('a');
      var dataSlug = e.target.dataset.slug;

      productGrid.innerHTML = '';

      loader.style.display = 'block';

      $.ajax(
        {
          method : 'post',
          url : ajaxurl,
          data : {
            'action' : 'load_more_products',
            'catID' : catID
          },
          dataType : 'HTML',
          error : function(xhr, status, error){
            console.log(xhr, status, error);
          },
          success : function(data, status, xhr){
              for(var i = 0; i < cats.length; i++) {
                  cats[i].classList.remove('active');
              }

              e.target.classList.add('active');

              var url = 'http://'+window.location.hostname+window.location.pathname+'?prod_cat='+dataSlug;
              if (typeof (history.pushState) != "undefined") {
                  var obj = { Title: dataSlug, Url: url };
                  history.pushState(obj, obj.Title, obj.Url);
              } else {
                  console.log("Browser does not support HTML5.");
              }
            productGrid.innerHTML = data;
            loader.style.display = 'none';
          }
        }
      );
    }
  });
}


// Custom quantity input
if(document.querySelector('.single-product')){
  jQuery(document).ready(function(){
      $('[data-quantity="plus"]').click(function(e){
          e.preventDefault();
          fieldName = $(this).attr('data-field');
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          if (!isNaN(currentVal)) {
              $('input[name='+fieldName+']').val(currentVal + 1).change();
          } else {
              $('input[name='+fieldName+']').val(0);
          }
      });

      $('[data-quantity="minus"]').click(function(e) {
          e.preventDefault();
          fieldName = $(this).attr('data-field');
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          if (!isNaN(currentVal) && currentVal > 0) {
              $('input[name='+fieldName+']').val(currentVal - 1).change();
          } else {
              $('input[name='+fieldName+']').val(0);
          }
      });
  });
}

// Product Image Gallery
// class productImageGallery {
//   constructor() {
//     var gallery = $('.woocommerce-product-gallery__wrapper'),
//         thumbnails = $('.thumbnails-wrapper .woocommerce-product-gallery__image');
//
//     thumbnails.on('click', function(e){
//       e.preventDefault();
//
//       var image = $(this).find('img'),
//           imgPath = image..attr('data-')
//     });
//   }
// }

if($('.woocommerce-product-gallery__wrapper').length){
  var prodGallery = new productImageGallery;
}



// CATEGORIES BAR

var catBarActive = false,
    catButton = document.querySelector('.cat-btn'),
    catList = document.getElementById('category-list'),
    catArrow = document.querySelector('.down-arrow');

if(catButton){
  catButton.addEventListener('click', function(e){
      catList.classList.add('cat-active');
      catArrow.style.transform = "rotate(180deg)";

      if(catBarActive == true){
          catArrow.style.transform = "rotate(0deg)";
          catList.classList.remove('cat-active');
          catBarActive = false;
        } else {
          catBarActive = true;
        }
    });
}




// SEARCH BAR

var searchBarActive = false,
    searchBox = document.getElementById('search-form'),
    searchBar = document.querySelector('.search-field'),
    barInner = document.querySelector('.bar-inner'),
    catList = document.getElementById('category-list');
    if(searchBox){
      var searchButton = searchBox.querySelector('.submit-button');
    }

// when page loads
if(catList){
  if(window.matchMedia('(min-width: 768px)').matches){
    catList.style.paddingRight = barInner.offsetWidth + "px";
  }
}

// button click event
if(searchButton){
  searchButton.addEventListener('click', function(e){
    e.preventDefault();
    if(window.matchMedia('(min-width: 768px)').matches){
      //console.log('desktop');
      searchBox.submit();
    } else {
      //console.log('mobile');
      if(searchBarActive){
        searchBox.submit();
      } else {
        openSearchbar();
      }
    }
  });
}


// body click event
document.body.addEventListener('click', function(e){
  if(searchBarActive){
    var classList = event.target.classList;
    if(!$(e.target).parents('.search-field').length && !$(e.target).parents('.submit-button').length && !$(e.target).hasClass('search-field') && !$(e.target).hasClass('submit-button')){
      closeSearchbar();
    }
  }
});

// search bar click

if(searchBar){
  searchBar.addEventListener('click', function(e){
    openSearchbar();
    e.stopPropagation();
  });
}

function openSearchbar(){
  searchBarActive = true;
  searchBox.classList.add('search-active');
  console.log('search open');
}

function closeSearchbar(){
  searchBox.classList.remove('search-active');
  searchBarActive = false;
  console.log('close');
}

// header border bottom on scroll
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    var header = $("#primary-header");

    if (scroll >= 200) {
        header.addClass("scroll");
    } else {
        header.removeClass("scroll");
    }
});



// POST LOAD ANIMATION


// AJAX POST LOADER

class ajaxPostLoader {
  constructor(){ //what runs as soon as class set up
    this.btn = document.getElementById('load-btn');
    this.btnText = document.getElementById('load-text');
    this.wrapper = document.getElementById('chron-grid');
    this.currentPage = parseInt(this.wrapper.dataset.page) + 1;
    this.currentCategory = this.wrapper.dataset.category;
    this.loader = document.getElementById('loader-gif');
    this.postLoadCounter = 3;
    this.totalPosts = this.wrapper.dataset.total;
    this.pageOffset = this.wrapper.dataset.offset;
    this.excludePages = this.wrapper.dataset.exclude;

    console.log(this.excludePages);

     this.btn.addEventListener('click', function(e){
       e.preventDefault();
       this.clickHandler();
     }.bind(this)); //changes reference of this to up one level (constructor) otherwise will default to nameless function
  }

  clickHandler(){
    this.loader.classList.add('active');
    this.btnText.classList.add('off');
    $.ajax(
      {
        method : 'post', //declares type we are using, sending data to php file
        url : ajaxurl,
        data : {
          'action' : 'load_more_posts',
          'wrapper' : this.currentPage, //name and value
          'category' : this.currentCategory,
          'offset' : this.pageOffset,
          'exclude' : this.excludePages
        },
        dataType : 'JSON',
        error : function(xhr, status, error){
          console.log(xhr, status, error);
        },
        success : function(data, status, xhr){
          this.pageOffset = parseInt(this.pageOffset) + parseInt(data.offset);
          console.log(this.pageOffset, this.totalPosts);
          this.currentPage = this.currentPage + 1;

          if(this.pageOffset >= parseInt(this.totalPosts)){
            this.btn.style.display = "none";
          }

          this.loader.classList.remove('active'); //remove loader
          this.btnText.classList.remove('off');

          $('#grid-wrapper').append(data.html);

        }.bind(this)
      }
    );
  }
}

if(document.getElementById('load-btn')){
  var postLoader = new ajaxPostLoader;
}


//bxslider for product page
var productSlider = $("#gallery-bxslider");
var productThumbs = $("#bxslider-pager");

function changeActiveThumb(thumb) {
    thumb.siblings('li').removeClass('active');
    thumb.addClass('active');
}

var mainSlider = productSlider.bxSlider({
    controls: true,
    pager: false,
    speed: 0,
    infiniteLoop: true,
    prevText: '<svg class="left-bxslider-arrow" height="30" viewBox="0 0 5.41 10"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use></svg>',
    nextText: '<svg class="right-bxslider-arrow" height="30" viewBox="0 0 5.41 10"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use></svg>',
    onSliderLoad: function(){
        document.getElementById('gallery-bxslider').classList.remove('load-delay');
    },
    onSlideAfter: function(slide, oldIndex, newIndex) {
        var thumb = $('#bxslider-pager li:eq(' + newIndex + ')');
        thumb.siblings('li').removeClass('active');
        thumb.addClass('active');
    }
});

function linkSlider(productSlider, productThumbs){
productThumbs.on("click", "li", function(e){
  e.preventDefault();
  changeActiveThumb($(this));
  productSlider.goToSlide($(this).attr("data-slideIndex"));
})


}

  linkSlider(productSlider, productThumbs);

  //bxslider for blog

  // var blogSliders = document.querySelectorAll('.blog-bxslider');
  //
  // for(var i = 0; i < blogSliders.length; i++){
  //   var initSliders = $(blogSliders[i]).bxSlider({
  //     pager: false,
  //     infiniteLoop: true,
  //     prevText: '<',
  //     nextText: '>'
  //     // onSliderLoad: function(){
  //     //   blogSliders[i].classList.remove('load-delay');
  //     // }
  //   });
  // console.log($(blogSliders[i]));
  // }

  var adaptiveHeight = (!window.matchMedia('(min-width: 992px)').matches);

  $('.blog-bxslider').each(function(ele,index){
    $(this).bxSlider({
      pager: false,
      infiniteLoop: true,
      adaptiveHeight: adaptiveHeight,
      prevText: '<',
      nextText: '>'
    });
  });

  // blogSlider.bxSlider({
  //   pager: false,
  //   infiniteLoop: true,
  //   prevText: '<',
  //   nextText: '>',
  //   onSliderLoad: function(){
  //     document.getElementById('blog-bxslider').classList.remove('load-delay');
  //     }
  // });


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
