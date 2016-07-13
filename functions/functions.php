<?php

/* 
 * Blackbird Essay Hell Plugins Functions File.
 * 
 */


/**
 * Example function: How to enable a function
 * via plugin options page
 * @author Blackbird Consulting/Jason Chafin
 * @link https://gist.github.com/Herm71/916bc9481f62845ddc97248a871cab4a
 */

function bb_modify_jquery(){
    $jquery_replace = get_option('item_one');
        if ($jquery_replace == 1){
    
        // deregister WordPress JQuery
    wp_deregister_script('jquery');
    //register and enqueue jquery
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js', null, true); // register the external file  
        wp_enqueue_script('jquery'); // enqueue the external file
}if ($jquery_replace !== 1){
    
        
    // deregister WordPress JQuery
    add_action ('wp_print_scripts','bb_dequeue_google'); 
    //wp_register_script('jquery');    
    wp_enqueue_script('jquery'); // enqueue the internal file
}
    
}
//Add this entire function to the WP 'init' hook
add_action('init','bb_modify_jquery');

function bb_dequeue_google(){
    
    wp_dequeue_script('jquery'); // deregister the external file  
}

/**
 * Remove Query String from Static Resources
 * @author Blackbird Consulting/Jason Chafin
 * @link http://www.blackbirdconsult.com/wordpress-seo-remove-version-query-strings/
 *
 * @param $src
 * @return modified query string
 */
function _bb_remove_query_string($src){
    $parts=explode('?',$src);
    return $parts[0];
}
function bb_add_filters (){   
    //$version_query_filter = get_option('remove_query_strings');
        
        $version_query_filter = get_option('item_two');
        //if ($jquery_replace = 1){   
        if ($version_query_filter == 1){
        add_filter( 'script_loader_src', '_bb_remove_query_string', 15, 1 );
        add_filter( 'style_loader_src', '_bb_remove_query_string', 15, 1 );
 }
 }
  add_action('wp','bb_add_filters');
  
 /**
 * Add Additional Image Sizes
 * @author Blackbird Consulting/Jason Chafin
 *
 * @param $src
 * @return modified query string
 */
  // 90 px Square
  function bb_width_ninety_square(){
    
        $ninety_square= get_option('item_three');
        if ($ninety_square == 1){         
        
            if (function_exists('add_image_size')){
                add_image_size ('ninety-square', 90, 90, true);
            }
            
          add_filter( 'image_size_names_choose', 'bb_ninety_square' );  
 
}if ($ninety_square !== 1){
add_action('init','remove_ninety_square');
}
    
}

function bb_ninety_square( $sizes ) {
    return array_merge( $sizes, array(
        'ninety-square' => __('Ninety Square'),
    ) );
}

function remove_ninety_square(){

    remove_image_size('ninety-square');
}


add_action('init','bb_width_ninety_square');

// 144 px Wide
  function bb_width_one_fourty_four(){
    
        $one_fourty_four_wide= get_option('item_four');
        if ($one_fourty_four_wide == 1){     
        
            if (function_exists('add_image_size')){
                add_image_size ('one-fourty-four-wide', 144, 9999);
            }
            
          add_filter( 'image_size_names_choose', 'bb_one_fourty_four_wide' );  
 
}if ($one_fourty_four_wide !== 1){
add_action('init','remove_one_fourty_four_wide');
}
    
}

function bb_one_fourty_four_wide( $sizes ) {
    return array_merge( $sizes, array(
        'one-fourty-four-wide' => __('144 Wide'),
    ) );
}

function remove_one_fourty_four_wide(){

    remove_image_size('one-fourty-four-wide');
}


add_action('init','bb_width_one_fourty_four');

// 150 px Wide
  function bb_width_one_fifty(){
    
        $one_fifty_wide= get_option('item_five');
        if ($one_fifty_wide == 1){     
        
            if (function_exists('add_image_size')){
                add_image_size ('one-fifty-wide', 150, 9999);
            }
            
          add_filter( 'image_size_names_choose', 'bb_one_fifty_wide' );  
 
}if ($one_fifty_wide !== 1){
add_action('init','remove_one_fifty_wide');
}
    
}

function bb_one_fifty_wide( $sizes ) {
    return array_merge( $sizes, array(
        'one-fifty-wide' => __('150 Wide'),
    ) );
}

function remove_one_fifty_wide(){

    remove_image_size('one-fifty-wide');
}


add_action('init','bb_width_one_fifty');

// 173 px Wide
  function bb_width_one_seventy_three(){
    
        $one_seventy_three_wide= get_option('item_five');
        if ($one_seventy_three_wide == 1){     
        
            if (function_exists('add_image_size')){
                add_image_size ('one-seventy-three-wide', 173, 9999);
            }
            
          add_filter( 'image_size_names_choose', 'bb_one_seventy_three_wide' );  
 
}if ($one_seventy_three_wide !== 1){
add_action('init','remove_one_seventy_three_wide');
}
    
}

function bb_one_seventy_three_wide( $sizes ) {
    return array_merge( $sizes, array(
        'one-seventy-three-wide' => __('173 Wide'),
    ) );
}

function remove_one_seventy_three_wide(){

    remove_image_size('one-seventy-three-wide');
}


add_action('init','bb_width_one_seventy_three');

// 180 px Wide
  function bb_width_one_eighty(){
    
        $one_eighty_wide= get_option('item_six');
        if ($one_eighty_wide == 1){     
        
            if (function_exists('add_image_size')){
                add_image_size ('one-eighty-wide', 180, 9999);
            }
            
          add_filter( 'image_size_names_choose', 'bb_one_eighty_wide' );  
 
}if ($one_eighty_wide !== 1){
add_action('init','remove_one_eighty_wide');
}
    
}

function bb_one_eighty_wide( $sizes ) {
    return array_merge( $sizes, array(
        'one-eighty-wide' => __('180 Wide'),
    ) );
}

function remove_one_eighty_wide(){

    remove_image_size('one-eighty-wide');
}


add_action('init','bb_width_one_eighty');

// 200 px Wide
  function bb_width_two_hundred(){
    
        $two_hundred_wide= get_option('item_seven');
        if ($two_hundred_wide == 1){     
        
            if (function_exists('add_image_size')){
                add_image_size ('two-hundred-wide', 200, 9999);
            }
            
          add_filter( 'image_size_names_choose', 'bb_two_hundred_wide' );  
 
}if ($two_hundred_wide !== 1){
add_action('init','remove_two_hundred_wide');
}
    
}

function bb_two_hundred_wide( $sizes ) {
    return array_merge( $sizes, array(
        'two-hundred-wide' => __('200 Wide'),
    ) );
}

function remove_two_hundred_wide(){

    remove_image_size('two-hundred-wide');
}


add_action('init','bb_width_two_hundred');

// 538 px Wide
  function bb_width_five_thirty_eight(){
    
        $five_thirty_eight_wide= get_option('item_eight');
        if ($five_thirty_eight_wide == 1){     
        
            if (function_exists('add_image_size')){
                add_image_size ('five-thirty-eight-wide', 538, 9999);
            }
            
          add_filter( 'image_size_names_choose', 'bb_five_thirty_eight_wide' );  
 
}if ($five_thirty_eight_wide !== 1){
add_action('init','remove_five_thirty_eight_wide');
}
    
}

function bb_five_thirty_eight_wide( $sizes ) {
    return array_merge( $sizes, array(
        'five-thirty-eight-wide' => __('538 Wide'),
    ) );
}

function remove_five_thirty_eight_wide(){

    remove_image_size('five-thirty-eight-wide');
}


add_action('init','bb_width_two_hundred');
