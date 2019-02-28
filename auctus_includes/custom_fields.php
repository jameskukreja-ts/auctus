<?php
    if (!class_exists('myCustomFields') ) {
 
        class myCustomFields {
            /**
            * @var  string  $prefix  The prefix for storing custom fields in the postmeta table
            */
            var $prefix = '_mcf_';
            /**
            * @var  array  $postTypes  An array of public custom post types, plus the standard "post" and "page" - add the custom types you want to include here
            */

            var $auctusCustomTypes = [];

            // var $postTypes = ["page", "post"]; // Add if custom fields are required for posts or pages
            var $postTypes = [];

            /**
            * @var  array  $customFields  Defines the custom fields available
            */
            var $customFields = array(
                array(
                    "name"          => "block-of-text",
                    "title"         => "A block of text",
                    "description"   => "",
                    "type"          => "textarea",
                    "scope"         =>   array(),
                    "capability"    => "edit_posts"
                ),
                array(
                    "name"          => "short-text",
                    "title"         => "A short bit of text",
                    "description"   => "",
                    "type"          =>   "text",
                    "scope"         =>   array(),
                    "capability"    => "edit_posts"
                ),
                array(
                    "name"          => "checkbox",
                    "title"         => "Checkbox",
                    "description"   => "",
                    "type"          => "checkbox",
                    "scope"         =>   array(),
                    "capability"    => "manage_options"
                )
            );

            function processPostTypes(){
              foreach($this->auctusCustomTypes as $customType){
                if(!empty($customType['custom_fields'])){
                  $this->postTypes[] = $customType['register_as'];

                  foreach($customType['custom_fields'] as $fieldName => $fieldInfo){
                    $found = 0;
                    foreach($this->customFields as $key => $customField){
                      if($fieldName === $customField['name'] && $fieldInfo['type'] === $customField['type']){
                        $this->customFields[$key]['scope'][] = $customType['register_as'];
                        $found = 1;
                        break;
                      }
                    }

                    if($found){
                      continue;
                    }

                    $this->customFields[] = [
                      'name' => $fieldName,
                      'title' => ucwords($fieldName),
                      'description' => "",
                      'type' => $fieldInfo['type'],
                      'scope' => [$customType['register_as']],
                      "capability" => "edit_posts"
                    ];
                  }
                }
              }
            }
            /**
            * PHP 4 Compatible Constructor
            */
            function myCustomFields() { $this->__construct(); }
            /**
            * PHP 5 Constructor
            */
            function __construct() {
                $this->auctusCustomTypes = getAuctusPostTypes();
                $this->processPostTypes();
                add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
                add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
                // Comment this line out if you want to keep default custom fields meta box
                add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
            }
            /**
            * Remove the default Custom Fields meta box
            */
            function removeDefaultCustomFields( $type, $context, $post ) {
                foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
                    foreach ( $this->postTypes as $postType ) {
                        remove_meta_box( 'postcustom', $postType, $context );
                    }
                }
            }
            /**
            * Create the new Custom Fields meta box
            */
            function createCustomFields() {
                if ( function_exists( 'add_meta_box' ) ) {
                    foreach ( $this->postTypes as $postType ) {
                        add_meta_box( 'my-custom-fields', 'Custom Fields', array( &$this, 'displayCustomFields' ), $postType, 'normal', 'high' );
                    }
                }
            }
            /**
            * Display the new Custom Fields meta box
            */
            function displayCustomFields() {
                global $post;
                ?>
                <div class="form-wrap">
                    <?php
                    wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
                    foreach ( $this->customFields as $customField ) {
                        // Check scope
                        $scope = $customField[ 'scope' ];
                        $output = false;
                        foreach ( $scope as $scopeItem ) {
                            switch ( $scopeItem ) {
                                default: {
                                    if ( $post->post_type == $scopeItem )
                                        $output = true;
                                    break;
                                }
                            }
                            if ( $output ) break;
                        }
                        // Check capability
                        if ( !current_user_can( $customField['capability'], $post->ID ) )
                            $output = false;
                        // Output if allowed
                        if ( $output ) { ?>
                            <div class="form-field form-required">
                                <?php
                                switch ( $customField[ 'type' ] ) {
                                    case "checkbox": {
                                        // Checkbox
                                        echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
                                        echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
                                        if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
                                            echo ' checked="checked"';
                                        echo '" style="width: auto;" />';
                                        break;
                                    }
                                    case "textarea":
                                    case "wysiwyg": {
                                        // Text area
                                        echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
                                        echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
                                        // WYSIWYG
                                        if ( $customField[ 'type' ] == "wysiwyg" ) { ?>
                                            <script type="text/javascript">
                                                jQuery( document ).ready( function() {
                                                    jQuery( "<?php echo $this->prefix . $customField[ 'name' ]; ?>" ).addClass( "mceEditor" );
                                                    if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
                                                        tinyMCE.execCommand( "mceAddControl", false, "<?php echo $this->prefix . $customField[ 'name' ]; ?>" );
                                                    }
                                                });
                                            </script>
                                        <?php }
                                        break;
                                    }

                                    case "image": {
                                      echo  '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>
                                            <input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" class="meta-image regular-text" value="'. htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) .'">
                                            <input type="button" class="button auctus-image-upload" value="Browse">
                                            <input type="button" class="button auctus-image-remove" value="Remove Image">
                                            <p>
                                            <div class="image-preview"><img src="'. htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) .'" style="max-width: 250px;"></div>
                                            </p>';                                 
                                        
                                        break;
                                    }                                    
                                    default: {
                                        // Plain text field
                                        echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
                                        echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
                                        break;
                                    }
                                }
                                ?>
                                <?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
                            </div>
                        <?php
                        }
                    } ?>
                </div>
                <?php
            }
            /**
            * Save the new Custom Fields values
            */
            function saveCustomFields( $post_id, $post ) {
                if ( !isset( $_POST[ 'my-custom-fields_wpnonce' ] ) || !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
                    return;
                if ( !current_user_can( 'edit_post', $post_id ) )
                    return;
                if ( ! in_array( $post->post_type, $this->postTypes ) )
                    return;
                foreach ( $this->customFields as $customField ) {
                    if ( current_user_can( $customField['capability'], $post_id ) ) {
                        if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
                            $value = $_POST[ $this->prefix . $customField['name'] ];
                            // Auto-paragraphs for any WYSIWYG
                            if ( $customField['type'] == "wysiwyg" ) $value = wpautop( $value );
                            update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $value );
                        } else {
                            delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
                        }
                    }
                }
            }
     
        } // End Class
    } // End if class exists statement
 
    // Instantiate the class
    if (class_exists('myCustomFields') ) {
        $myCustomFields_var = new myCustomFields();
    }
?>

<?php 
function auctus_image_field() {

    wp_enqueue_script(
        'auctus-image-upload',
        get_stylesheet_directory_uri() . '/assets/js/auctus_image_upload.js',
        array( 'jquery' )
    );
    
}
add_action('admin_enqueue_scripts', 'auctus_image_field');

?>