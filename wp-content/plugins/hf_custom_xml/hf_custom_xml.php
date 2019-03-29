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
    $xmlArray = json_decode($xmlJson,true);
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

add_action('wp_ajax_getflats', 'getFlatsForAjax');
add_action('wp_ajax_nopriv_getflats', 'getFlatsForAjax');

add_action('wp_ajax_getimagesbyflat', 'getImagesByFlatId');
add_action('wp_ajax_nopriv_getimagesbyflat', 'getImagesByFlatId');

function getFlatsForAjax() {
    echo json_encode(getOnlyFlats());
    wp_die();
}

function getImagesByFlatId() {
    $flat_id = $_GET['flat_id'];
    $imagesByFlatId = [];
    foreach (getFlatById($flat_id)['Images']['Image'] as $img) {
        array_push($imagesByFlatId, $img['@attributes']['url']);
    }
    echo json_encode($imagesByFlatId);
    wp_die();
}

//function setNewFlats(): void {
//    $file1 = XML_FILE_DIR . 'hfxml.xml';
//    $xml1 = simplexml_load_file($file1, null, LIBXML_NOCDATA);
//    $xmlJson1 = json_encode($xml1);
//    $xmlArray1 = json_decode($xmlJson1,true)['Ad'];
//
//    $file2 = XML_FILE_DIR . 'hfxml2.xml';
//    $xml2 = simplexml_load_file($file2, null, LIBXML_NOCDATA);
//    $xmlJson2 = json_encode($xml2);
//    $xmlArray2 = json_decode($xmlJson2,true)['Ad'];
//
//    foreach ($xmlArray1 as $val1) {
//        foreach ($xmlArray2 as $key2 => $val2) {
//            if ($val1['Id'] === $val2['Id']) {
//                unset($xmlArray2[$key2]);
//            }
//        }
//    }
//
//    if ($xmlArray2) {
//        writeNewFlatsToFile($xmlArray2);
//    }
//}
//
//function writeNewFlatsToFile($data): void {
//    $fd = fopen(XML_FILE_DIR . 'new_flats.txt', 'w');
//    $str = json_encode($data);
//    fwrite($fd, $str);
//    fclose($fd);
//}
//
//function getNewFlats() {
//    $str = file_get_contents(XML_FILE_DIR . 'new_flats.txt');
//    return json_decode($str, true);
//}

function getLasTwelveFlats() {
    $file = XML_FILE_DIR . '/hfxml.xml';
    $xml = simplexml_load_file($file, null, LIBXML_NOCDATA);
    $xmlJson = json_encode($xml);
    $xmlArray = json_decode($xmlJson,true)['Ad'];
    $result = array_slice($xmlArray, -12, 12);
    return array_reverse($result);
}