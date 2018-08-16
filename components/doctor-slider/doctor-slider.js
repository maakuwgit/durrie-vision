/**
* doctor-slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the doctor-slider component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-doctor-slider',


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
  app.registerComponent( 'doctor-slider', COMPONENT );
} )( app );
