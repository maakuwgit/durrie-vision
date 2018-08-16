/**
* fullwidth-image JS
* -----------------------------------------------------------------------------
*
* All the JS for the fullwidth-image component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-fullwidth-image',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'fullwidth-image', COMPONENT );
} )( app );
