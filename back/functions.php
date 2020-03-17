<?php
if ( ! function_exists('the_block')) {
    function the_block(string $pathToFile, $args = [])
    {
        try {

            if ($pathToFile == '') {
                throw new Exception('Path to file is empty.');
            }
            $pathToFile = str_replace('__', '/', $pathToFile);
            $front      = '';
            if (strstr($pathToFile, 'adminka') === false) {
                $front = 'themes/';
            }
            $pathToFile = DIR_VIEW . "/{$front}{$pathToFile}.php";
            if ( ! file_exists($pathToFile)) {
                throw new Exception('Path to file not correctly or file not exists.');
            }
            require $pathToFile;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
if ( ! function_exists('get_template_directory_uri')) {
    function get_template_directory_uri()
    {
        $path = str_replace(APP, '', DIR_VIEW);

        return $_SERVER['HTTP_ORIGIN'] . $path . '/themes';
    }
}
if ( ! function_exists('admin_url')) {
    function admin_url()
    {
        $path = str_replace(APP, '', DIR_ADMIN);

        return $_SERVER['HTTP_ORIGIN'] . $path;
    }
}
if ( ! function_exists('is_user_logged_in')) {
    function is_user_logged_in($show = false)
    {
        if ($show && isset($_COOKIE['login'])) {
            echo $_COOKIE['login'];

            return true;
        }

        return isset($_COOKIE['signin']) ?? false;
    }
}
if ( ! function_exists('is_login_true')) {
    function is_login_true($login)
    {
        if (empty($login)) {
            return 'Login must not empty';
        }
        $loginLength = strlen($login);
        if ($loginLength < 3 || $loginLength > 15) {
            return 'Login length must be [3:15]';
        }

        return null;
    }
}
if ( ! function_exists('is_pass_true')) {
    function pass_apply_login($login, $pass, $db)
    {
        if (empty($pass)) {
            return 'Password must not empty';
        }
        if (empty($login)) {
            return 'Login must not empty';
        }
        if ( ! $db->query("SELECT login, password FROM users WHERE login = '{$login}' AND password = '{$pass}' LIMIT 1")) {
            return 'Login or password incorrect';
        }

        return null;
    }
}
if ( ! function_exists('is_pass_true')) {
    function is_pass_match($pass, $repass)
    {
        if (empty($pass)) {
            return 'Password must not empty';
        }
        $loginLength = strlen($pass);
        if ($loginLength < 6 || $loginLength > 16) {
            return 'Password length must be [6:16]';
        }
        if ($pass !== $repass) {
            return 'Passwords not match';
        }

        return null;
    }
}
if ( ! function_exists('is_exist_login')) {
    function is_exist_login($db, $login, $signin = false)
    {
        if ($signin && empty($login)) {
            return 'Login must not empty';
        }
        if ($signin && ! $db->query("SELECT login FROM users WHERE login = '{$login}' LIMIT 1")[0]['login']) {
            return 'Your not register';
        }
        if ( ! $signin && $db->query("SELECT login FROM users WHERE login = '{$login}' LIMIT 1")[0]['login']) {
            return 'Login already exist';
        }

        return null;
    }
}
if ( ! function_exists('is_valid_url()')) {
    function is_valid_url($url)
    {
        if (empty($url)) {
            return 'URL must not empty';
        }
        if (stripos($url, 'http') === false || stripos($url, '://') === false || stripos($url, '.') === false) {
            return 'Enter correct URL';
        }

        return null;
    }
}
if ( ! function_exists('is_exist_url')) {
    function is_exist_url($db, $url)
    {
        if ($res = $db->is_existence($url, 'url')) {
            return ($_SERVER['HTTP_ORIGIN'] . '/' . $res[0]['token']);
        }

        return null;
    }
}
if ( ! function_exists('get_short_url')) {
    function get_short_url($db, $url, $urlToken)
    {
        $lengthToken = 6;
        $url         = htmlspecialchars($url);
        $output      = [];
        // Check existence URL in database
        if ($res = $db->is_existence($url, 'url')) {
            $output['url'] = ($_SERVER['HTTP_ORIGIN'] . '/' . $res[0]['token']);
        }
        // create token
        $token = $urlToken->get_token($lengthToken);

        return $output['url'] . '/' . $token;
        newToken:
        // Check existence token in database
        if ($token = $db->is_existence($token, 'token')) {
            $output['url'] = $token;
            goto newToken;
        }

        return $output;
        // Insert token and URL to database
        $db->query("INSERT INTO uniq_url (token, url) VALUE ('{$token}', '{$url}')");
        $db->close();
        // Show in front
        $output['url'] = $_SERVER['HTTP_ORIGIN'] . '/' . $token;

        return $output;
    }
}