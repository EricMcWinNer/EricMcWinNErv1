<?php

    /*
     * todo
     * Write the code to add the new messenger object to a registered message
     * Write the code to update the messenger object in the database each time a message is sent
     */

    class Database
    {
        public static function newslettercheck($email)
        {
            $connect = dbcon();
            $query = 'SELECT * FROM `newsletter` WHERE `email` = ?';
            $statement = $connect->prepare($query);
            $statement->bind_param('s', $email);
            if ($statement->execute()) {
                #If statement executed
                $result = $statement->get_result();
                if ($result->num_rows == 1) {
                    #If a result is found
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $id = $row['userid'];
                    $statement->close();
                    $connect->close();
                    return $id;
                } else {
                    #If a result isn't found
                    $statement->close();
                    $connect->close();
                    return false;
                }
            } else {
                #If statement didn't execute
                $statement->close();
                $connect->close();
                throw new Exception('Error:An unexpected error occured. Please try again later');
            }
        }

        public static function addUser($messenger)
        {
            $messenger = new Messenger($messenger);
            $firstName = $messenger->getFirstname();
            $lastName = $messenger->getLastname();
            $email = $messenger->getEmail();
            $lastIPAddressUsed = $messenger->getLastIpAddressUsed();
            $lastBrowserUsed = $messenger->getLastBrowserUsed();
            $timeAdded = time() + (60 * 60);
            $connect = dbcon();
            $query = 'INSERT INTO `newsletter` (`firstname`, `lastname`, `email`, `lastIPAddressUsed`, `lastBrowserUsed`, `timeAdded`) VALUES (?,?,?,?,?,?)';
            $statement = $connect->prepare($query);
            $statement->bind_param('ssssss', $firstName, $lastName, $email, $lastIPAddressUsed, $lastBrowserUsed, $timeAdded);
            if ($statement->execute()) {
                #Check if values were added to table
                $statement->close();
                $connect->close();
                return 1;
            } else {
                $statement->close();
                $connect->close();
                return 0;
            }
        }

        private static function updateMessengerInfo($messenger)
        {
            $messenger = new Messenger($messenger);
            $email = $messenger->getEmail();
            $browser = $messenger->getLastBrowserUsed();
            $lastIPAddressUsed = $messenger->getLastIpAddressUsed();
            $lastTimeSent = $messenger->getTimeLastMessageSent();
            $sql = 'SELECT `messagesSent` AS `messagesSentZ` FROM `newsletter` WHERE `email` = ?';
            $connect = dbcon();
            $stmt = $connect->prepare($sql);
            $stmt->bind_param('s', $email);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows === 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $messages = (int)$row['messagesSentZ'] + 1;
                    $sql = 'UPDATE `newsletter` SET `messagesSent`= ?, `lastBrowserUsed` = ?, `lastIPAddressUsed` = ?, `timelastMessageSent` = ? WHERE `email` = ?';
                    $stmt = $connect->prepare($sql);
                    $stmt->bind_param('issss', $messages, $browser, $lastIPAddressUsed, $lastTimeSent, $email);
                    if ($stmt->execute()) {
                        if ($stmt->affected_rows === 1) {
                            $stmt->close();
                            $connect->close();
                            return true;
                        }
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public static function addMessage($mess, $messenger)
        {
            $mess = new Message($mess);
            $messenger = new Messenger($messenger);
            #Code to add message to database
            $query = 'INSERT INTO `message` (`userid`, `firstname`, `lastname`, `email`, `phonenumber`, `message`, `timesent`) VALUES (?,?,?,?,?,?,?)';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            $thetime = time() + (60 * 60);
            $messenger->setTimeLastMessageSent($thetime);
            $firstname = $mess->getFirstname();
            $id = $mess->getUserId();
            $lastname = $mess->getLastname();
            $email = $mess->getEmail();
            $number = $mess->getPhonenumber();
            $message = $mess->getMessage();
            $statement->bind_param('issssss', $id, $firstname, $lastname, $email, $number, $message, $thetime);
            if (self::updateMessengerInfo($messenger)) {
                if ($statement->execute()) {
                    if ($statement->affected_rows === 1) {
                        $statement->close();
                        $connect->close();
                        return true;
                    } else {
                        $statement->close();
                        $connect->close();
                        throw new Exception("Something went wrong");
                    }
                } else {
                    $statement->close();
                    $connect->close();
                    throw new Exception("Something went wrong");
                }
            }
        }

        public static function registerMe($me, $password)
        {
            $query = 'INSERT INTO `me` (`firstname`, `lastname`, `level`, `username`, `password`) VALUES (?,?,?,?,?)';
            $firstname = $me->getFirstname();
            $lastname = $me->getLastname();
            $level = $me->getLevel();
            $username = $me->getUsername();
            $encpassword = password_hash($password, PASSWORD_DEFAULT);
            $connect = dbcon();
            $statement = $connect->prepare($query);
            $statement->bind_param('sssss', $firstname, $lastname, $level, $username, $encpassword);
            if (!$statement->execute()) {
                $connect->close();
                throw new Exception('Something\'s fucking wrong!!!');
                return 0;
            } else {
                if ($connect->affected_rows == 1) {
                    $connect->close();
                    return 1;
                }
            }
        }

        public static function logmein($username, $password)
        {
            #Query to check if I am a registered user and get all my details
            $query = 'SELECT * FROM `me` WHERE username = ?';
            #Opens a database connection
            $connect = dbcon();
            #Prepares my query and puts it into a statement variable
            $statement = $connect->prepare($query);
            #Binding parameters to the query
            $statement->bind_param('s', $username);
            #Tests if my query is executed [Actually executes it and checks it's return value]
            if ($statement->execute()) {
                #If query executed properly (and the result set is not empty), store it's result set in a result variable
                $result = $statement->get_result();
                #Tests how many rows are present in the result set.
                if ($result->num_rows == 1) {
                    #If there's just one row[What we need in this case] get an associative array off of that row and store it a new variable
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    #Tests if my entered password matches the hashed password in my database
                    if (password_verify($password, $row['password'])) {
                        #If it does, create a new object of my "Me" class
                        $me = new Me;
                        #Set the objects fields to the guys gotten off of the select query
                        $me->setFirstname($row['firstname']);
                        $me->setLastname($row['lastname']);
                        $me->setLevel($row['level']);
                        $me->setUsername($row['username']);
                        #When that's done, close the database connection
                        $connect->close();
                        #Return the object to the Controller
                        return $me;
                    } else {
                        $connect->close();
                        #Returns null because the password is wrong
                        return null;
                    }
                } else {
                    $connect->close();
                    #Returns null because that username simply doesn't exit
                    return null;
                }
            } else {
                $connect->close();
                #Throws an exception
                throw new Exception('Something went wrong. Try again later or check your source code');
            }
        }

        public static function testme()
        {
            try {
                $query = "SELECT * FROM `me`";
                $connect = dbcon();
                $result = $connect->query($query);
                if (!$result->num_rows >= 1) {
                    return null;
                } else {
                    return 1;
                }
            } finally {
                $connect->close();
            }
        }

        public static function getAllMessages()
        {
            $query = 'SELECT * FROM `message` ORDER BY `timesent` DESC';
            $connect = dbcon();
            $result = $connect->query($query);
            $messagesarray = array();
            if (!$result->num_rows >= 1) {
                $connect->close();
                return null;
            } else {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $message = new Message();
                    $message->setMessageId($row['messageid']);
                    $message->setFirstname($row['firstname']);
                    $message->setLastname($row['lastname']);
                    $message->setEmail($row['email']);
                    $message->setPhonenumber($row['phonenumber']);
                    $message->setMessage($row['message']);
                    $message->setTimesent($row['timesent']);
                    $message->setStatus($row['status']);
                    array_push($messagesarray, $message);
                }
                $connect->close();
                return $messagesarray;
            }
        }

        public static function updateStatus($id)
        {
            $query = 'UPDATE `message` SET `status` = "Read" WHERE `messageid` = ?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            $statement->bind_param('i', $id);
            if ($statement->execute()) {
                if ($connect->affected_rows == 1) {
                    $connect->close();
                    return true;
                } else {
                    $connect->close();
                    return false;
                }
            } else {
                $connect->close();
                throw new Exception('Something went wrong. Please check your internet connection');
            }
        }

        public static function deleteMessage($id)
        {
            $query = 'DELETE FROM `message` WHERE `messageid`=?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            $statement->bind_param('i', $id);
            if ($statement->execute()) {
                if ($statement->affected_rows == 1) {
                    $connect->close();
                    return true;
                } else {
                    $connect->close();
                    throw new Exception('The message you\'re trying to delete never existed');
                }
            } else {
                $connect->close();
                return false;
            }
        }

        public static function deleteMessenger($id)
        {
            $query = 'DELETE FROM `newsletter` WHERE `userid`=?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            $statement->bind_param('i', $id);
            if ($statement->execute()) {
                if ($statement->affected_rows == 1) {
                    $connect->close();
                    return true;
                } else {
                    $connect->close();
                    return false;
                }
            } else {
                $connect->close();
                throw new Exception('Something went wrong, please check your internet connection');
            }
        }

        public static function getUnreadMessages()
        {
            $query = 'SELECT * FROM `message` WHERE `status` = "Unread"';
            $connect = dbcon();
            $i = 0;
            if ($result = $connect->query($query)) {
                if ($result->num_rows == 0) {
                    $connect->close();
                    return 0;
                } else {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                    }

                    $connect->close();
                    return $i;
                }
            } else {
                $connect->close();
                throw new Exception('Please check your internet connection');
            }

        }

        public static function getAllMessengers()
        {
            $query = 'SELECT * FROM `newsletter`';
            $connect = dbcon();
            $messengerarray = array();
            if ($result = $connect->query($query)) {
                if ($result->num_rows <= 1) {
                    $connect->close();
                    return null;
                } else {
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $messenger = new Messenger();
                        $messenger->setUserid($row['userid']);
                        $messenger->setFirstname($row['firstname']);
                        $messenger->setEmail($row['email']);
                        array_push($messengerarray, $messenger);
                    }
                    $connect->close();
                    return $messengerarray;
                }
            }
        }

        public static function getMessage($id)
        {
            $query = 'SELECT * FROM `message` WHERE messageid = ?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            $statement->bind_param('i', $id);
            if ($statement->execute()) {
                $result = $statement->get_result();
                if ($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $message = new Message();
                    $message->setMessageId($row['messageid']);
                    $message->setFirstname($row['firstname']);
                    $message->setLastname($row['lastname']);
                    $message->setEmail($row['email']);
                    $message->setPhonenumber($row['phonenumber']);
                    $message->setMessage($row['message']);
                    $message->setTimesent($row['timesent']);
                    $message->setStatus($row['status']);
                    $connect->close();
                    return $message;
                } else {
                    $connect->close();
                    return null;
                }
            } else {
                $connect->close();
                throw new Exception('Something went wrong, please check your internet connection');
            }
        }

        public static function deleteMultiple($array)
        {
            $query = 'DELETE FROM `message` WHERE `messageid` = ?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            foreach ($array as $key) {
                $statement->bind_param('i', $key);
                if ($statement->execute()) {
                    if ($statement->affected_rows !== 1) {
                        $connect->close();
                        throw new Exception("Something went wrong");
                    }
                }
            }
            $connect->close();
            return true;
        }

        public static function readMultiple($array)
        {
            $query = 'UPDATE `message` SET `status` = "Read" WHERE `messageid` = ?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            foreach ($array as $key) {
                $statement->bind_param('i', $key);
                if ($statement->execute()) {
                    if ($statement->affected_rows !== 1) {
                        $connect->close();
                        throw new Exception("Something went wrong");
                    }
                }
            }
            $connect->close();
            return true;
        }

        public static function readAll()
        {
            $query = 'UPDATE `message` SET `status`= "Read" WHERE `status` = ?';
            $connect = dbcon();
            $param = "Unread";
            $statement = $connect->prepare($query);
            $statement->bind_param('s', $param);
            $statement->execute();
            $returnValue = $statement->affected_rows;
            if ($returnValue > 0) {
                $connect->close();
                return true;
            } else {
                $connect->close();
                throw new Exception("You've already read all your messages");
            }
        }

        public static function deleteAll()
        {
            $query = 'DELETE FROM `message`';
            $connect = dbcon();
            if ($connect->query($query)) {
                $affectedRows = $connect->affected_rows;
                $connect->close();
                return $affectedRows;
            } else {
                $connect->close();
                throw new Exception('Something went wrong');
            }

        }

        public static function numberOfMessages()
        {
            $query = 'SELECT COUNT(*) AS `numberofmessages` FROM `message`';
            $connect = dbcon();
            if ($result = $connect->query($query)) {
                $rows = $result->fetch_array(MYSQLI_ASSOC);
                $final = $rows['numberofmessages'];
                $connect->close();
                return $final;
            } else {
                $connect->close();
                throw new Exception("Something went wrong");
            }
        }

        public static function numberOfUnreadMessages()
        {
            $query = 'SELECT COUNT(*) AS `unread` FROM `message` WHERE `status` = "Unread"';
            $connect = dbcon();
            if ($result = $connect->query($query)) {
                $rows = $result->fetch_array(MYSQLI_ASSOC);
                $final = $rows['unread'];
                $connect->close();
                return $final;
            } else {
                $connect->close();
                throw new Exception("Something went wrong");
            }
        }

        public static function numberOfUsers()
        {
            $query = 'SELECT COUNT(*) AS `users` FROM `newsletter`';
            $connect = dbcon();
            if ($result = $connect->query($query)) {
                $rows = $result->fetch_array(MYSQLI_ASSOC);
                $final = $rows['users'];
                $connect->close();
                return $final;
            } else {
                $connect->close();
                throw new Exception("Something went wrong");
            }
        }

        public static function getPagedMessages($page, $messagePerPage)
        {
            if ($page === 1) {
                $query = 'SELECT * FROM `message` ORDER BY `timesent` DESC LIMIT ?';
                $connect = dbcon();
                $statement = $connect->prepare($query);
                $statement->bind_param('i', $messagePerPage);
                $messages = array();
                if ($statement->execute()) {
                    $result = $statement->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $message = new Message();
                            $message->setEmail($row['email']);
                            $message->setFirstname($row['firstname']);
                            $message->setLastname($row['lastname']);
                            $message->setMessageId($row['messageid']);
                            $message->setPhonenumber($row['phonenumber']);
                            $message->setMessage($row['message']);
                            $message->setTimesent($row['timesent']);
                            $message->setUserId($row['userid']);
                            $message->setStatus($row['status']);
                            array_push($messages, $message);
                        }
                        $connect->close();
                        return $messages;
                    } else {
                        $connect->close();
                        throw new Exception("You've got no messages");
                    }
                } else {
                    $connect->close();
                    throw new Exception("Something went wrong");
                }
            } else {
                $query = 'SELECT * FROM `message` ORDER BY `timesent` DESC LIMIT ?, ?';
                $connect = dbcon();
                $start = ($page - 1) * $messagePerPage;
                $statement = $connect->prepare($query);
                $statement->bind_param('ii', $start, $messagePerPage);
                $messages = array();
                if ($statement->execute()) {
                    $result = $statement->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $message = new Message();
                            $message->setEmail($row['email']);
                            $message->setFirstname($row['firstname']);
                            $message->setLastname($row['lastname']);
                            $message->setMessageId($row['messageid']);
                            $message->setPhonenumber($row['phonenumber']);
                            $message->setMessage($row['message']);
                            $message->setTimesent($row['timesent']);
                            $message->setUserId($row['userid']);
                            $message->setStatus($row['status']);
                            array_push($messages, $message);
                        }
                        $connect->close();
                        return $messages;
                    } else {
                        $connect->close();
                        throw new Exception("You've got no messages");
                    }
                } else {
                    $connect->close();
                    throw new Exception("Something went wrong.");
                }
            }
        }

        public static function getPagedUsers($page, $usersPerPage)
        {
            if ($page === 1) {
                $query = "SELECT * FROM `newsletter` ORDER BY `timeAdded` DESC LIMIT ?";
                $connect = dbcon();
                $statement = $connect->prepare($query);
                $statement->bind_param('i', $usersPerPage);
                $users = array();
                if($statement->execute()){
                    $result = $statement->get_result();
                    if($result->num_rows >= 1){
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                            $user = new Messenger();
                            $user->setFirstname($row['firstname']);
                            $user->setLastname($row['lastname']);
                            $user->setEmail($row['email']);
                            $user->setUserid($row['userid']);
                            $user->setMessagesSent($row['messagesSent']);
                            $user->setTimeAdded($row['timeAdded']);
                            $user->setTimeLastMessageSent($row['timelastMessageSent']);

                            $user->setLastIpAddressUsed($row['lastIPAddressUsed']);
                            $user->setLastBrowserUsed($row['lastBrowserUsed']);
                            array_push($users, $user);
                        }
                        $statement->close();
                        $connect->close();
                        return $users;
                    }
                    else{
                        $statement->close();
                        $connect->close();
                        throw new Exception("You've got no users(messengers)");
                    }
                }
                else{
                    $statement->close();
                    $connect->close();
                    throw new Exception("Something went wrong!");
                }
            } else {
                $query = 'SELECT * FROM `newsletter` ORDER BY `timeAdded` LIMIT ?, ?';
                $connect = dbcon();
                $start = ($page - 1) * $usersPerPage;
                $statement = $connect->prepare($query);
                $statement->bind_param('ii', $start, $usersPerPage);
                $users = array();
                if ($statement->execute()) {
                    $result = $statement->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $user = new Messenger();
                            $user->setFirstname($row['firstname']);
                            $user->setLastname($row['lastname']);
                            $user->setMessagesSent($row['messagesSent']);
                            $user->setTimeAdded($row['timeAdded']);
                            $user->setTimeLastMessageSent($row['timeLastMessageSent']);
                            $user->setLastIpAddressUsed($row['lastIPAddressUsed']);
                            $user->setLastBrowserUsed($row['lastBrowserUsed']);
                            array_push($users, $user);
                        }
                        $statement->close();
                        $connect->close();
                        return $users;
                    }
                    else{
                        $statement->close();
                        $connect->close();
                        throw new Exception("You've got no users(messengers)");
                    }
                }
                else{
                    $statement->close();
                    $connect->close();
                    throw new Exception("Something went wrong!");
                }
            }
        }
        public static function deleteAllMessengers(){
            $query = 'DELETE FROM `newsletter`';
            $connect = dbcon();
            if($connect->query($query)){
                if($connect->affected_rows > 0){
                    $connect->close();
                    return true;
                }
                else{
                    $connect->close();
                    return false;
                }
            }
            else{
                $connect->close();
                throw new Exception("Something went wrong");
            }
        }
        public static function deleteMultipleUsers($array){
            $query = 'DELETE FROM `newsletter` WHERE `userid` = ?';
            $connect = dbcon();
            $statement = $connect->prepare($query);
            foreach ($array as $key) {
                $statement->bind_param('i', $key);
                if ($statement->execute()) {
                    if ($statement->affected_rows !== 1) {
                        $connect->close();
                        throw new Exception("Something went wrong");
                    }
                }
            }
            $connect->close();
            return true;
        }
    }
