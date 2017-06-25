<?php
/*
Plugin Name: Eid Cards
Plugin URI: http://www.rrfonline.com/#eid-mubarak
Author: Rasel Ahmed
Author URI: http://www.rrfonline.com
Version: 1.0
Description: This plugin shows Eid Mubarak card on popup. Cookie based.
textdomain: eid-cards
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Translate direction
load_plugin_textdomain( 'eid-cards', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


// Light toolkit files
function eid_cards_files(){
    
    wp_enqueue_style('remodal', plugin_dir_url( __FILE__ ) .'assets/css/remodal.css');
    
    wp_enqueue_script( 'remodal', plugin_dir_url( __FILE__ ) . 'assets/js/scripts.min.js', array('jquery'), '20120206', true );
    
}
add_action('wp_enqueue_scripts', 'eid_cards_files'); 


function eid_card_shortcode( $atts, $content = null  ) {

        $popup_markup = '
    <script>
        jQuery(window).load(function(){




        if (jQuery.cookie("eitMobarakBiskut")) {

            // Popup is hiding after showing first time!


        } else if (jQuery.cookie("eidBiskut")) {

            var inst = jQuery(\'[data-remodal-id=eid-mubarak]\').remodal();
            inst.open();

        } else {

            var inst = jQuery(\'[data-remodal-id=eid-mubarak]\').remodal();
            inst.open();

        }



        var expiresAt = new Date();
        expiresAt.setTime(expiresAt.getTime() + 2*24*60*60*1000); // Days
        jQuery.cookie("eidBiskut", new Date());
        jQuery.cookie("eitMobarakBiskut", true, { expires: expiresAt });          



        });
    </script>      
    <div style="padding:0;max-width:960px" class="remodal eid-modal" data-remodal-id="eid-mubarak" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <button style="color:#fff;left:auto;right:0" data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
      <div>

        <div id="modal1Desc">
            <img src="'.plugin_dir_url( __FILE__ ).'/assets/img/'.rand(1, 40).'.jpg" alt="" />
        </div>
      </div>
    </div>     
        ';   
    

    
 
    return $popup_markup;
}   
add_shortcode('eid_card', 'eid_card_shortcode');