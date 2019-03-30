<?php

function writeNewFlatsToFile(): void {
    $fd = fopen(XML_FILE_DIR . 'all_flats.xml', 'w');
    $str = simplexml_load_file('https://export.lotinfo.ru/c8be8a2c3b0cdb73df3c599ebc0d3540', null, LIBXML_NOCDATA);
    fwrite($fd, json_encode($str));
    fclose($fd);
}