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
    $xml = simplexml_load_file($file, null, LIBXML_NOCDATA);
    $xmlJson = json_encode($xml);
    $xmlArray = json_decode($xmlJson,TRUE);
    return $xmlArray['Ad'];
}

function getFlatById($flat_id) {
    $flat = getAllXml()[array_search($flat_id, array_column(getAllXml(), 'Id'))];
    return $flat;
}

function getOnlyFlats() {
    $onlyFlats = [];
    $xmlArray = getAllXml();
    $keys = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'Category')),'Квартиры');
    foreach ($keys as $key) {
        array_push($onlyFlats, $xmlArray[$key]);
    }
    return $onlyFlats;
}