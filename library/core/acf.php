<?php

namespace q\editor\core;

use q\editor\core\helper as helper;
use q\editor\common\render as render;
use q\editor\core\acf as acf;

// load it up ##
\q\editor\core\acf::run();

class acf extends \q_gutenberg_editor {

    public static function run()
    {    
        if( self::check_acf() ){
    	// load libraries ##
        self::load_libraries();
        \add_action('acf/init', array( get_class(), 'acf_register_block_types' ));
        }

    }
    public static function check_acf() {
        return function_exists('acf_add_local_field_group');
    }

    public static function load_libraries() {
        //load ACF
        require_once self::get_plugin_path( 'library/common/fields.php' );
        require_once self::get_plugin_path( 'library/common/render.php');
    }

    public static function acf_register_block_types(){

        \acf_register_block_type(array(
            'name'   => 'bs_accordion',
            'title'  => __('Accordion Panels'),
            'description'  => __('Expandable content that is hidden underneath an accordion header.'),
            'render_callback' => array( render::render_class(), 'content_accordion'),
            'category'  => 'greenheart-blocks',
            'mode'      => 'preview',
            'icon'      => 'editor-paste-text',
            'enqueue_assets'    => function(){ //FOR PRODUCTION THIS SHOULD OBVIOUSLY BE FIGURED OUT BETTER
                    \wp_enqueue_style ('bootstrap-css', self::get_plugin_url( 'library/common/css/bootstrap.min.css'), array(), '4,2');
                    \wp_enqueue_style ('bootstrap-grid-css', self::get_plugin_url( 'library/common/css/bootstrap-grid.min.css'), array('bootstrap-css'), '4,2');
                    \wp_enqueue_style( 'bootstrap_accordion_css', self::get_plugin_url( 'library/common/css/bootstrap_accordion.css' ), array('bootstrap-css', 'bootstrap-grid-css'), '0.1' );
                    \wp_enqueue_script ('bootstrap-js', self::get_plugin_url( 'library/common/js/bootstrap.min.js'), array('jquery'), '4.2', true );
                    \wp_enqueue_script( 'bootstrap-bundle-js', self::get_plugin_url('library/common/js/bootstrap.bundle.min.js'), array('jquery','bootstrap-js'), '4.2', true);
                    \wp_enqueue_script( 'bootstrap_accordion_js', self::get_plugin_url( 'library/common/js/bootstrap_accordion.js' ), array('jquery', 'bootstrap-js', 'bootstrap-bundle-js'), '0.1', true );
                  },
            'keywords'  => array( 'accordion', 'bootstrap')
        ));

        \acf_register_block_type(array(
            'name'   => 'bs_card',
            'title'  => __('Linked Cards'),
            'description'  => __('Image cards with title and text that feature a linked page.'),
            'render_callback' => array( render::render_class(), 'linked_cards'), 
            'category'  => 'greenheart-blocks',
            'mode'      => 'preview',
            'icon'      => 'format-image',
            'enqueue_assets'    => function(){ //FOR PRODUCTION THIS SHOULD OBVIOUSLY BE FIGURED OUT BETTER
                    \wp_enqueue_style ('bootstrap-css', self::get_plugin_url( 'library/common/css/bootstrap.min.css'), array(), '4,2');
                    \wp_enqueue_style ('bootstrap-grid-css', self::get_plugin_url( 'library/common/bootstrap-grid.min.css'), array('bootstrap-css'), '4,2');
                    \wp_enqueue_style( 'bootstrap_link_card_css', self::get_plugin_url( 'library/common/css/bootstrap_link_card.css' ), array('bootstrap-css', 'bootstrap-grid-css'), '0.1' );

                  },
            'keywords'  => array( 'cards', 'bootstrap')
        ));


    }


}