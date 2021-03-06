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

              var url = window.location.origin+window.location.pathname+'?prod_cat='+dataSlug;
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

