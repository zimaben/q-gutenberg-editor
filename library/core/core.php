<?php

namespace q\editor\core;

use q\editor\core\core as core;
use q\editor\core\helper as helper;
use q\editor\core\acf as acf;
  //ACF must be integrated to the core as it's the pathway to register and render blocks


// use q\core\helper as q_helper;

// load it up ##
\q\editor\core\core::run();

class core extends \q_gutenberg_editor {

    public static function run()
    {
        if ( acf::check_acf() ){
            if( !\is_admin() ){ //still need the block category on the front end
                \add_filter( 'block_categories', array( get_class(), 'greenheart_block_category'), 10, 2); 
            }   

        } else {
            helper::log( 'Dependency Error - Advanced Custom Fields classes necessary for Q Gutenberg Editor to run.' );
            return false;
        }

    }

    /*
    * Set Greenheart Blocks Category for both front and back-end
    */
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

}