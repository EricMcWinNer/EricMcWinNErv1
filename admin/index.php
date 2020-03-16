<?php
    session_save_path('../Functions');
    session_start();
    require('../Functions/mainfunction.php');
    require('../Model/database.php');
    require('../Model/cookie.php');
    if (isset($_SESSION['me'])) {
        $parameter = '';
        if (isset($_GET['redirect'])) {
            redirect("{$_GET['redirect']}");
        } else {
            redirect('messages.php');
        }
    } elseif (isset($_COOKIE['mee'])) {
        $_SESSION['me'] = Cookie::decryptcookie($_COOKIE['mee'], $crypt__key, $crypt__IV, $ssl__key, $ssl__IV);
        redirect('messages.php');
    }
    try {
        $test = Database::testMe();
        if ($test == null) {
            redirect('register.php');
        } else {
            redirect('login.php');
        }
    } catch (Exception $ex) {
        if (GATEWAY == "LOCAL") {
            exit('Error:' . $ex->getMessage());
        } else {
            exit('Error:An error occured and your message was not sent. Try again later');
        }
    }
