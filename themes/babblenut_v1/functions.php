<?php

// jQuery Insert From Google
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

//Stuff
wp_register_script( 'global-stuff', get_template_directory_uri() . '/assets/js/stuff-ck.js');
wp_enqueue_script( 'global-stuff', 'true', 'true', 'true', 'true' );

// Episodes Post Type

add_action( 'init', 'create_post_type');
function create_post_type() {
  register_post_type( 'episodes',
    array(
      'labels' => array(
        'name' => 'Episodes',
        'singular_name' => 'Episode',
        'menu_name' => 'Episodes',
        'add_new' => 'Add Episode',
        'add_new_item' => 'Add New Episode',
        'edit' => 'Edit',
        'edit_item' => 'Edit Episode',
        'new_item' => 'New Episode',
        'view' => 'View Episode',
        'view_item' => 'View Episode',
        'search_items' => 'Search Episodes',
        'not_found' => 'No Episodes Found',
        'not_found_in_trash' => 'No Episodes Found in Trash',
        'parent' => 'Parent Episode',
      ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 5,
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array('slug' => 'ep', 'with_front' => '' ),
    'query_var' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'supports' => array( 'title','editor','excerpt','custom-fields','thumbnail', 'revisions' ),
    'taxonomies' => array( 'category' ),
    )
  );
}

// Adding Markdown support to episodes
add_action( 'init', 'ts_add_markdown_support' );
function ts_add_markdown_support(){
    add_post_type_support( 'episodes', 'markdown-osi' );
}

// Adding 'Episodes' Post Type to Main Loop

add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {

    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'episodes' ) );

    return $query;
}

// Removing Unnecessary Stuff from Admin Menu

function remove_menus () {
global $menu;
  $restricted = array(__('Posts'), __('Media'), __('Links'),__('Comments'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
}
add_action('admin_menu', 'remove_menus');


// Messing with WP Admin Bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    // we can remove a menu item, like the Comments link, just by knowing the right $id
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('wpseo-menu');
    // or we can remove a submenu, like New Link.
    $wp_admin_bar->remove_menu('new-link', 'new-content');
    $wp_admin_bar->remove_menu('new-media', 'new-content');
    $wp_admin_bar->remove_menu('new-user', 'new-content');
    $wp_admin_bar->remove_menu('new-post', 'new-content');
}
// and we hook our function via
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


/*

Episode Meta Fields 
-----------------------------------------------------------

*/

add_action('acf/register_fields', 'my_register_fields');

// Options Page 

include_once( 'add-ons/acf-options-page/acf-options-page.php' );


if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_episode-stuff',
        'title' => 'Episode Stuff',
        'fields' => array (
            array (
                'key' => 'field_51e9f7a0905b9',
                'label' => 'Episode Number',
                'name' => 'episode_number',
                'type' => 'number',
                'default_value' => '',
                'min' => 1,
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_51ea2c8f059b4',
                'label' => 'Episode Length',
                'name' => 'episode_length',
                'type' => 'number',
                'required' => 1,
                'default_value' => '',
                'min' => 1,
                'max' => 60,
                'step' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'episodes',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'custom_fields',
                1 => 'discussion',
                2 => 'comments',
                3 => 'revisions',
                4 => 'slug',
                5 => 'author',
                6 => 'format',
                7 => 'featured_image',
                8 => 'tags',
                9 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}
