
// SEARCH BAR

var $searchBox = $('#blog-nav-search');
var $searchBar = $('.search-field');

$searchBar.click(function(){
  $searchBox.toggleClass('search-active');
});


// POST LOAD ANIMATION


// AJAX POST LOADER

class ajaxPostLoader {
  constructor(){ //what runs as soon as class set up
    this.btn = document.getElementById('load-btn');
    this.wrapper = document.getElementById('chron-grid');
    this.currentPage = parseInt(this.wrapper.dataset.page) + 1;
    this.currentCategory = this.wrapper.dataset.category;
    this.loader = document.getElementById('loader-gif');
    this.postLoadCounter = 3;
    this.totalPosts = this.wrapper.dataset.total;
    this.pageOffset = this.wrapper.dataset.offset;

     this.btn.addEventListener('click', function(e){
       e.preventDefault();
       this.clickHandler();
     }.bind(this)); //changes reference of this to up one level (constructor) otherwise will default to nameless function
  }

  clickHandler(){
    this.loader.classList.add('active');
    $.ajax(
      {
        method : 'post', //declares type we are using, sending data to php file
        url : ajaxurl,
        data : {
          'action' : 'load_more_posts',
          'wrapper' : this.currentPage, //name and value
          'category' : this.currentCategory,
          'offset' : this.pageOffset
        },
        dataType : 'html',
        error : function(xhr, status, error){
          console.log(xhr, status, error);
        },
        success : function(data, status, xhr){
          console.log(this.postLoadCounter, this.currentPage, this.totalPosts);
           if(this.postLoadCounter * this.currentPage >= this.totalPosts){
             this.btn.style.display = "none";
           }
          this.currentPage = this.currentPage + 1;
          this.loader.classList.remove('active'); //remove loader
          $('#grid-wrapper').append(data);
        }.bind(this)
      }
    );
  }
}

if(document.getElementById('load-btn')){
  var postLoader = new ajaxPostLoader;
}
