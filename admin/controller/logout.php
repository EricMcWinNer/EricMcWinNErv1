<?php
require('../../Functions/mainfunction.php');
  session_save_path('../../Functions');
  session_start();
if (isset($_SESSION['me'])) {
    unset($_SESSION['me']);
    if (isset($_COOKIE["mee"])) {
        setcookie("mee", "value", time() - 90, "/");
    }
    redirect('../index.php');
} elseif (isset($_COOKIE["mee"])) {
    setcookie("mee", "value", time() - 90, "/");
    redirect('../index.php');
} else {
    echo 'No one was logged in';
    redirect('../index.php');
}
