// products button

(function() {
  tinymce.create('tinymce.plugins.customButtons', {

    init : function(ed, url) {
      ed.addButton('products', {
        title : 'Products',
        cmd : 'products',
        image : url + '/products-toolbar-btn.jpg'
      });

      ed.addCommand('products', function(){
        var ids = prompt('Enter up to four comma separated product ids. eg: 12, 35, 7, 78'),
            shortcode = '[product-grid products="'+ ids +'"]';

        ed.execCommand('mceInsertContent', 0, shortcode);
      });
    },

    createControl : function(n, cm) {
      return null;
    },

    getInfo : function() {
      return {
        longname : 'Custom Editor Buttons',
        author : 'The Devinator',
        authorurl : 'http://knowncreative.co',
        infourl : '',
        version : '0.1'
      };
    }
  });

  tinymce.PluginManager.add( 'custom-buttons', tinymce.plugins.customButtons );
})();

// bxslider blog button

(function(){
  tinymce.create('tinymce.plugins.customButtons', {

    init : function(ed, url){
      ed.addButton('slider', {
        title : 'Gallery Image Slider',
        cmd : 'images',
        image : url +  '/gallery-slider-btn.jpg'
      });

      ed.addCommand('images', function(){
        var ids = prompt('Enter up to five comma separated image ids. These ids may be found in the media library- click on an image and check the number at the end of the URL bar. Eg: 264, 265'),
            shortcode = '[gallery-slider images="'+ ids +'"]';

        ed.execCommand('mceInsertContent', 0, shortcode);
      });
    }.

    getInfo : function(){
      return {
        longname : 'Custom Slider Button',
        author : 'Big Z',
        authorurl : 'http://zar.cafe',
        infourl : '',
        version : '0.1'
      };
    }
  });

  tinymce.PluginManager.add('custom-buttons', tinymce.plugins.customButtons);
})();
