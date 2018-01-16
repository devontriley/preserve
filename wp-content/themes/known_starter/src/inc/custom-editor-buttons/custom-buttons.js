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
