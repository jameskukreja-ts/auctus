<?php 
/*
* Creating a function to create our CPT
*/

function getAuctusPostTypes(){
  return [

      [
        'name' => 'Core Value',
        'plural_name' => 'Core Values',
        'register_as' => 'core_values',
        'supports' => ['title', 'editor', 'revisions', 'custom-fields'],
        'custom_fields' => ['font_icon' => ['type' => 'image'], 'background_image' => ['type' => 'image'], 'sort_order' => ['type' => 'text']]
      ],
      [
        'name' => 'Teammate',
        'plural_name' => 'Teammates',
        'register_as' => 'teammates',
        'supports' => ['title', 'editor', 'revisions'],
        'custom_fields' => ['designation' => ['type' => 'text'], 'image' => ['type' => 'image']]
      ],
      [
        'name' => 'History',
        'plural_name' => 'History',
        'register_as' => 'history',
        'supports' => ['title', 'editor','revisions'],
        'custom_fields' => []
      ],
      [
        'name' => 'Testimonial',
        'plural_name' => 'Testimonials',
        'register_as' => 'testimonials',
        'supports' => ['title', 'editor', 'revisions'],
        'custom_fields' => []
      ],

    ];
}

function auctus_custom_post_type() {
    
    $auctusPostTypes = getAuctusPostTypes();
    foreach($auctusPostTypes as $postType){

      $labels = array(
          'name'                => _x( $postType['plural_name'] , 'Post Type General Name', 'auctus' ),
          'singular_name'       => _x( $postType['name'], 'Post Type Singular Name', 'auctus' ),
          'menu_name'           => __( $postType['plural_name'] , 'auctus' ),
          'parent_item_colon'   => __( 'Parent Example', 'auctus' ),
          'all_items'           => __( 'All '.$postType['plural_name'] , 'auctus' ),
          'view_item'           => __( 'View '.$postType['name'], 'auctus' ),
          'add_new_item'        => __( 'Add '.$postType['name'], 'auctus' ),
          'add_new'             => __( 'Add '.$postType['name'], 'auctus' ),
          'edit_item'           => __( 'Edit '.$postType['name'], 'auctus' ),
          'update_item'         => __( 'Update '.$postType['name'], 'auctus' ),
          'search_items'        => __( 'Search '.$postType['plural_name'] , 'auctus' ),
          'not_found'           => __( 'Not Found', 'auctus' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'auctus' ),
      );
   
  // Set other options for Custom Post Type
      $args = array(
          'label'               => __( $postType['register_as'], 'auctus' ),
          'description'         => __( 'These are the '.strtolower($postType['plural_name']), 'auctus' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => $postType['supports'],
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => false,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
      );
   
      // Registering your Custom Post Type
      register_post_type($postType['register_as'], $args);
    }



 
}
/* Hook into the 'init' action so that the function
>* Containing our post type registration is not
* unnecessarily executed.
*/
add_action( 'init', 'auctus_custom_post_type', 0);
?>