<?php

class Debug
{
    public static function pr($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'print_r');

        } catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function prh($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'print_r', true);

        } catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function dd($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'var_dump', false, true);

        } catch ( Exception $e ) {
            echo "Error: " . $e->getMessage();
        }
    }

    private static function show($data, $func = 'print_r', $hiddent = false, $die = false)
    {
        if ($hiddent === true) {
            echo '<!--';
        }

        echo '<pre style="color:darkred">Hello<br>';

        switch ($func) {
            case 'print_r':
                print_r($data);
                break;
            case 'var_dump':
                var_dump($data);
                if ($die === true) {
                    die;
                }
                break;
        }

        echo '</pre>';

        if ($hiddent === true) {
            echo '-->';
        }
    }
}