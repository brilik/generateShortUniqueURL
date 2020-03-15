<?php
if (!isset($_POST['url']) || empty($_POST['url'])) {
    die(json_encode(['result' => 'Your need enter URL']));
}

require_once '../options.php';
require_once DIR_BACK . '/class/Debug.php';
require_once DIR_BACK . '/class/DataBase.php';
require_once DIR_BACK . '/class/Url.php';

$res = '';
$__post = array_map('htmlspecialchars', $_POST);
$db = new DataBase(DB_NAME, DB_HOST, DB_USER, DB_PASS);
$url = new Url();

// Check existence URL in database
if ($res = $db->is_existence($__post['url'], 'url')) {
    exit(json_encode($_SERVER['HTTP_ORIGIN'] . '/' . $res['token']));
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

