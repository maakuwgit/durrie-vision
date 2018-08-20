/**
* filters JS
* -----------------------------------------------------------------------------
*
* All the JS for the filters component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-filters',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

      var search_str = window.location.search;

      $(_this.selector()).find('input[name="filterables"]').on('change', function(e){
        window.location.href = './?'+this.defaultValue;
      });

      if( search_str ) {
        var slug = search_str.substr(1);
        $('.card__wrapper').hide();
        $('.card-grid__select').find('option[value="'+slug+'"]').attr('selected', 'selected');
        $('.card__wrapper[data-terms="'+slug+'"]').show();
        $('label[for="'+slug+'"]').addClass('active').siblings().addClass('active');
      }else{
        $('label[for="all_posts"]').addClass('active').siblings().addClass('active');
      }

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'filters', COMPONENT );
} )( app );
