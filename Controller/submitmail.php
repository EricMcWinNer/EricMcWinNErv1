<?php
    session_save_path('../Functions');
    session_start();
    require('../Functions/mainfunction.php');
    require('../Model/message.php');
    require('../Model/database.php');
    require('../Model/messenger.php');
    /*
     * todo
     * Write code to access the value returned from a message to check if it indeeds inmcrements the value of the number of messages sent
     */
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    if ((isset($_POST['token'])) || (isset($_POST['salt'])) || (isset($_SESSION['erictoken'])) || (isset($_SESSION['ericimperialtoken']))) {
        $sesstoken = $sessimpetoken = $salt = $token = '';
        if (isset($_SESSION['erictoken'])) {
            $sesstoken = $_SESSION['erictoken'];
        }
        if (isset($_SESSION['ericimperialtoken'])) {
            $sessimpetoken = $_SESSION['ericimperialtoken'];
        }
        if (isset($_POST['salt'])) {
            $salt = $_POST['salt'];
        }
        if (isset($_POST['token'])) {
            $token = $_POST['token'];
        }
        $sesstoken += $salt;
        $sessimpetoken += $salt;
        if ($sesstoken == $token) {
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $number = htmlspecialchars($_POST['number']);
            $messageBody = htmlspecialchars($_POST['message']);
            if ($firstname == "" || $lastname == "" || $email == "" || $number == "" || $messageBody == "") {
                exit('Error:Please fill in all necessary fields');
            } elseif (strlen($firstname) < 2) {
                exit('Error:Please enter a first name with more than 2 characters');
            } elseif (strlen($firstname) > 150) {
                exit('Error:Please enter a first name with less than 150 characters');
            } elseif (strlen($lastname) < 2) {
                exit('Error:Please enter a last name with more than 2 characters');
            } elseif (strlen($lastname) > 150) {
                exit('Error:Please enter a last name with less than 150 characters');
            } elseif (preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $firstname)) {
                exit('Error:Please enter a first name without special characters');
            } elseif (preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $lastname)) {
                exit('Error:Please enter a last name without special characters');
            } elseif (strlen($email) < 5) {
                exit('Error:Please enter an email with more than 5 characters');
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                exit('Error:Please enter a valid email');
            } elseif (preg_match('/[\";^£$%&*()}{#~?><>,|=_+¬-]/', $email)) {
                exit('Error:Please enter a valid email');
            } elseif (strlen($email) > 150) {
                exit('Error:Please enter an email with less than 150 characters');
            } elseif (strlen($number) != 11) {
                exit('Error:Please enter an 11 digit phone number');
            } elseif (!is_numeric($number)) {
                exit('Error:Please enter an 11 digit phone number');
            } elseif (!ctype_digit($number)) {
                exit('Error:Please enter an 11 digit phone number');
            } elseif (strlen($messageBody) < 15) {
                exit('Error:Please enter a message with more than 15 characters');
            } elseif (strlen($messageBody) > 1500) {
                exit('Error:Please enter a message with less than 4000 characters');
            } else {
                /*
                 * Gets info of the user
                 */
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $ipAddress = getRealIpAddr();
                //Creates a messenger Object
                $messenger = new Messenger();
                $messenger->setFirstname($firstname);
                $messenger->setLastname($lastname);
                $messenger->setEmail($email);
                $messenger->setLastBrowserUsed($browser);
                $messenger->setLastIpAddressUsed($ipAddress);

                //Creates a Message object
                $message = new Message();
                $message->setFirstname($firstname);
                $message->setLastname($lastname);
                $message->setEmail($email);
                $message->setPhonenumber($number);
                $message->setMessage($messageBody);
                //HANDLE MESSAGE HERE
                try {
                    if($id = Database::newslettercheck($email)){
                        $message->setUserId($id);
                        if($result = Database::addMessage($message, $messenger)){
                            exit("Success:Message sent successfully");
                        }
                    }
                    else{
                        if(Database::addUser($messenger)){
                            $id = Database::newslettercheck($email);
                            $message->setUserId($id);
                            if(Database::addMessage($message, $messenger)){
                                exit("Success:Message sent successfully");
                            }
                        }
                    }
                } catch (Exception $ex) {
                    if (GATEWAY == "LOCAL") {
                        exit('Error:' . $ex->getMessage());
                    } else {
                        exit('Error:An error occurred and your message was not sent. Try again later');
                    }
                }
            }
        } elseif ($sessimpetoken == $token) {
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $number = htmlspecialchars($_POST['number']);
            $messageBody= htmlspecialchars($_POST['message']);
            if ($firstname == "" || $lastname == "" || $email == "" || $number == "" || $messageBody == "") {
                exit("<h1 style='color:red;font-size:80px;text-align:center;'><b>Nice try hacker!!!</b></h1>");
            } elseif (strlen($firstname) < 2) {
                exit('Error:Please enter a first name with more than 2 characters');
            } elseif (strlen($firstname) > 150) {
                exit('Error:Please enter a first name with less than 150 characters');
            } elseif (strlen($lastname) < 2) {
                exit('Error:Please enter a last name with more than 2 characters');
            } elseif (strlen($lastname) > 150) {
                exit('Error:Please enter a last name with less than 150 characters');
            } elseif (preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $firstname)) {
                exit('Error:Please enter a first name without special characters');
            } elseif (preg_match('/[\'";^£$%&*()}.{@#~?><>,|=_+¬-]/', $lastname)) {
                exit('Error:Please enter a last name without special characters');
            } elseif (strlen($email) < 5) {
                exit('Error:Please enter an email with more than 5 characters');
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                exit('Error:Please enter a valid email');
            } elseif (preg_match('/[\";^£$%&*()}{#~?><>,|=_+¬-]/', $email)) {
                exit('Error:Please enter a valid email');
            } elseif (strlen($email) > 150) {
                exit('Error:Please enter an email with less than 150 characters');
            } elseif (strlen($number) != 11) {
                exit('Error:Please enter an 11 digit phone number');
            } elseif (!is_numeric($number)) {
                exit('Error:Please enter an 11 digit phone number');
            } elseif (!ctype_digit($number)) {
                exit('Error:Please enter an 11 digit phone number');
            } elseif (strlen($messageBody) < 15) {
                exit('Error:Please enter a message with more than 15 characters');
            } elseif (strlen($messageBody) > 1500) {
                exit('Error:Please enter a message with less than 4000 characters');
            } else {
                /*
                 * Gets info of the user
                 */
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $ipAddress = getRealIpAddr();
                //Creates a messenger Object
                $messenger = new Messenger();
                $messenger->setFirstname($firstname);
                $messenger->setLastname($lastname);
                $messenger->setEmail($email);
                $messenger->setLastBrowserUsed($browser);
                $messenger->setLastIpAddressUsed($ipAddress);

                //Creates a Message object
                $message = new Message();
                $message->setFirstname($firstname);
                $message->setLastname($lastname);
                $message->setEmail($email);
                $message->setPhonenumber($number);
                $message->setMessage($messageBody);
                //HANDLE MESSAGE HERE
                try {
                    if($id = Database::newslettercheck($email)){
                        $message->setUserId($id);
                        if($result = Database::addMessage($message, $messenger)){
                            exit("Success:Message sent successfully");
                        }
                    }
                    else{
                        if(Database::addUser($messenger)){
                            $id = Database::newslettercheck($email);
                            $message->setUserId($id);
                            if(Database::addMessage($message, $messenger)){
                                exit("Success:Message sent successfully");
                            }
                        }
                    }
                } catch (Exception $ex) {
                    if (GATEWAY == "LOCAL") {
                        exit('Error:' . $ex->getMessage());
                    } else {
                        exit('Error:An error occurred and your message was not sent. Try again later');
                    }
                }
            }
        } else {
            exit("<h1 style='color:red;font-size:80px;text-align:center;'><b>Nice try Jevison Archibong!!!</b></h1>");
        }
    } else {
        exit("<h1 style='color:red;font-size:80px;text-align:center;'><b>Nice try Jevison Archibong!!!</b></h1>");
    }
