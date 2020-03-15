<?php

class Debug
{
    /**
     * Show debug print_r.
     *
     * @param array $data
     */
    public static function pr($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'print_r');

        } catch ( Exception $e ) {
            echo "Error debug: " . $e->getMessage();
        }
    }

    /**
     * Show debug print_r hidden (show comment html response).
     *
     * @param array $data
     */
    public static function prh($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'print_r', true);

        } catch ( Exception $e ) {
            echo "Error debug: " . $e->getMessage();
        }
    }

    /**
     * Show debug var_dump and die.
     *
     * @param array $data
     */
    public static function dd($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'var_dump', false, true);

        } catch ( Exception $e ) {
            echo "Error debug: " . $e->getMessage();
        }
    }

    /**
     * Show debug var_export.
     *
     * @param array $data
     */
    public static function ve($data = [])
    {
        try {
            if (empty($data)) {
                throw new Exception('Need entered arguments for debugging.');
            }

            self::show($data, 'var_export', false, true);

        } catch ( Exception $e ) {
            echo "Error debug: " . $e->getMessage();
        }
    }

    /**
     * Show debug in json format. (Recommend for ajax)
     *
     * @param $toObject
     */
    public static function jsn($toObject)
    {
        if(empty($toObject))
            $toObject = false;
        self::show($toObject, 'json');
    }

    /**
     * Show result debug.
     *
     * @param        $data
     * @param string $func
     * @param bool   $hiddent
     * @param bool   $die
     */
    private static function show($data, $func = 'print_r', $hiddent = false, $die = false)
    {
        if ($hiddent === true) {
            echo '<!--';
        }


        switch ($func) {
            case 'print_r':
                echo '<pre style="color:darkred">Hello<br>';
                print_r($data);
                echo '</pre>';
                break;
            case 'var_export':
                echo '<pre style="color:darkred">Hello<br>';
                var_export($data);
                echo '</pre>';
                break;
            case 'var_dump':
                echo '<pre style="color:darkred">Hello<br>';
                var_dump($data);
                echo '</pre>';
                if ($die === true) {
                    die;
                }
                break;
            case 'json':
                exit(json_encode($data));
                break;
            default:
                print_r($data);
                break;
        }

        if ($hiddent === true) {
            echo '-->';
        }
    }

    /**
     * Debug 500 errors.
     */
    public static function server_error(){
        register_shutdown_function(function(){
            if (error_get_last()) {
                echo '<pre style="color:darkred">Hello<br>';
                var_export(error_get_last());
                echo '</pre>';
            }
        });
    }
}