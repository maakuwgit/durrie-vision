/**
* photo-w-caption JS
* -----------------------------------------------------------------------------
*
* All the JS for the photo-w-caption component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-photo-w-caption',


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
  app.registerComponent( 'photo-w-caption', COMPONENT );
} )( app );
