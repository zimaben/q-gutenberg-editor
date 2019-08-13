<?php

namespace q\editor\admin;
use q\editor\core\core as core;
use q\editor\core\helper as helper;
use q\editor\core\acf as acf;

// load it up ##
\q\editor\admin\admin::run();
class admin extends \q_gutenberg_editor {
    public static function run()
    {
        #global $pagenow;
        if ( \is_admin() ) {
            //GLOBAL EDITOR SETUP
            \add_action( 'plugins_loaded', array( get_class(), 'setup_the_editor' ));
            \add_action( 'after_setup_theme', array( get_class(),'q_editor_styles' ), 10, 10); //new functions
            \add_action( 'enqueue_block_editor_assets', array( get_class(),'q_editor_scripts' ), 10, 10); 

            // BLOCK LEVEL SETUP (via ACF) // GO TO CONFIG
        
            if( acf::check_acf() ){
            
            \add_filter( 'block_categories', array( get_class(), 'greenheart_block_category'), 10, 2);  //LAST PRIORITY           
            #\add_action('acf/init', array( get_class(), 'acf_register_block_types' ));
            \load_template( self::get_plugin_path( 'library/common/fields.php' ) );

            } else 
                {  
                if( self::$debug ) helper::log( 'ACF is required to run Gutenberg Blocks, install required plugin.' );
                }

           
            
        }            
    }
    public static function greenheart_block_category( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'greenheart-blocks',
                    'title' => __( 'Greenheart Blocks', 'greenheart-blocks' ),
                    'icon' => 'heart',
                ),
            )
        );
    }

    public static function setup_the_editor() {// GUTENBERG EDITOR CONFIGURATION
            
            // PART 1: DETERMINE WHICH POST TYPES THE EDITOR WILL RUN ON 
  
            if( self::gb_post_types ){

                \add_filter( 'register_post_type_args', array( get_class(),'filter_the_post_types'), 10, 2 );       

            }

        }
    public static function filter_the_post_types($args, $post_type){ //FUNCTION TO DYNAMICALLY ADD WP SUPPORT FOR BLOCK EDITOR TO POST TYPE
            
        if( is_array( self::gb_post_types ) )
        {

            foreach ( self::gb_post_types as $cpt ) 
            {
                if($post_type == $cpt)
                {
                    $args['show_in_rest']          = true;
                    $args['rest_base']             = $cpt;
                    $args['rest_controller_class'] = 'WP_REST_Posts_Controller';

                    if( isset( $args['supports'] ) && $args['supports'] )
                    {   
                        array_push($args['supports'], 'editor');


                    } else {

                    $args['supports'] = array('editor');

                    } 
                #error_log('Gutenberg Editor custom enabled for post type '.$cpt );
                return $args;
                
                }
                
            }
        
        } else { /* ERROR LOGGING FOR NO CPTs ENABLED IF NECESSARY */ }
    
    return $args;
    }

    public static function q_editor_styles() {
    // Add support for editor styles. Add Editor CSS, Add Editor JS to blacklist certain Block Types
        \add_theme_support( 'editor-styles' );

        \add_editor_style( self::get_plugin_url('library/admin/css/q-editor.css') );
    }

    public static function q_editor_scripts(){
    // Add JS needed globally for the editor. For now we are currently filtering allowed Blocktypes
    // This is from the codex: https://developer.wordpress.org/block-editor/developers/filters/block-filters/#using-a-blacklist
        $screen = json_decode(json_encode( get_current_screen() ), true);
        $jsdebug = self::$debug;

        \wp_register_script( 'q-blacklist-blocks', self::get_plugin_url( 'library/admin/js/q-editor.js') );
        \wp_localize_script( 'q-blacklist-blocks', 'screen', $screen );
        \wp_localize_script( 'q-blacklist-blocks', 'debug', $jsdebug );
        \wp_enqueue_script( 'q-blacklist-blocks', self::get_plugin_url( 'library/admin/js/q-editor.js'), array( 'jquery','wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-element' ), filemtime( self::get_plugin_path( 'library/admin/js/q-editor.js') ), true );

    }

}
?>
