<?php 
	
/**
 * Add javascript files for jquery slideshow.
 */
if (theme_get_setting('slideshow_js','simplecorp')):

	drupal_add_js(drupal_get_path('theme', 'simplecorp') . '/js/plugins/jquery.flexslider-min.js');

	//Initialize slideshow using theme settings
	$effect=theme_get_setting('slideshow_effect','simplecorp');
	$effect_time=theme_get_setting('slideshow_effect_time','simplecorp')*1000;
	$slideshow_controls=theme_get_setting('slideshow_controls','simplecorp');
	$slideshow_random=theme_get_setting('slideshow_random','simplecorp');
	$slideshow_pause=theme_get_setting('slideshow_pause','simplecorp');
	$slideshow_touch=theme_get_setting('slideshow_touch','simplecorp');

	drupal_add_js('
		jQuery(document).ready(function($) {

		    $(window).load(function() {

		        $(".flexslider").fadeIn("slow");

		        $(".flexslider").flexslider({
		            useCSS: false,
		            animation: "'.$effect.'",
		            controlNav: '.$slideshow_controls.',
		            directionNav: '.$slideshow_controls.',
		            animationLoop: true,
		            touch: '.$slideshow_touch.',
		            pauseOnHover: '.$slideshow_pause.',
		            nextText: "&rsaquo;",
		            prevText: "&lsaquo;",
		            keyboard: true,
		            slideshowSpeed: '.$effect_time.',
		            randomize: '.$slideshow_random.',
		            start: function(slider) {
		                slider.removeClass("loading");
		            }
		        });
		    });
		});',array('type' => 'inline', 'scope' => 'footer', 'weight' => 5)
	);

endif;

/**
 * Add javascript files for jquery carousel.
 */
if (theme_get_setting('carousel_js','simplecorp')):

	drupal_add_js(drupal_get_path('theme', 'simplecorp') . '/js/plugins/jquery.jcarousel.min.js');
	drupal_add_js(drupal_get_path('theme', 'simplecorp') . '/js/jquery.easing-1.3.min.js');

	//Initialize slideshow using theme settings
	$carousel_effect_time=theme_get_setting('carousel_effect_time','simplecorp')*1000;
	$carousel_effect=theme_get_setting('carousel_effect','simplecorp');

	drupal_add_js('
		jQuery(document).ready(function($) {

		    var currentWindowWidth = jQuery(window).width();
		    jQuery(window).resize(function() {
		        currentWindowWidth = jQuery(window).width();
		    });

		    $(window).load(function() {

		        $("ul#projects-carousel").fadeIn("fast");

		        if (jQuery(".portfolio-item-hover-content").length && jQuery()) {
		            function hover_effect() {
		                jQuery(".portfolio-item-hover-content").hover(function() {
		                    jQuery(this).find("div,a").stop(0, 0).removeAttr("style");
		                    jQuery(this).find(".hover-options").animate({
		                        opacity: 0.9
		                    }, "fast");
		                    jQuery(this).find("a").animate({
		                        "top": "60%"
		                    });
		                }, function() {
		                    jQuery(this).find(".hover-options").stop(0, 0).animate({
		                        opacity: 0
		                    }, "fast");
		                    jQuery(this).find("a").stop(0, 0).animate({
		                        "top": "150%"
		                    }, "slow");
		                    jQuery(this).find("a.zoom").stop(0, 0).animate({
		                        "top": "150%"
		                    }, "slow");
		                });
		            }
		            hover_effect();
		        }
				
		        (function() {
		            var jQuerycarousel = jQuery("#projects-carousel");
		            if (jQuerycarousel.length) {
		                var scrollCount;
		                if (jQuery(window).width() < 480) {
		                    scrollCount = 1;
		                } else if (jQuery(window).width() < 768) {
		                    scrollCount = 1;
		                } else if (jQuery(window).width() < 960) {
		                    scrollCount = 3;
		                } else {
		                    scrollCount = 4;
		                }
		                jQuerycarousel.jcarousel({
		                    animation: '.$carousel_effect_time.',
		                    easing: "'.$carousel_effect.'",
		                    scroll: scrollCount,
		                    initCallback: function() {
		                        jQuerycarousel.removeClass("loading")
		                    },
		                });
		            }
		        })();
		    });
		});',	array('type' => 'inline', 'scope' => 'footer', 'weight' => 7)
	);	

