<?php
/*
Plugin Name: Accordion Category List
Plugin URI: http://wordpress.org/extend/plugins/getshopped-accordion-category-widget/
Description: Adds accordion effect to widget category list
Version: 1.0
Author: Mina Adel
Author URI: http://wordpress.org/extend/plugins/getshopped-accordion-category-widget/
License: GPL
*/


add_action('init','getshopped_slidingcat_init');

function getshopped_slidingcat_init()
{

  if(!is_admin()){

    wp_register_script( 'sliding_cat_jquery' , 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' );
    wp_enqueue_script( 'sliding_cat_jquery'); 
  
  
    wp_register_script( 'getshopped_slidingcat_load_js', plugins_url( 'js/getshopped_slidingcat.js' , __FILE__ ) );
    wp_enqueue_script( 'getshopped_slidingcat_load_js' );
	
    wp_register_style( 'getshopped_slidingcat_load_style',  plugins_url( 'css/getshopped_sliding_category.css', __FILE__) );
    wp_enqueue_style( 'getshopped_slidingcat_load_style');
     
  }

}


add_action('admin_notices', 'getshopped_slidingcat_admin_notice');
function getshopped_slidingcat_admin_notice(){
    
    global $current_user ;
    
    $user_id = $current_user->ID;
    /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'getshopped_slidingcat_ignore_notice') ) {
        echo '<div class="updated">
           <p>Thank you for installing GetShopping Category Acordion Plugin. Please consider a <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=MP2NVVRFX53CN&lc=CA&item_name=GetShopped%20SlidingCat&amount=1%2e00&currency_code=USD&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank">
           $1 donation</a> to support this plugin. <a href="?getshopped_slidingcat_notice_ignore=0">Discard</a>
           
           </p>
           
           </div>';
    }       
}

add_action('admin_init', 'getshopped_slidingcat_notice_ignore');
function getshopped_slidingcat_notice_ignore() {
    global $current_user;
    $user_id = $current_user->ID;
    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset($_GET['getshopped_slidingcat_notice_ignore']) && $_GET['getshopped_slidingcat_notice_ignore']=='0' ) {
          add_user_meta($user_id, 'getshopped_slidingcat_ignore_notice', 'true', true);
    }
}

?>
