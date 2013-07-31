<?php

// jQuery Insert From Google
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Media Element Js
wp_register_script( 'mediaelement-js', get_template_directory_uri() . '/assets/js/mediaelement-and-player.min.js');
wp_enqueue_script( 'mediaelement-js', 'true', 'true', 'true', 'true');

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

// Adding Sponsors to Feed

function babblenut_postrss($content) {
  global $wp_query;
  $sponsorPretext = "<h4>This week’s Babblenut is brought to you by:</h4>";
  $episodeSponsor = get_field('episode_sponsor');
  $excerpt = get_field('episode_lead');
    if(is_feed()) {
      if($episodeSponsor !== '') {
        $content = "<p>".$excerpt."</p>".$content.$sponsorPretext.$episodeSponsor;
      }
      else {
        $content = "<p>".$excerpt."</p>".$content;
      }
    }
return $content;
}
add_filter('the_content', 'babblenut_postrss');

// Adding Episode Number to Title

function babblenut_titlerss ($content) {
  global $wp_query;
  $episodeNumber = get_field('episode_number');
  if(is_feed()) {
    $content = "#".$episodeNumber.": ".$content;
  }
  return $content;
}
add_filter('the_title_rss', 'babblenut_titlerss');

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
    $wp_admin_bar->add_menu( array(
        'parent' => false,
        'id' => 'live-stream-admin-menu',
        'title' => __('Live Stream'),
        'href' => admin_url( 'admin.php?page=acf-options-live-stream-options')
    ) );
    $wp_admin_bar->add_menu( array(
        'parent' => 'live-stream-admin-menu',
        'id' => 'live_stream_page',
        'title' => __('Live Page'),
        'href' => ('/live')
    ) );
}
// and we hook our function via
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


/*

Episode Meta Fields 
-----------------------------------------------------------

*/

// Options Page 

include_once( 'add-ons/acf-options-page/acf-options-page.php' );


// Registering Live Stream Options Page
register_options_page('Live Stream Options');

/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_episode-meta-info',
    'title' => 'Episode Meta Info',
    'fields' => array (
      array (
        'key' => 'field_51f5fdc23d3f2',
        'label' => 'Episode Lead',
        'name' => 'episode_lead',
        'type' => 'textarea',
        'default_value' => '',
        'formatting' => 'none',
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
  register_field_group(array (
    'id' => 'acf_live-stream',
    'title' => 'Live Stream',
    'fields' => array (
      array (
        'key' => 'field_51f6e6f18c0ff',
        'label' => 'Live Episode Number',
        'name' => 'live_episode_number',
        'type' => 'number',
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_51f6e6c18c0fe',
              'operator' => '==',
              'value' => '1',
            ),
          ),
          'allorany' => 'all',
        ),
        'default_value' => '',
        'min' => '',
        'max' => '',
        'step' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-live-stream-options',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
