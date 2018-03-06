$(document).ready(function(){
     $('.carousel').carousel(); 
	 
	 $(function(){
        $('.dropdown').hover(function() {
             $(this).addClass('open');
        },
        function() {
             $(this).removeClass('open');
        });

		    var wow = new WOW(
          {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
              // the callback is fired every time an animation is started
              // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
          }
        );
        wow.init();
        });

        function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);

         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $('#media').carousel({
            pause: true,
            interval: false,
        });
});


