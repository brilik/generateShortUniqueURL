<?php
require_once '../options.php';
require_once DIR_BACK . '/class/Debug.php';
require_once DIR_BACK . '/class/DataBase.php';
require_once DIR_BACK . '/class/Url.php';
require_once DIR_BACK .'/functions.php';

$_POST = json_decode($_POST['obj']);
$db = new DataBase(DB_NAME, DB_HOST, DB_USER, DB_PASS);
$url = new Url();

if ($_POST->action == 'singup') {
    $output['res'] = $_POST->action;
    if($existLogin = is_exist_login($db, $_POST->login)){
        $output['res'] = 'error';
        $output['exist'] = $existLogin;
    }
    if ($login = is_login_true($_POST->login)) {
        $output['res'] = 'error';
        $output['login'] = $login;
    }
    if ($password = is_pass_match($_POST->password, $_POST->repassword)) {
        $output['res'] = 'error';
        $output['password'] = $password;
    }
    if ($output['res'] === $_POST->action) {
        setcookie("login", $_POST->login, time()+3600, "/","", 0);
        $db->query("INSERT INTO users (login, password) VALUE ('{$_POST->login}','{$_POST->password}')");
    }

    die(json_encode($output));
}
if ($_POST->action == 'singin') {
    $output['res'] = $_POST->action;
    if($existLogin = is_exist_login($db, $_POST->login, true)){
        $output['res'] = 'error';
        $output['exist'] = $existLogin;
    }
    if ($password = pass_apply_login($_POST->login, $_POST->password, $db)) {
        $output['res'] = 'error';
        $output['password'] = $password;
    }
    if($output['res'] === $_POST->action){
        setcookie("signin", true, time()+3600, "/","", 0);
    }
    die(json_encode($output));
}


// ********************* GOOOOD
//die(json_encode(['error'=>'END']));
if (!isset($_POST->url) || empty($_POST->url)) {
    die(json_encode(['result' => 'Your need enter URL']));
}


/// *********************************************************


$res = '';
$__post = array_map('htmlspecialchars', $_POST);

// Check existence URL in database
if ($res = $db->is_existence($__post['url'], 'url')) {
    die (json_encode($_SERVER['HTTP_ORIGIN']. '/' . $res[0]['token']));
}

// create token
$__post['token'] = $url->get_token(6);

newToken:
// Check existence token in database
if ($db->is_existence($__post['token'], 'token')) {
    $__post['token'] = $url->get_token(6);
    goto newToken;
}

// Insert token and URL to database
$db->query("INSERT INTO uniq_url (token, url) VALUE ('{$__post['token']}', '{$__post['url']}')");
$db->close();

// Show in front
exit(json_encode($_SERVER['HTTP_ORIGIN'] . '/' . $__post['token']));