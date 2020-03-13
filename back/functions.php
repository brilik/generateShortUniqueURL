<?php

function the_block( string $pathToFile, $args = []){
    try{

        if( $pathToFile == '' ){
            throw new Exception('Path to file is empty.');
        }

        $pathToFile = str_replace('%__%', '/', $pathToFile);

        $pathToFile = DIR_VIEW . "/themes/{$pathToFile}.php";

        if( ! file_exists($pathToFile) ){
            throw new Exception('Path to file not correctly or file not exists.');
        }

        require $pathToFile;

    } catch ( Exception $e){
        echo $e->getMessage();
    }
}

function get_template_directory_uri(){
    $path = str_replace(APP, '', DIR_VIEW);
    return $_SERVER['HTTP_ORIGIN'] . $path . '/themes';
}