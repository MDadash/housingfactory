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
    $str = simplexml_load_file('http://topnlab.ru/export/main/database/?data=objects&format=yandex&key=WlqHFLrMa6uYi5Wa4XY=', null, LIBXML_NOCDATA);
    fwrite($fd, json_encode($str));
    fclose($fd);
}

function getAllXml() {
    $str = file_get_contents(XML_FILE_DIR . 'all_flats.xml');
    return json_decode($str, true)['offer'];

}

function getFlatById($flat_id) {
    foreach (getAllXml() as $flat) {
        if ($flat['@attributes']['internal-id'] === $flat_id) {
            return $flat;
        }
    }
    return $flat;
}

function getAllNearestFlats($flat_id) {
    $nearestFlats = [];
    $allFlats = getAllXml();
    $flat = getFlatById($flat_id);
    $flatDistrict = $flat['location']['sub-locality-name'];
    $flatRooms = $flat['rooms'];

    foreach ($allFlats as $key => $val) {
        if ($val['location']['sub-locality-name'] === $flatDistrict && $val['rooms'] === $flatRooms && $val['@attributes']['internal-id'] != $flat_id) {
            array_push($nearestFlats, $val);
        }
    }

    return $nearestFlats;
}

function getNearestFlats($flat_id) {
    return array_slice(getAllNearestFlats($flat_id), 0, 9);
}

function getOnlyFlats() {
    $onlyFlats = [];
    $xmlArray = getAllXml();
    $keysF = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'category-id')),'1');
    foreach ($keysF as $key) {
        array_push($onlyFlats, $xmlArray[$key]);
    }
    $keysR = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'category-id')),'2');
    foreach ($keysR as $key) {
        array_push($onlyFlats, $xmlArray[$key]);
    }
    return $onlyFlats;
}

function getOnlyHouses() {
    $onlyHouses = [];
    $xmlArray = getAllXml();
    $keysH = array_keys(array_combine(array_keys($xmlArray), array_column($xmlArray, 'category-id')),'3');
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

function getFlatForNextButtonByFlatId($flat_id) {
    $currentFlat = getFlatById($flat_id);
    $roomsQuantity = $currentFlat['rooms'];
    $flatDistrict = $currentFlat['location']['sub-locality-name'];
//    $allFlats = getAllNearestFlats($flat_id);
    $allFlats = getAllXml();
    $indexOfCurrentFlat = array_search($currentFlat, $allFlats);
    if (array_key_exists($indexOfCurrentFlat+1, $allFlats)) {
        $firstArrayPartForSearch = array_slice($allFlats, ($indexOfCurrentFlat+1));
        foreach ($firstArrayPartForSearch as $flat) {
            if ($flat['rooms'] === $roomsQuantity && $flat['location']['sub-locality-name'] === $flatDistrict) {
                return $flat['@attributes']['internal-id'];
            }
        }
        $secondArrayPartForSearch = array_splice($allFlats, $indexOfCurrentFlat+1);
        foreach ($secondArrayPartForSearch as $flat) {
            if ($flat['rooms'] === $roomsQuantity && $flat['location']['sub-locality-name'] === $flatDistrict) {
                return $flat['@attributes']['internal-id'];
            }
        }
    }
    foreach ($allFlats as $flat) {
        if ($flat['rooms'] === $roomsQuantity && $flat['location']['sub-locality-name'] === $flatDistrict) {
            return $flat['@attributes']['internal-id'];
        }
    }
    return $flat_id;
}

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
    $imagesByFlatId = getFlatById($flat_id)['image'] ?? [];
    if (is_string($imagesByFlatId)) {
        $imagesByFlatId = [$imagesByFlatId];
    }
    echo json_encode($imagesByFlatId);
    wp_die();
}


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