endif;


/**
 * Add custom javascript for main menu
 */
if (theme_get_setting('main_menu_custom_js','simplecorp')):
	drupal_add_js('
		jQuery(document).ready(function($) {

		    if (jQuery("#main-navigation, #main-navigation .content").length && jQuery()) {
		        var arrowimages = {
		            down: ["downarrowclass", "./images/plus.png", 23],
		            right: ["rightarrowclass", "./images/plus-white.png"]
		        }
		        var jqueryslidemenu = {
		            animateduration: {
		                over: 200,
		                out: 100
		            },
		            //duration of slide in/ out animation, in milliseconds
		            buildmenu: function(menuid, arrowsvar) {

		                jQuery(document).ready(function(jQuery) {
		                    var jQuerymainmenu = jQuery("#" + menuid + ">ul.menu:not(.sf-menu)")
		                    var jQueryheaders = jQuerymainmenu.find("ul").parent()

		                    jQueryheaders.each(function(i) {
		                        var jQuerycurobj = jQuery(this)
		                        var jQuerysubul = jQuery(this).find("ul:eq(0)")
		                        this._dimensions = {
		                            w: this.offsetWidth,
		                            h: this.offsetHeight,
		                            subulw: jQuerysubul.outerWidth(),
		                            subulh: jQuerysubul.outerHeight()
		                        }
		                        this.istopheader = jQuerycurobj.parents("ul").length == 1 ? true : false
		                        jQuerysubul.css({
		                            top: this.istopheader ? this._dimensions.h + "px" : 0
		                        })
		                        jQuerycurobj.children("a:eq(0)").css(this.istopheader ? {
		                            paddingRight: arrowsvar.down[2]
		                        } : {}).append("<span class=" + (this.istopheader ? arrowsvar.down[0] : arrowsvar.right[0]) + " />")

		                        jQuerycurobj.hover(

		                        function(e) {
		                            var jQuerytargetul = jQuery(this).children("ul:eq(0)")
		                            this._offsets = {
		                                left: jQuery(this).offset().left,
		                                top: jQuery(this).offset().top
		                            }
		                            var menuleft = this.istopheader ? 0 : this._dimensions.w
		                            menuleft = (this._offsets.left + menuleft + this._dimensions.subulw > jQuery(window).width()) ? (this.istopheader ? -this._dimensions.subulw + this._dimensions.w : -this._dimensions.w) : menuleft
		                            if (jQuerytargetul.queue().length <= 1) //if 1 or less queued animations
		                            jQuerytargetul.css({
		                                left: menuleft + "px",
		                                width: this._dimensions.subulw + "px"
		                            }).slideDown(jqueryslidemenu.animateduration.over)
		                        }, function(e) {
		                            var jQuerytargetul = jQuery(this).children("ul:eq(0)")
		                            jQuerytargetul.slideUp(jqueryslidemenu.animateduration.out)
		                        }) //end hover
		                        jQuerycurobj.click(function() {
		                            jQuery(this).children("ul:eq(0)").hide()
		                        })
		                    }) //end jQueryheaders.each()

		                    jQuerymainmenu.find("ul").css({
		                        display: "none",
		                        visibility: "visible"
		                    })

		                }) //end document.ready
		            }
		        }

		        jqueryslidemenu.buildmenu("main-navigation .content", arrowimages)
		        jqueryslidemenu.buildmenu("main-navigation", arrowimages)

		    }
		});', array('type' => 'inline', 'scope' => 'footer', 'weight' => 6)
	);
endif;


/**
 * Add jquery.tipsy.js file for header social icons
 */
if (theme_get_setting('header_tooltip_js','simplecorp')):

	drupal_add_js(drupal_get_path('theme', 'simplecorp') . '/js/plugins/jquery.tipsy.js');
	drupal_add_js('
		jQuery(document).ready(function($) {
		    if (jQuery().tipsy) {
		        jQuery("#social-01").tipsy({ gravity: "n" });
		        jQuery("#social-02").tipsy({ gravity: "n" });
		        jQuery("#social-03").tipsy({ gravity: "n" });
		        jQuery("#social-04").tipsy({ gravity: "n" });
		        jQuery("#social-05").tipsy({ gravity: "n" });
		        jQuery("#social-06").tipsy({ gravity: "n" });
		        jQuery("#social-07").tipsy({ gravity: "n" });
		        jQuery("#social-07").tipsy({ gravity: "n" });
		        jQuery("#social-08").tipsy({ gravity: "n" });
		        jQuery("#social-09").tipsy({ gravity: "n" });
		        jQuery("#social-10").tipsy({ gravity: "n" });
		        jQuery("#social-11").tipsy({ gravity: "n" });
		        jQuery("#team-01").tipsy({ gravity: "s" });
		    }
		});', array('type' => 'inline', 'scope' => 'footer', 'weight' => 9)
	);
