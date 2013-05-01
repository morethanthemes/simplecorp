<?php

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function simplecorp_form_system_theme_settings_alter(&$form, &$form_state) {
   
    $form['mtt_settings'] = array(
        '#type' => 'fieldset',
        '#title' => t('SimpleCorp Theme Settings'),
        '#collapsible' => FALSE,
        '#collapsed' => FALSE,
    );

    $form['mtt_settings']['tabs'] = array(
        '#type' => 'vertical_tabs',
    );

    $form['mtt_settings']['tabs']['looknfeel'] = array(
        '#type' => 'fieldset',
        '#title' => t('Look\'n\'Feel'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['mtt_settings']['tabs']['looknfeel']['theme_colors'] = array(
        '#type' => 'fieldset',
        '#title' => t('Color Schemes'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['looknfeel']['theme_colors']['theme_color'] = array(
        '#type' => 'select',
        '#title' => t('Colors'),
        '#description'   => t('From the drop-down menu, select the color scheme you prefer.'),
        '#default_value' => theme_get_setting('theme_color','simplecorp'),
        '#options' => array(
            'default' => t('Default'),
            'dark-blue' => t('Dark Blue'),
            'dark-blue-dark' => t('Dark Blue Dark'),
            'dark-green' => t('Dark Green'),
            'dark-green-dark' => t('Dark Green Dark'),
            'dark-pink' => t('Dark Pink'),
            'dark-purple' => t('Dark Purple'),
            'dark-red' => t('Dark Red'),
            'dark-yellow' => t('Dark Yellow'),
            'light-blue-dark' => t('Light Blue Dark'),
            'light-gray' => t('Light Gray'),
            'light-green' => t('Light Green'),
            'light-orange' => t('Light Orange'),
            'light-purple' => t('Light Purple'),
            'light-red' => t('Light Red'),
            'light-yellow' => t('Light Yellow'),
            ),
    );

    $form['mtt_settings']['tabs']['looknfeel']['buttons'] = array(
        '#type' => 'fieldset',
        '#title' => t('Buttons'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['looknfeel']['buttons']['button_color'] = array(
        '#type' => 'select',
        '#title' => t('Colors'),
        '#description'   => t('From the drop-down menu, select the color scheme you prefer.'),
        '#default_value' => theme_get_setting('button_color','simplecorp'),
        '#options' => array(
            'blue' => t('Blue'),
            'steel_blue' => t('Steel Blue'),
            'sea_blue' => t('Sea Blue'),
            'green' => t('Green'),
            'dark_green' => t('Dark Green'),
            'fresh_green' => t('Fresh green'),
            'earth_green' => t('Earth green'),
            'red' => t('Red'),
            'light_red' => t('Light red'),
            'orange' => t('Orange'),
            'purple' => t('Purple'),
            'lavander' => t('Lavander'),
            'grey' => t('Grey'),
            'light_grey' => t('Light Grey'),
            'dark_grey' => t('Dark Grey'),
            'black' => t('Black'),
            '' => t('Without Style'),
            ),
    );

    $form['mtt_settings']['tabs']['plugins'] = array(
        '#type' => 'fieldset',
        '#title' => t('Plugins'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );
    
    $form['mtt_settings']['tabs']['plugins']['header_tooltip'] = array(
        '#type' => 'fieldset',
        '#title' => t('Social Icons'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['header_tooltip']['social_icons_display'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show Social Icons'),
        '#description'   => t('Use the checkbox to enable or disable the Social Icons inside the header [<em>simplecorp/page.tpl.php</em>].'),
        '#default_value' => theme_get_setting('social_icons_display','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['header_tooltip']['header_tooltip_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include javascript library for the Social Icons Tooltips'),
        '#description'   => t('Use the checkbox to include or not the javascript tipsy.js library for the Social Icons Tooltips [<em>simplecorp/js/plugins/jquery.tipsy.js</em>].<br> More info <a href="http://onehackoranother.com/projects/jquery/tipsy/" target="_blank">http://onehackoranother.com/projects/jquery/tipsy</a>.'),
        '#default_value' => theme_get_setting('header_tooltip_js','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['main_menu'] = array(
        '#type' => 'fieldset',
        '#title' => t('Main Menu Load Effect'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['main_menu']['main_menu_custom_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include javascript code for the main-menu load effect'),
        '#description'   => t('Use the checkbox to include or not the custom javascript code for the main-menu load effect.'),
        '#default_value' => theme_get_setting('main_menu_custom_js','simplecorp'),
    );

        $form['mtt_settings']['tabs']['plugins']['slideshow'] = array(
        '#type' => 'fieldset',
        '#title' => t('Front-page Slideshow'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_display'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show Slideshow'),
        '#description'   => t('Use the checkbox to enable or disable the front-page Slideshow [<em>simplecorp/page.tpl.php</em>].'),
        '#default_value' => theme_get_setting('slideshow_display','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include Slideshow javascript code'),
        '#description'   => t('Use the checkbox to include or not the javascript code (Flexslider) for the Slideshow. <br>More info <a href="http://flexslider.woothemes.com/" target="_blank">http://flexslider.woothemes.com</a>.'),
        '#default_value' => theme_get_setting('slideshow_js','simplecorp'),
    );    

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_effect'] = array(
        '#type' => 'select',
        '#title' => t('Effects'),
        '#description'   => t('From the drop-down menu, select the Slideshow effect you prefer.'),
        '#default_value' => theme_get_setting('slideshow_effect','simplecorp'),
        '#options' => array(
        'slide' => t('Slide'),
        'fade' => t('Fade'),
        ),
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_effect_time'] = array(
        '#type' => 'textfield',
        '#title' => t('Effect duration (sec)'),
        '#default_value' => theme_get_setting('slideshow_effect_time','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_random'] = array(
        '#type' => 'checkbox',
        '#title' => t('Randomize slide order'),
        '#default_value' => theme_get_setting('slideshow_random','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_pause'] = array(
        '#type' => 'checkbox',
        '#title' => t('Pause Slideshow on hover'),
        '#default_value' => theme_get_setting('slideshow_pause','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_controls'] = array(
        '#type' => 'checkbox',
        '#title' => t('Display Slideshow controls'),
        '#default_value' => theme_get_setting('slideshow_controls','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['slideshow']['slideshow_touch'] = array(
        '#type' => 'checkbox',
        '#title' => t('Allow touch swipe navigation'),
        '#default_value' => theme_get_setting('slideshow_touch','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['highlighted'] = array(
        '#type' => 'fieldset',
        '#title' => t('Front-page Featured Content'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['highlighted']['highlighted_display'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show Featured content'),
        '#description'   => t('Use the checkbox to enable or disable the front-page Featured content [<em>simplecorp/page.tpl.php</em>].'),
        '#default_value' => theme_get_setting('highlighted_display','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['carousel'] = array(
        '#type' => 'fieldset',
        '#title' => t('Front-page Carousel'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['carousel']['carousel_display'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show Carousel'),
        '#description'   => t('Use the checkbox to enable or disable the front-page Carousel [<em>page.tpl.php</em>].'),
        '#default_value' => theme_get_setting('carousel_display','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['carousel']['carousel_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include Carousel javascript code'),
        '#description'   => t('Use the checkbox to include or not the javascript code (JCarousel) for the Carousel. <br>More info <a href="http://sorgalla.com/jcarousel/" target="_blank">http://sorgalla.com/jcarousel</a>.'),
        '#default_value' => theme_get_setting('carousel_js','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['carousel']['carousel_effect_time'] = array(
        '#type' => 'textfield',
        '#title' => t('Effect duration (sec)'),
        '#default_value' => theme_get_setting('carousel_effect_time','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['carousel']['carousel_effect'] = array(
        '#type' => 'select',
        '#title' => t('Effects'),
        '#description'   => t('From the drop-down menu, select the Carousel easing effect you prefer.'),
        '#default_value' => theme_get_setting('carousel_effect','simplecorp'),
        '#options' => array(
            'linear' => 'linear',
            'swing' => 'swing',
            'easeInQuad' => 'easeInQuad',
            'easeOutQuad' => 'easeOutQuad',
            'easeInOutQuad' => 'easeInOutQuad',
            'easeInCubic' => 'easeInCubic',
            'easeOutCubic' => 'easeOutCubic',
            'easeInOutCubic' => 'easeInOutCubic',
            'easeInQuart' => 'easeInQuart',
            'easeOutQuart' => 'easeOutQuart',
            'easeInOutQuart' => 'easeInOutQuart',
            'easeInQuint' => 'easeInQuint',
            'easeOutQuint' => 'easeOutQuint',
            'easeInOutQuint' => 'easeInOutQuint',
            'easeInExpo' => 'easeInExpo',
            'easeOutExpo' => 'easeOutExpo',
            'easeInOutExpo' => 'easeInOutExpo',
            'easeInSine' => 'easeInSine',
            'easeOutSine' => 'easeOutSine',
            'easeInOutSine' => 'easeInOutSine',
            'easeInCirc' => 'easeInCirc',
            'easeOutCirc' => 'easeOutCirc',
            'easeInOutCirc' => 'easeInOutCirc',
            'easeInElastic' => 'easeInElastic',
            'easeOutElastic' => 'easeOutElastic',
            'easeInOutElastic' => 'easeInOutElastic',
            'easeInBack' => 'easeInBack',
            'easeOutBack' => 'easeOutBack',
            'easeInOutBack' => 'easeInOutBack',
            'easeInBounce' => 'easeInBounce',
            'easeOutBounce' => 'easeOutBounce',
            'easeInOutBounce' => 'easeInOutBounce',
            ),
    );

    $form['mtt_settings']['tabs']['plugins']['quicksand'] = array(
        '#type' => 'fieldset',
        '#title' => t('Portfolio filters'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['quicksand']['quicksand_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include quicksand javascript code'),
        '#description'   => t('Use the checkbox to include or not the quicksand javascript code in order to reorder and filter portofolio items with a nice shuffling animation [<em>simplecorp/js/plugins/quicksand.js</em> & <em>simplecorp/js/plugins/quicksand_initialize.js</em>]. <br>More info <a href="http://razorjack.net/quicksand/" target="_blank">http://razorjack.net/quicksand</a>.'),
        '#default_value' => theme_get_setting('quicksand_js','simplecorp'),
    );    

    $form['mtt_settings']['tabs']['plugins']['prettyphoto'] = array(
        '#type' => 'fieldset',
        '#title' => t('PrettyPhoto'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['prettyphoto']['prettyphoto_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include prettyPhoto javascript and css code'),
        '#description'   => t('Use the checkbox to include or not the prettyPhoto javascript and css code in order to overlay images on the current page [<em>simplecorp/js/plugins/jquery.prettyPhoto.js</em> & <em>simplecorp/css/plugins/prettyPhoto.css</em>]. <br>More info <a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/" target="_blank">http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone</a>.'),
        '#default_value' => theme_get_setting('prettyphoto_js','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['prettyphoto']['prettyphoto_theme'] = array(
        '#type' => 'select',
        '#title' => t('PrettyPhoto themes'),
        '#description'   => t('From the drop-down menu, select the theme you prefer.'),
        '#default_value' => theme_get_setting('prettyphoto_theme','simplecorp'),
        '#options' => array(
            'pp_default' => t('Default'),
            'light_rounded' => t('Light Rounded'),
            'dark_rounded' => t('Dark Rounded'),
            'light_square' => t('Light Square'),
            'dark_square' => t('Dark Square'),
            'facebook' => 'Facebook',
            ),
    );

    $form['mtt_settings']['tabs']['plugins']['prettyphoto']['prettyphoto_social_tools'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show Twitter and Facebook share buttons'),
        '#description'   => t('Use the checkbox to enable or disable the Twitter and Facebook share buttons.'),
        '#default_value' => theme_get_setting('prettyphoto_social_tools','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['jtweetanywhere'] = array(
        '#type' => 'fieldset',
        '#title' => t('jTweetAnywhere'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['plugins']['jtweetanywhere']['jtweetanywhere_js'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include jTweetAnywhere javascript and css code'),
        '#description'   => t('Use the checkbox to include or not the jTweetAnywhere javascript and css code in order to display tweets from your twitter acount [<em>simplecorp/js/plugins/jquery.jtweets-1.2.1.js</em> & <em>simplecorp/css/plugins/jquery.jtweets-1.2.1.css</em>]. To enable the plugin you must put the "&lt;div id="#jTweets"&gt;&lt;/div&gt;" placeholder as block into a region. More info about jTweetsAnywhere plugin <a href="http://thomasbillenstein.com/jTweetsAnywhere/" target="_blank">http://thomasbillenstein.com/jTweetsAnywhere</a>.'),
        '#default_value' => theme_get_setting('jtweetanywhere_js','simplecorp'),
    );

    $form['mtt_settings']['tabs']['plugins']['jtweetanywhere']['jtweetanywhere_id'] = array(
        '#type' => 'textfield',
        '#title' => t('Your twitter acount username'),
        '#description' => t('For example <em>morethanthemes</em>'),
        '#default_value' => theme_get_setting('jtweetanywhere_id','simplecorp'),
    );

    $form['mtt_settings']['tabs']['shortcodes'] = array(
        '#type' => 'fieldset',
        '#title' => t('Shortcodes'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['mtt_settings']['tabs']['shortcodes']['columns'] = array(
        '#type' => 'fieldset',
        '#title' => t('Columns'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['shortcodes']['columns']['columns_enable'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include css file for custom grid [<em>simplecorp/css/shortcodes/columns.css</em>].'),
        '#default_value' => theme_get_setting('columns_enable','simplecorp'),
    );

    $form['mtt_settings']['tabs']['shortcodes']['boxes'] = array(
        '#type' => 'fieldset',
        '#title' => t('Boxes'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['shortcodes']['boxes']['boxes_enable'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include css file for additional message styles [<em>simplecorp/css/shortcodes/boxes.css</em>].'),
        '#default_value' => theme_get_setting('boxes_enable','simplecorp'),
    );

    $form['mtt_settings']['tabs']['shortcodes']['lists'] = array(
        '#type' => 'fieldset',
        '#title' => t('Lists'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['mtt_settings']['tabs']['shortcodes']['lists']['lists_enable'] = array(
        '#type' => 'checkbox',
        '#title' => t('Include css file for additional lists styles [<em>simplecorp/css/shortcodes/lists.css</em>].'),
        '#default_value' => theme_get_setting('lists_enable','simplecorp'),
    );

    $form['mtt_settings']['tabs']['breadcrumb'] = array(
        '#type' => 'fieldset',
        '#title' => t('Breadcrumb'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['mtt_settings']['tabs']['breadcrumb']['breadcrumb_display'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show breadcrumb'),
        '#description'   => t('Use the checkbox to enable or disable the breadcrumb.'),
        '#default_value' => theme_get_setting('breadcrumb_display','simplecorp'),
    );

    $form['mtt_settings']['tabs']['breadcrumb']['breadcrumb_separator'] = array(
        '#type' => 'textfield',
        '#title' => t('Breadcrumb separator'),
        '#default_value' => theme_get_setting('breadcrumb_separator','simplecorp'),
        '#size'          => 5,
        '#maxlength'     => 10,
    );

    $form['mtt_settings']['tabs']['support']['responsive'] = array(
        '#type' => 'fieldset',
        '#title' => t('Responsive'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );
	
	$form['mtt_settings']['tabs']['support']['responsive']['responsive_menu'] = array(
		'#type' => 'fieldset',
		'#title' => t('Responsive menu'),
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	);
	
	$form['mtt_settings']['tabs']['support']['responsive']['responsive_menu']['responsive_menu_state'] = array(
		'#type' => 'checkbox',
		'#title' => t('Enable responsive menu'),
		'#description'   => t('Use the checkbox to enable the plugin which transforms the Main menu of your site to a dropdown select list when your browser is at mobile widths.'),
		'#default_value' => theme_get_setting('responsive_menu_state', 'simplecorp'),
	);
	
	$form['mtt_settings']['tabs']['support']['responsive']['responsive_menu']['responsive_menu_switchwidth'] = array(
		'#type' => 'textfield',
		'#title' => t('Switch width (px)'),
		'#description'   => t('Set the width (in pixels) at which the Main menu of the site will change to a dropdown select list.'),
		'#default_value' => theme_get_setting('responsive_menu_switchwidth', 'simplecorp'),
	);
	
	$form['mtt_settings']['tabs']['support']['responsive']['responsive_menu']['responsive_menu_topoptiontext'] = array(
		'#type' => 'textfield',
		'#title' => t('Top option text'),
		'#description'   => t('Set the very first option display text.'),
		'#default_value' => theme_get_setting('responsive_menu_topoptiontext', 'simplecorp'),
	);

    $form['mtt_settings']['tabs']['support']['responsive']['responsive_meta'] = array(
        '#type' => 'checkbox',
        '#title' => t('Add meta tags to support responsive design on mobile devices.'),
        '#default_value' => theme_get_setting('responsive_meta','simplecorp'),
    );

    $form['mtt_settings']['tabs']['support']['responsive']['responsive_respond'] = array(
        '#type' => 'checkbox',
        '#title' => t('Add Respond.js [<em>simplecorp/js/respond.min.js</em>] JavaScript to add basic CSS3 media query support to IE 6-8.'),
        '#default_value' => theme_get_setting('responsive_respond','simplecorp'),
        '#description'   => t('IE 6-8 require a JavaScript polyfill solution to add basic support of CSS3 media queries. Note that you should enable <strong>Aggregate and compress CSS files</strong> through <em>/admin/config/development/performance</em>.'),
    );

}