<?php

    session_save_path('../Functions');
    session_start();
    require('../Functions/mainfunction.php');
    require('../Model/me.php');
    require('../Model/message.php');
    require('../Model/messenger.php');
    require('../Model/database.php');
    require('../Model/cookie.php');
    if (!isset($_SESSION['me'])) {
        redirect('index.php');
    }
    $parameter = '';
    $me = unserialize($_SESSION['me']);
    /*$numberOfAllMessages = Database::getAllMessages();
    $unread_messages = Database::getUnreadMessages();
    */
    $numberOfAllMessages = Database::numberOfMessages();
    $unread_messages = Database::numberOfUnreadMessages();
    $numberOfMessengers = Database::numberOfUsers();


    //PAGINATION CODE
    $resultNumber = null;
    if (isset($_GET['resultNumber'])) {
        $resultNumber = (int)htmlspecialchars($_GET['resultNumber']);
    }
    $usersPerPage = $resultNumber ?: 10;
    $numberOfPages = (int)ceil($numberOfMessengers / $usersPerPage);
    if (!isset($_GET['page'])) {
        $page = 1;
        try {
            $users = Database::getPagedUsers($page, $usersPerPage);
        } catch (Exception $exp) {
            if(GATEWAY == "LOCAL"){
                echo $exp->getMessage();
            }
        }
    } else {
        $page = (int)htmlspecialchars($_GET['page']);
        try {
            if ($page > $numberOfPages) {
                $page = $numberOfPages;
            }
            $messages = Database::getPagedMessages($page, $usersPerPage);
        } catch (Exception $exp) {
            if(GATEWAY == "LOCAL"){
                echo $exp->getMessage();
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include './Partitions/head.php'; ?>
        <title>Admin | Eric McWinNEr's World</title>
        <style type="text/css">
            table {
                width: 100%;
                /* border-left: 1px solid #dddddd;
                 border-right: 1px solid #dddddd;*/
                margin-bottom: 15px;
            }
            th{
                padding: 10px 10px;
                background-color: black;
                color: white;
            }
            td {
                border-top: 1px solid #dddddd;
                border-bottom: 1px solid #dddddd;
                padding: 10px 5px;
                cursor: pointer;
            }

            tr.Unread td.time_sent {
                font-weight: bold;
            }

            tr.Unread td {
                font-weight: bold;
            }

            tr.Unread {
                background-color: #ddd /*#dadfa5*/;
            }

            .delete_message {
                transition: 1s;
            }

            .delete_message:hover {
                color: red;
            }

            p.unread_messages a {
                color: #d73827;
            }

            #all_users.invisible {
                display: none;
            }

            #all_messages.invisible {
                display: none;
            }
        </style>
    </head>
    <body class="admin_page">
        <div class="navigation-bar">
            <ul>
                <li>
                    <img src="../Images/logo.jpg" alt="Eric's Logo" class="logo_image"><span class="site_name">Eric McWinNEr's Admin Section</span>
                </li>
                <li class="float_right dropdown_trigger">
                    <span class="user_name"><?php echo $me->getUsername(); ?><i class="fa fa-angle-down"></i></i></span>
                    <img src="../Images/about/20160318_150552%20(612%20x%20612)%20(153%20x%20153).jpg" alt="My Profile Picture" class="profile_picture">
                    <ul class="dropdown">
                        <li>
                            <p class="lead"><?php echo $me->getFirstname() . ' ' . $me->getLastname(); ?></p>
                        </li>
                        <li class="link_element" data-link="controller/logout.php">
                            <a href="controller/logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="eric_card">
                        <div class="title_div">
                            <p>Welcome back, <?php echo $me->getFirstname(); ?></p>
                        </div>
                        <div class="body_div">
                            <ul>
                                <li id="messageli"><p class="<?php if ($unread_messages >= 1) {
                                        echo 'unread_messages';
                                    } ?>"><a href="messages.php">All Messages <?php echo $numberOfAllMessages; ?>
                                            (<?php echo $unread_messages; ?>)</a></p>
                                </li>
                                <li id="messengerli" class="selected"><p><a href="users.php">All Messengers
                                            (<?php echo $numberOfMessengers; ?>)</a>
                                    </p></li>
                                <!--
                                    todo
                                    Write an ajax function to enable deleting multiple users and write a
                                    function to allow deleting of all users
                                -->
                                <li><a href="#" id="delete_mulitple_users">Delete multiple users</a></li>
                                <li><a href="controller/userController.php?deleteAll=all" id="deleteAllMessages">Delete all users</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php if (isset($users)){ ?>
                    <div id="message_div">
                        <table cellspacing="9px" id="all_users">
                            <tr>
                                <th colspan="2">Actions</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Last IP Address Used</th>
                                <th>Last browser used</th>
                                <th>Time First message sent(Creation)</th>
                                <th>Time last message sent</th>
                            </tr>
                            <?php

                                for ($i = 0; $i < count($users); $i++) {
                                    $user = new Messenger($users[$i]);
                                    ?>
                                    <tr>
                                        <td class="check">
                                            <form class="check"><input type="checkbox" class="message_checkbox" value="<?php echo $user->getUserid(); ?>"/>
                                            </form>
                                        </td>
                                        <td class="second"><a class="delete_message" title="Delete User"
                                                              href="controller/userController.php?messenger=<?php echo $user->getUserid(); ?>&delete=1"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                        <td><?php echo $user->getFirstname() . ' ' . $user->getLastname(); ?></td>
                                        <td><?php echo $user->getEmail(); ?></td>
                                        <td><?php echo $user->getLastIpAddressUsed(); ?></td>
                                        <td>
                                            <?php
                                                $message_content = $user->getLastBrowserUsed();
                                                if (strlen($message_content) >= 40) {
                                                    echo substr($message_content, 0, 35) . "...";
                                                } else {
                                                    echo $message_content;
                                                }
                                            ?>
                                        </td>
                                        <td class="time_sent" title="<?php
                                            $time_sent = $user->getTimeAdded();
                                            $full_time = date('jS', $time_sent) . " " . date('M', $time_sent) . " at " . date('H:i', $time_sent);
                                            echo $full_time;

                                        ?>"><?php
                                                $sent_time = (int)$user->getTimeAdded();
                                                $time_difference = time() - $sent_time;
                                                if (date('d', time()) != date('d', $sent_time)) {
                                                    echo date('jS', $sent_time) . " " . date('M', $sent_time);
                                                } else {
                                                    echo date('H:i', $sent_time);
                                                }
                                            ?>
                                        </td>
                                        <td class="time_sent" title="<?php
                                            $time_sent = $user->getTimeLastMessageSent();
                                            $full_time = date('jS', $time_sent) . " " . date('M', $time_sent) . " at " . date('H:i', $time_sent);
                                            echo $full_time;

                                        ?>"><?php
                                                $message_stamp = (int)$user->getTimeLastMessageSent();
                                                $message_time = date('h:i A', $message_stamp);
                                                $message_date = date('D jS M Y', $message_stamp);
                                                echo '<b>' . $message_time . '</b>' . ' ' . $message_date;
                                            ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            ?>
                            <caption><?php if ($numberOfPages !== 0) echo 'Page ' . $page . ' of ' . $numberOfPages; ?></caption>
                        </table>
                        <div class="text-center little-margin pagination"><?php include "Partitions/pagination.php"; ?></div>
                        <?php
                            }
                            else {
                                ?>
                                <div class="none">
                                    <h1>You've got no users(messengers)!</h1>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
