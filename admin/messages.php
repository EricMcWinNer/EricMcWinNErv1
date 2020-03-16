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
    $messagePerPage = $resultNumber ?: 10;
    $numberOfPages = (int)ceil($numberOfAllMessages / $messagePerPage);
    if (!isset($_GET['page'])) {
        $page = 1;
        try {
            $messages = Database::getPagedMessages($page, $messagePerPage);
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
            $messages = Database::getPagedMessages($page, $messagePerPage);
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
                                <li id="messageli" class="selected"><p class="<?php if ($unread_messages >= 1) {
                                        echo 'unread_messages';
                                    } ?>"><a href="#">All Messages <?php echo $numberOfAllMessages; ?>
                                            (<?php echo $unread_messages; ?>)</a></p>
                                </li>
                                <li id="messengerli"><p><a href="users.php">All Messengers
                                            (<?php echo $numberOfMessengers; ?>)</a>
                                    </p></li>
                                <li><a href="#" id="delete_mulitple">Delete multiple</a></li>
                                <li><a href="#" id="mark_multiple_as_read">Mark multiple as read</a></li>
                                <li><a href="controller/messagecontroller.php?readAll=readThem" id="markallasread">Mark all as read</a></li>
                                <li><a href="controller/messagecontroller.php?deleteAll=deleteThem" id="deleteAllMessages">Delete all messages</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php if(isset($messages)){ ?>
                    <div id="message_div">
                        <table cellspacing="9px" id="all_messages">
                            <?php

                                for ($i = 0; $i < count($messages); $i++) {
                                    $message = new Message();
                                    $message = $messages[$i];
                                    ?>
                                    <tr <?php if ($message->getStatus() == "Unread") {
                                        echo 'class="Unread"';
                                    } ?>>
                                        <td class="check">
                                            <form class="check"><input type="checkbox" class="message_checkbox" value="<?php echo $message->getMessageId(); ?>"/>
                                            </form>
                                        </td>
                                        <td class="first"><?php if ($message->getStatus() == "Unread") { ?><a
                                                title="Mark as read"
                                                href="controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&status=1"
                                                class="mark_as_read"><i
                                                            class="fa fa-circle-o" aria-hidden="true"></i></a><?php } ?>
                                        </td>
                                        <td class="second"><a class="delete_message" title="Delete Message"
                                                              href="controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&delete=1"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                        <td onclick="read('controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&status=2')"><?php echo $message->getFirstname() . ' ' . $message->getLastname(); ?></td>
                                        <td onclick="read('controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&status=2')"><?php echo $message->getEmail(); ?></td>
                                        <td onclick="read('controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&status=2')"><?php echo $message->getPhonenumber(); ?></td>
                                        <td onclick="read('controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&status=2')">
                                            <?php
                                                $message_content = $message->getMessage();
                                                if (strlen($message_content) >= 40) {
                                                    echo substr($message_content, 0, 35) . "...";
                                                } else {
                                                    echo $message_content;
                                                }
                                            ?>
                                        </td>
                                        <td onclick="read('controller/messagecontroller.php?id=<?php echo $message->getMessageId(); ?>&status=2')"
                                            class="time_sent" title="<?php
                                            $time_sent = $message->getTimesent();
                                            $full_time = date('jS', $time_sent) . " " . date('M', $time_sent) . " at " . date('H:i', $time_sent);
                                            echo $full_time;

                                        ?>"><?php
                                                $sent_time = (int)$message->getTimesent();
                                                $time_difference = time() - $sent_time;
                                                if (date('d', time()) != date('d', $sent_time)) {
                                                    echo date('jS', $sent_time) . " " . date('M', $sent_time);
                                                } else {
                                                    echo date('H:i', $sent_time);
                                                }
                                            ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            ?>
                            <caption><?php if($numberOfPages > 0) echo 'Page ' . $page . ' of ' . $numberOfPages; ?></caption>
                        </table>
                        <div class="text-center little-margin pagination"><?php include "Partitions/pagination.php"; ?></div>
                    </div>
                    <?php }
                    else {
                        ?>
                        <h1>You've got no messages!</h1>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
