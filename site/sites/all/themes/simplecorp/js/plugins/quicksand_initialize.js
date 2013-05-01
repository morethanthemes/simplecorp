  
jQuery(document).ready(function(){

	if ( jQuery( '.portfolio-item-hover-content' ).length && jQuery() ) {
	function hover_effect() {  
	jQuery('.portfolio-item-hover-content').hover(function() {
	         jQuery(this).find('div,a').stop(0,0).removeAttr('style');
	         jQuery(this).find('.hover-options').animate({opacity: 0.9}, 'fast');
	         jQuery(this).find('a').animate({"top": "60%" });
	    }, function() {
	         jQuery(this).find('.hover-options').stop(0,0).animate({opacity: 0}, "fast");
	         jQuery(this).find('a').stop(0,0).animate({"top": "150%"}, "slow");
	         jQuery(this).find('a.zoom').stop(0,0).animate({"top": "150%"}, "slow");
	       });
		}
	hover_effect();
	}


  var jQueryfilterType = jQuery('#filterable li.active a').attr('class');
  var jQueryholder = jQuery('ul.portfolio-items');
  var jQuerydata = jQueryholder.clone();
	jQuery('#filterable li a').click(function(e) {
		jQuery('#filterable li').removeClass('active');
		var jQueryfilterType = jQuery(this).attr('data-type');
		jQuery(this).parent().addClass('active');
		
		if (jQueryfilterType == 'all') {
			var jQueryfilteredData = jQuerydata.find('li');
		} 
		else {
			var jQueryfilteredData = jQuerydata.find('li[data-type~="' + jQueryfilterType + '"]');
		}

		jQueryholder.quicksand(jQueryfilteredData, {
			duration: 500,
			useScaling: false,
			adjustHeight:false,
			easing: 'swing',
			enhancement:function(){
				hover_effect(); 
			}},
			function() {
				jQuery("a[data-rel^='prettyPhoto'], a.prettyPhoto, a[rel^='prettyPhoto']").prettyPhoto({
						overlay_gallery: false
				});
			}
		);
		return false;
	});
});