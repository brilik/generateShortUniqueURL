<?php

require_once DIR_BACK . '/class/DataBase.php';

// registration()
// login()
// is_user_logged_in() - check in cookie

// is_user_logged_in()
// false - show form registration
// true  - show page

//setcookie('user_logged', true, time() + 3600);

// check user logged in
if(is_user_logged_in()){
    // db - get user links
    $db = new DataBase(DB_NAME, DB_HOST, DB_USER, DB_PASS);
    $list = $db->query('SELECT * FROM uniq_url');
    the_block('adminka__index', $list);
    $db->close();
    die;
}

header("Location: /");
die;