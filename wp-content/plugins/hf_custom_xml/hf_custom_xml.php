<?php
/**
 * Plugin Name: hf_custom_xml
 * Description: xml plugin for housingfactory
 * Version:     1.0.0
 * Author:      Me
 */

define('XML_FILE_DIR', plugin_dir_path(__FILE__));

function getAllXml() {
    $file = XML_FILE_DIR . '/hfxml.xml';
    $xml = simplexml_load_file($file);
    $xmlJson = json_encode($xml);
    $xmlArray = json_decode($xmlJson,TRUE);
    return $xmlArray['Ad'];
}