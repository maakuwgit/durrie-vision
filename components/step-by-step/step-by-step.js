/**
* step-by-step JS
* -----------------------------------------------------------------------------
*
* All the JS for the step-by-step component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-step-by-step',


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
  app.registerComponent( 'step-by-step', COMPONENT );
} )( app );
