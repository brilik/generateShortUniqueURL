<?php
if (!function_exists('the_block')) {
    function the_block(string $pathToFile, $args = [])
    {
        try {

            if ($pathToFile == '') {
                throw new Exception('Path to file is empty.');
            }
            $pathToFile = str_replace('__', '/', $pathToFile);
            $front = '';
            if (strstr($pathToFile, 'adminka') === false) {
                $front = 'themes/';
            }
            $pathToFile = DIR_VIEW . "/{$front}{$pathToFile}.php";
            if (!file_exists($pathToFile)) {
                throw new Exception('Path to file not correctly or file not exists.');
            }
            require $pathToFile;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
if (!function_exists('get_template_directory_uri')) {
    function get_template_directory_uri()
    {
        $path = str_replace(APP, '', DIR_VIEW);
        return $_SERVER['HTTP_ORIGIN'] . $path . '/themes';
    }
}
if(!function_exists('admin_url')){
    function admin_url(){
        $path = str_replace(APP, '', DIR_ADMIN);
        return $_SERVER['HTTP_ORIGIN'] . $path;
    }
}
if(!function_exists('is_user_logged_in')) {
    function is_user_logged_in()
    {
        return isset($_COOKIE['user_logged']) ?? false;
    }
}