<?php
/**
 * Plugin Name: hf_custom_xml
 * Description: xml plugin for housingfactory
 * Version:     1.0.0
 * Author:      Me
 */

define('XML_FILE_DIR', plugin_dir_path(__FILE__));

add_action('init', 'getAllXml');

function getAllXml() {
    if (is_home() || is_page(7053)){
        $file = XML_FILE_DIR . '/hfxml.xml';
        $xml = simplexml_load_file($file);
        return $xml;
    }
}