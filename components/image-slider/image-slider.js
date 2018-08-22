/**
* image-slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the image-slider component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-image-slider',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;
      var gallery = $("."+_this.className),
          nextArrow = '',
          prevArrow = '';

        prevArrow = '<button type="button" class="slick-prev">';
        prevArrow += '<svg>';
        prevArrow += '<use xlink:href="#icon-chevron-left"></use>';
        prevArrow += '</svg></button>';

        nextArrow += '<button type="button" class="slick-next">';
        nextArrow += '<svg>';
        nextArrow += '<use xlink:href="#icon-chevron-right"></use>';
        nextArrow += '</svg></button>';

        setProgress = function(e, slick, direction){
           var max   = slick['slideCount'],
               val   = slick['currentSlide'] + 1,
               nav   = $(this).attr('data-slider-nav'),
               prog  = $('#'+nav).find('progress'),
               deets = $('#'+nav).find('[data-slick-details]'),
               curr  = val,
               total = max;

          if( max === 1 ){
            $(nav).detach();
          }else{
            if( val < 10 ){
              curr = '0' + val;
            }

            if( max < 10 ){
              total = '0' + max;
            }

            $(prog).attr({'max': max, 'value': val});
            $(deets).html(curr+' / '+total);
          }
        }

        gallery.each(function(){

          var target = $(this).find('.image-slider__slides'),
              sliderNav = target.attr('data-slider-nav');

          if( sliderNav ) {
            sliderNav = $('#'+sliderNav);
            if( sliderNav ) {
              sliderNav = $(sliderNav).find('div');
            }
          }

          if( target.children().length > 1 ) {
            target.on('init', setProgress).slick({
              infinite: true,
              fade: true,
              prevArrow: prevArrow,
              nextArrow: nextArrow,
              centerMode: true,
              appendArrows: sliderNav,
              adaptiveHeight: false
            }).on('afterChange', setProgress);
          }

        });
    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'image-slider', COMPONENT );
} )( app );
