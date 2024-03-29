<?php

// namespace ##
namespace q\editor\core;

// piggyback Q helper ##
use q\core\helper as q_helper;

/**
 * declare class
 */
class helper extends \q_gutenberg_editor {


    /**
    * check if a file exists with environmental fallback
    * first check the active theme ( pulling info from "device-theme-switcher" ), then the plugin
    *
    * @param    $include        string      Include file with path ( from library/  ) to include. i.e. - templates/loop-nothing.php
    * @param    $return         string      return method ( echo, return, require )
    * @param    $type           string      type of return string ( url, path )
    * @param    $path           string      path prefix
    * 
    * @since 0.1
    */
    public static function get( $include = null, $return = 'echo', $type = 'url', $path = "library/" )
    {

        // use Q helper, but pass class name for plugin URL and PATH tests ##
        return q_helper::get( $include, $return, $type, $path, get_parent_class() );

    }



    /**
     * Write to WP Error Log
     *
     * @since       1.5.0
     * @return      void
     */
    public static function log( $log )
    {

        return q_helper::log( $log );

    }




}