endif;			


/**
 * Add jquery.prettyPhoto.js and prettyPhoto.css files for portfolio items
 */
if (theme_get_setting('prettyphoto_js','simplecorp')):
	
	drupal_add_js(drupal_get_path('theme', 'simplecorp') . '/js/plugins/jquery.prettyPhoto.js');
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/plugins/prettyPhoto.css');
	
	$prettyphoto_theme=theme_get_setting('prettyphoto_theme','simplecorp');
	$prettyphoto_social_tools=theme_get_setting('prettyphoto_social_tools','simplecorp');

	if ($prettyphoto_social_tools):
		drupal_add_js('
			jQuery("a[data-rel^=prettyPhoto], a.prettyPhoto, a[rel^=prettyPhoto]").prettyPhoto({
			    overlay_gallery: false,
			    theme: "'.$prettyphoto_theme.'",
			});', array('type' => 'inline', 'scope' => 'footer', 'weight' => 15)
		);
	else:
		drupal_add_js('
			jQuery("a[data-rel^=prettyPhoto], a.prettyPhoto, a[rel^=prettyPhoto]").prettyPhoto({
			    overlay_gallery: false,
			    theme: "'.$prettyphoto_theme.'",
			    social_tools: false,
			});', array('type' => 'inline', 'scope' => 'footer', 'weight' => 15)
		);
	endif;


endif;


/**
 * Add Javascript for responsive mobile menu
 */
if (theme_get_setting('responsive_menu_state','simplecorp')) {

$responsive_menu_switchwidth=theme_get_setting('responsive_menu_switchwidth','simplecorp');
$responsive_menu_topoptiontext=theme_get_setting('responsive_menu_topoptiontext','simplecorp');

drupal_add_js(drupal_get_path('theme', 'simplecorp') .'/js/plugins/jquery.mobilemenu.min.js');
drupal_add_js('
jQuery(document).ready(function($) {

	$("#main-navigation > ul, #main-navigation .content > ul").mobileMenu({
	prependTo: "#navigation-wrapper",
	combine: false,
	switchWidth: '.$responsive_menu_switchwidth.',
	topOptionText: "'.$responsive_menu_topoptiontext.'"
	});

});', array('type' => 'inline', 'scope' => 'footer', 'weight' => 10)
);
}

/**
 * Add Javascript for quicksand plugin
 */
if (theme_get_setting('quicksand_js','simplecorp')):
drupal_add_js(drupal_get_path('theme', 'simplecorp') .'/js/plugins/jquery.quicksand.js');
drupal_add_js(drupal_get_path('theme', 'simplecorp') .'/js/plugins/quicksand_initialize.js');
endif;	


/**
 * Add javascript for back to top action
 */
drupal_add_js('
jQuery(document).ready(function() { jQuery(".backtotop").click(function(){ jQuery("html, body").animate({scrollTop:0}, "slow"); return false; }); });
', array('type' => 'inline', 'scope' => 'footer', 'weight' => 9)
);


/**
 * Add Javascript for jTweetsAnywhere plugin
 */
if (theme_get_setting('jtweetanywhere_js','simplecorp')):

	drupal_add_js(drupal_get_path('theme', 'simplecorp') .'/js/plugins/jquery.jtweetsanywhere-1.3.1.js');
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/plugins/jquery.jtweetsanywhere-1.3.1.css');

	//Initialize slideshow using theme settings
	$jtweetanywhere_id=theme_get_setting('jtweetanywhere_id','simplecorp');

	drupal_add_js('
		jQuery(document).ready(function($) {
		    $("#jTweets").jTweetsAnywhere({
		        username: "'.$jtweetanywhere_id.'",
		        count: 2,
		        showTweetFeed: {
		            showInReplyTo: false,
		            paging: {
		                mode: "none"
		            }
		        }
		    });
		});',	array('type' => 'inline', 'scope' => 'footer', 'weight' => 16)
	);
