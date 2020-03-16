<?php

require('../../Functions/mainfunction.php');
require('../../Model/me.php');
require('../../Model/database.php');
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['level']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['special'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $level = htmlspecialchars($_POST['level']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $confirmedpassword = htmlspecialchars($_POST['confirmpassword']);
    $special = htmlspecialchars($_POST['special']);
    $last_level = substr($level, strlen($level) - 1);
    if(empty($firstname) || empty($lastname) || empty($level) || empty($username) || empty($password) || empty($confirmedpassword) || empty($special)){
        redirect('../register.php?err=2');
    }
    else if(ctype_digit($firstname) || ctype_digit($lastname) || ctype_digit($username)){
        if(ctype_digit($firstname))
            redirect('../register.php?err=4&src=First%20Name');
        else if(ctype_digit($lastname))
            redirect('../register.php?err=4&src=Last%20Name');
        else
            redirect('../register.php?err=4&src=Username');
    }
    else if(!strlen($level) == 4){
        redirect('../register.php?err=6');
    }
    else if(!$last_level == 'L' || $last_level == 'E'){
        redirect('../register.php?err=7');
    }
    else if(preg_match('/[\'";^£$%&*()}.{@/\#~?><>,|=_+¬-]/', $firstname) || preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $lastname) ||preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $username)) {
       if(preg_match('/[\'";^£$%&*()}.{@/\#~?><>,|=_+¬-]/', $firstname))
           redirect('../register.php?err=5&src=First%20Name');
       else if(preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $lastname))
           redirect('../register.php?err=5&src=Last%20Name');
       else
           redirect('../register.php?err=5src=Username');
    }
    else {
        $me = new Me();
        $me->setFirstname($firstname);
        $me->setLastname($lastname);
        $me->setLevel($level);
        $me->setUsername($username);
        if ($password == $confirmedpassword) {
            $truth = false;
            $ericmcwinnerknow = array('Every human breathes in air with their nostrils thinks with their brains and have sex with their genital organs', 'I didn\'t have an esteem, but now I\'ve got a low one. That\'s a large improvement init?', 'I haven\'t had a girlfriend at all since since and that\'t just been the way it is, I hope I get a girlfriend soon', 'I jerked off several times on Friday last week so I don\'t have any of my annoying strong erections when next I code');
            foreach ($ericmcwinnerknow as $knowledge) {
                if ($special == $knowledge) {
                    $truth = true;
                    break;
                }
            }
            if ($truth === true) {
                try {
                    if (Database::registerMe($me, $password)) {
                        setcookie("registered", "registered", time() + (86400 * 30), "/");
                        redirect('../login.php');
                    }
                } catch (Exception $ex) {
                    if (GATEWAY == "LOCAL") {
                        exit('Error:' . $ex->getMessage());
                    } else {
                        exit('Error:An error occured and your message was not sent. Try again later');
                    }
                }
            } else {
                redirect('../register.php?err=3');
            }
        } else {
            redirect('../register.php?err=1');
        }
    }
}
else{
    redirect('../register.php?err=2');
}




