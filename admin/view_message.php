<?php
    /**
     * Created by PhpStorm.
     * User: Eric McWinNEr
     * Date: 11/25/2017
     * Time: 5:15 AM
     */
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
    if (!isset($_GET['id'])) {
        redirect('index.php');
    } elseif ($_GET['id'] == null) {
        redirect('index.php');
    } elseif ($_GET['id'] == '') {
        redirect('index.php');
    } elseif (empty($_GET['id'])) {
        redirect('index.php');
    } elseif (is_null($_GET['id'])) {
        redirect('index.php');
    } elseif (!is_numeric($_GET['id'])) {
        redirect('index.php');
    } elseif (!ctype_digit($_GET['id'])) {
        redirect('index.php');
    }
    $message = Database::getMessage((int)$_GET['id']);
    $numberOfAllMessages = Database::numberOfMessages();
    $unread_messages = Database::numberOfUnreadMessages();
    $numberOfMessengers = Database::numberOfUsers();
    if ($message->getStatus() == "Unread") {
        Database::updateStatus((int)$message->getMessageId());
        $unread_messages = Database::numberOfUnreadMessages();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include './Partitions/head.php'; ?>
        <title>
            <?php
                $message_array = explode(' ', $message->getMessage());
                $title_array = array_slice($message_array, 0, 5);
                echo '"' . implode(' ', $title_array) . '..." - ' . $message->getFirstname() . ' ' . $message->getLastname();
            ?>
        </title>
    </head>
    <body class="admin_page">
        <div class="navigation-bar">
            <ul>
                <li><img src="../Images/logo.jpg" alt="Eric's Logo" class="logo_image"><span class="site_name">Eric McWinNEr's Admin Section</span>
                </li>
                <li class="float_right dropdown_trigger">
                    <span class="user_name"><?php echo $me->getUsername(); ?><i class="fa fa-angle-down"></i></i></span>
                    <img src="../Images/about/20160318_150552%20(612%20x%20612)%20(153%20x%20153).jpg" alt="My Profile Picture"
                         class="profile_picture">
                    <ul class="dropdown">
                        <li><p class="lead"><?php echo $me->getFirstname() . ' ' . $me->getLastname(); ?></p></li>
                        <li class="link_element" data-link="controller/logout.php"><a href="controller/logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="margin-top"></div>
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
                                    } ?>"><a href="messages.php">All Messages <?php echo $numberOfAllMessages; ?> (<?php echo $unread_messages; ?>)</a></p>
                                </li>
                                <li id="messengerli"><p><a href="users.php">All Messengers (<?php echo $numberOfMessengers; ?>)</a></p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="messenger_info">
                        <div class="float_left">
                            <p><b><?php echo $message->getFirstname() . " " . $message->getLastname(); ?></b> - <?php echo $message->getEmail(); ?> - <b><?php echo $message->getPhonenumber(); ?></b></p>
                        </div>
                        <div class="float_right">
                            <p>
                                <?php
                                    $message_stamp = (int)$message->getTimesent();
                                    $message_time = date('h:i A', $message_stamp);
                                    $message_date = date('D jS M Y', $message_stamp);
                                    echo '<b>' . $message_time . '</b>' . ' ' . $message_date;
                                ?>
                            </p>
                        </div>
                        <div class="clear_float"></div>
                        <div class="margin-top"></div>
                        <div class="message_content">
                            <p><?php echo $message->getMessage(); ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br/>
    </body>
</html>
