<?php
  session_save_path('../../Functions');
  session_start();
require_once('../../Functions/mainfunction.php');
require_once('../../Model/me.php');
require_once('../../Model/database.php');
require_once('../../Model/cookie.php');
if (isset($_SESSION['me'])) {
    redirect('../index.php');
} elseif (isset($_COOKIE['mee'])) {
    redirect('../index.php');
} else {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $password = $stay = '';
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $stay = htmlspecialchars($_POST['stay']);
        if (preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $username)) {
            redirect('../login.php?err=3');
        }else {
           
            try {
                $me = Database::logmein($username, $password);
                if ($me == null) {
                    redirect('../login.php?err=0');
                } else {
                    if ($stay == "I will remain signed in") {
                        echo $stay.'<br />';
                        $cookie__me = serialize($me);
                        $cookie = new Cookie("mee", $cookie__me, 30);
                        $cookie->encryptcookie($crypt__key, $crypt__IV, $ssl__key, $ssl__IV);
                        $_SESSION['me'] = $cookie__me;
                        redirect('../index.php');
                    }else{
                      $_SESSION['me'] = serialize($me);
                      redirect('../index.php');
                    }
                    
                }
            } catch (Exception $ex) {
                if (GATEWAY == "LOCAL") {
                    exit('Error:'.$ex->getMessage());
                } else {
                    redirect('../login.php?err=1');
                }
            }
        }
    } else {
        redirect('../login.php?err=2');
    }
}
