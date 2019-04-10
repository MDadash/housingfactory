<?php
/**
 * Plugin Name: hf_custom_xml
 * Description: xml plugin for housingfactory
 * Version:     1.0.0
 * Author:      Me
 */

define('XML_FILE_DIR', plugin_dir_path(__FILE__));

//add_action('wp_ajax_nopriv_loadfile', 'writeNewFlatsToFile');

function writeNewFlatsToFile(): void {
    $fd = fopen(XML_FILE_DIR . 'all_flats.xml', 'w');
    $str = simplexml_load_file('https://export.lotinfo.ru/c8be8a2c3b0cdb73df3c599ebc0d3540', null, LIBXML_NOCDATA);
    fwrite($fd, json_encode($str));
    fclose($fd);
}

function getAllXml() {
    $str = file_get_contents(XML_FILE_DIR . 'all_flats.xml');
    return json_decode($str, true)['Ad'];

}

function getFlatById($flat_id) {
    $flat = getAllXml()[array_search($flat_id, array_column(getAllXml(), 'Id'))];
    return $flat;
}

function getNearestFlats($flat_id) {
    $nearestFlats = [];
    $allFlats = getAllXml();
    $flat = getFlatById($flat_id);
    $flatDistrict = $flat['District'];
    $flatRooms = $flat['Rooms'];
    $flatFloors = $flat['Floors'];
    $flatId = $flat['Id'];

    foreach ($allFlats as $key => $val) {
        if ($val['District'] === $flatDistrict && $val['Rooms'] === $flatRooms && $val['Floors'] === $flatFloors && $val['Id'] != $flatId) {
            array_push($nearestFlats, $val);
        }
    }

    return $nearestFlats;
}

function getOnlyFlats() {
    $onlyFlats = [];
    $xmlArray = getAllXml();
    $keysF = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'Category')),'Квартиры');
    foreach ($keysF as $key) {
        array_push($onlyFlats, $xmlArray[$key]);
    }
    $keysR = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'Category')),'Комнаты');
    foreach ($keysR as $key) {
        array_push($onlyFlats, $xmlArray[$key]);
    }
    return $onlyFlats;
}

function getOnlyHouses() {
    $onlyHouses = [];
    $xmlArray = getAllXml();
    $keysH = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'Category')),'Дома, дачи, коттеджи');
    foreach ($keysH as $key) {
        array_push($onlyHouses, $xmlArray[$key]);
    }
    return $onlyHouses;
}

add_action('wp_ajax_getflats', 'getFlatsForAjax');
add_action('wp_ajax_nopriv_getflats', 'getFlatsForAjax');

add_action('wp_ajax_gethouses', 'getHousesForAjax');
add_action('wp_ajax_nopriv_gethouses', 'getHousesForAjax');

add_action('wp_ajax_getimagesbyflat', 'getImagesByFlatId');
add_action('wp_ajax_nopriv_getimagesbyflat', 'getImagesByFlatId');

function getFlatsForAjax() {
    echo json_encode(getOnlyFlats());
    wp_die();
}

function getHousesForAjax() {
    echo json_encode(getOnlyHouses());
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
    $result = array_slice(getAllXml(), -12, 12);
    return array_reverse($result);
}


add_action( 'wp_enqueue_scripts', 'my_ajax_data', 99 );
function my_ajax_data(){

    wp_enqueue_script('category', plugins_url('category.js', __FILE__), ['jquery']);
    wp_enqueue_script('scripts', plugins_url('scripts.js', __FILE__), ['jquery']);

    wp_localize_script( 'category', 'my_ajax',
        array(
            'ajaxurl' => admin_url('admin-ajax.php')
        )
    );

}