/**
* inline-form JS
* -----------------------------------------------------------------------------
*
* All the JS for the inline-form component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-inline-form',


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
  app.registerComponent( 'inline-form', COMPONENT );
} )( app );
