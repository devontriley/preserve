
// SEARCH BAR

var searchBarActive = false,
    searchBox = document.getElementById('#blog-nav-search'),
    searchBar = document.querySelector('.search-field');

// body click event
document.body.addEventListener('click', function(e){
  if(searchBarActive){
    var classList = event.target.classList;
    if(classList.value.indexOf('search-field') !== -1){ //if index not -1 then you are clicking it
      searchBox.removeClass('search-active');
      searchBarActive = false;
    }
  }
});

// search bar click
$searchBar.addEventListener('click', function(e){
  searchBarActive = true;
  searchBox.classList.add('search-active');
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
    this.excludePages = this.wrapper.dataset.exclude;

    console.log(this.excludePages);

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

          $('#grid-wrapper').append(data.html);

        }.bind(this)
      }
    );
  }
}

if(document.getElementById('load-btn')){
  var postLoader = new ajaxPostLoader;
}
