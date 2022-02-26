// smoothscroll
		var scroll = new SmoothScroll('a[href*="#"]:not([data-easing])');

			if (document.querySelector('[data-easing]')) {
				var linear = new SmoothScroll('[data-easing="linear"]', {easing: 'linear'});

				var easeInQuad = new SmoothScroll('[data-easing="easeInQuad"]', {easing: 'easeInQuad'});
				var easeInCubic = new SmoothScroll('[data-easing="easeInCubic"]', {easing: 'easeInCubic'});
				var easeInQuart = new SmoothScroll('[data-easing="easeInQuart"]', {easing: 'easeInQuart'});
				var easeInQuint = new SmoothScroll('[data-easing="easeInQuint"]', {easing: 'easeInQuint'});

				var easeInOutQuad = new SmoothScroll('[data-easing="easeInOutQuad"]', {easing: 'easeInOutQuad'});
				var easeInOutCubic = new SmoothScroll('[data-easing="easeInOutCubic"]', {easing: 'easeInOutCubic'});
				var easeInOutQuart = new SmoothScroll('[data-easing="easeInOutQuart"]', {easing: 'easeInOutQuart'});
				var easeInOutQuint = new SmoothScroll('[data-easing="easeInOutQuint"]', {easing: 'easeInOutQuint'});

				var easeOutQuad = new SmoothScroll('[data-easing="easeOutQuad"]', {easing: 'easeOutQuad'});
				var easeOutCubic = new SmoothScroll('[data-easing="easeOutCubic"]', {easing: 'easeOutCubic'});
				var easeOutQuart = new SmoothScroll('[data-easing="easeOutQuart"]', {easing: 'easeOutQuart'});
				var easeOutQuint = new SmoothScroll('[data-easing="easeOutQuint"]', {easing: 'easeOutQuint'});
			}

// navbar 
$(document).ready(function () {
	BrowserDetect.init();

	if ($('.navbar-color-on-scroll').length != 0) {
		$(window).on('scroll', materialKit.checkScrollForGrey);
	  }
	
	materialKit.checkScrollForGrey();
	
});

  materialKit = {
	misc: {
	  navbar_menu_visible: 0,
	  window_width: 0,
	  transparent: true,
	  fixedTop: false,
	  navbar_initialized: false,
	  isWindow: document.documentMode || /Edge/.test(navigator.userAgent)
	},

	checkScrollForGrey: debounce(function() {
		if ($(document).scrollTop() > scroll_distance) {
		  if (materialKit.misc.transparent) {
			materialKit.misc.transparent = false;
			$('.navbar-color-on-scroll').removeClass('navbar-grey');
		  }
		} else {
		  if (!materialKit.misc.transparent) {
			materialKit.misc.transparent = true;
			$('.navbar-color-on-scroll').addClass('navbar-grey');
		  }
		}
	  }, 17)
};
