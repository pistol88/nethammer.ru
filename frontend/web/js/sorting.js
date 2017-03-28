$(window).load(function(){
	 var $container = $('.portfolio-list');
	// init
	$container.isotope({
		itemSelector : '.item'
	});
  
	$('#filters').on( 'click', 'a', function() {
		var filterValue = $(this).attr('data-filter');
		$container.isotope({ filter: filterValue });
	});
});

jQuery(window).load(function(){		
	"use strict";	
	jQuery('.portfolio-list').isotope('reLayout');	
	setTimeout("jQuery('.portfolio-list').isotope('reLayout')", 300);		
});
jQuery(window).resize(function(){
	"use strict";
	jQuery('.portfolio-list').isotope('reLayout');
});
jQuery.fn.portfolio_addon = function(addon_options) {
	"use strict";
	//Set Variables
	var addon_el = jQuery(this),
		addon_base = this,
		img_count = addon_options.items.length,
		img_per_load = addon_options.load_count,
		$newEls = '',
		loaded_object = '',
		$container = jQuery('.portfolio-list');
}