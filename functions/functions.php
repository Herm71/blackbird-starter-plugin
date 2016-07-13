<?php

/* 
 * Blackbird Starter Plugins Functions File.
 * 
 */


/**
 * Example function: How to enable a function
 * via plugin options page
 * @author Blackbird Consulting/Jason Chafin
 * @link https://gist.github.com/Herm71/916bc9481f62845ddc97248a871cab4a
 */

function bb_hello_world_init(){
    if (!is_admin()){
        //loads the state of Form Item One into a variable
        $hello_world= get_option('item_one');
        //if the box is checked, it will return a value of "1"
        //if the box is not checked, it will return a value of "false"
        if ($hello_world == 1){ 
            
        //simple Genesis hook to echo "Hello World" above the content area
        //note: if you do not use Genesis, you can still use this method
        //you just need to find a relevant hook for your theme or Framework
        add_action('genesis_before_content','hello_world');
}
    }
}
//Add this entire function to the WP 'init' hook
add_action('init','bb_hello_world_init');

//basic function to echo "Hello World"

function hello_world() {
    echo 'Hello World';
}