endif;	


/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function simplecorp_breadcrumb($variables){
	$breadcrumb = $variables['breadcrumb'];
	$breadcrumb_separator=theme_get_setting('breadcrumb_separator','simplecorp');

	if (!empty($breadcrumb)) {
	$breadcrumb[] = drupal_get_title();
	return '<div id="breadcrumb">' . implode(' <span class="breadcrumb-separator">' . $breadcrumb_separator . ' </span>' , $breadcrumb) . '</div>';
	}

}


/**
 * Add files for custom buttons.
 */
if (!(theme_get_setting('button_color','simplecorp') == '')):
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/shortcodes/buttons.css');
endif;

function simplecorp_button($variables) {
	$button_color = theme_get_setting('button_color','simplecorp');
	if($button_color == '') {
		$button_classes = '';
	} else {
		$button_classes = ' button small round ';
	}	
	$element = $variables['element'];
	$element['#attributes']['type'] = 'submit';
	element_set_attributes($element, array('id', 'name', 'value'));

	$element['#attributes']['class'][] = 'form-' . $element['#button_type'] . $button_classes . $button_color;
	if (!empty($element['#attributes']['disabled'])) {
	$element['#attributes']['class'][] = 'form-button-disabled';
	}

	return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

/**
 * Add styles for theme color schemes.
 */
if (!(theme_get_setting('theme_color','simplecorp') == 'default')):
	$theme_color = theme_get_setting('theme_color','simplecorp');
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/color-schemes/' . $theme_color . '/styles.css', array('group' => CSS_THEME, 'weight' => 120));
endif;


/**
 * Add columns.css
 */
if (theme_get_setting('columns_enable','simplecorp')):
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/shortcodes/columns.css', array('group' => CSS_THEME, 'weight' => 116));
endif;


/**
 * Add lists.css
 */
if (theme_get_setting('lists_enable','simplecorp')):
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/shortcodes/lists.css', array('group' => CSS_THEME, 'weight' => 117));
endif;


/**
 * Add boxes.css
 */
if (theme_get_setting('boxes_enable','simplecorp')):
	drupal_add_css(drupal_get_path('theme', 'simplecorp') . '/css/shortcodes/boxes.css', array('group' => CSS_THEME, 'weight' => 118));
endif;


/**
 * Page alter.
 */
function simplecorp_page_alter($page) {
	if (theme_get_setting('responsive_meta','simplecorp')):
		$mobileoptimized = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'MobileOptimized',
		'content' =>  'width'
		)
		);

		$handheldfriendly = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'HandheldFriendly',
		'content' =>  'true'
		)
		);

		$viewport = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'viewport',
		'content' =>  'width=device-width, initial-scale=1'
		)
		);

		drupal_add_html_head($mobileoptimized, 'MobileOptimized');
		drupal_add_html_head($handheldfriendly, 'HandheldFriendly');
		drupal_add_html_head($viewport, 'viewport');
	endif;
}


/**
 * Preprocess function for node.tpl.php.
 */
function simplecorp_preprocess_node(&$variables) {
	$node = $variables['node'];
	$variables['submitted_day'] = format_date($node->created, 'custom', 'j');
	$variables['submitted_month'] = format_date($node->created, 'custom', 'F');
	$variables['submitted_year'] = format_date($node->created, 'custom', 'Y');
}


/**
 * Preprocess function for comment.tpl.php.
 */
function simplecorp_preprocess_comment(&$variables) {
	$comment = $variables['comment'];
	$variables['submitted_day_c'] = format_date($comment->created, 'custom', 'jS');
	$variables['submitted_month_c'] = format_date($comment->created, 'custom', 'F');
	$variables['submitted_year_c'] = format_date($comment->created, 'custom', 'Y');
}


/**
 * Implements hook_preprocess_html().
 */
function simplecorp_preprocess_html(&$vars) {
	$vars['rdf'] = new stdClass;

	if (module_exists('rdf')) {
	$vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
	$vars['rdf']->version = ' version="HTML+RDFa 1.1"';
	$vars['rdf']->namespaces = $vars['rdf_namespaces'];
	$vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
	}
	else {
	$vars['doctype'] = '<!DOCTYPE html>' . "\n";
	$vars['rdf']->version = '';
	$vars['rdf']->namespaces = '';
	$vars['rdf']->profile = '';
	}
}

?>