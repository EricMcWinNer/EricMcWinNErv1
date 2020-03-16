<?php
    /**
     * Created by PhpStorm.
     * User: Eric McWinNEr
     * Date: 11/24/2017
     * Time: 8:26 AM
     */
    include('../../Functions/mainfunction.php');
    include('../../Model/me.php');
    include('../../Model/message.php');
    include('../../Model/database.php');

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 1) {
            try {
                if (isset($_GET['id'])) {
                    if (Database::updateStatus((int)$_GET['id'])) {
                        redirect('../index.php');
                    } else {
                        redirect('../index.php');
                    }
                }
            } catch (Exception $xcp) {
                redirect('../messages.php?err=3');
            }

        } else if ($_GET['status'] == 2) {
            try {
                if (isset($_GET['id'])) {
                    if (Database::updateStatus((int)$_GET['id'])) {
                        redirect("../view_message.php?id={$_GET['id']}");
                    } else {
                        redirect("../view_message.php?id={$_GET['id']}");
                    }
                }
            } catch (Exception $xcp) {
                redirect('../messages.php?err=1');
            }
        }
    }
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 1) {
            if (isset($_GET['id'])) {
                try {
                    if (Database::deleteMessage($_GET['id'])) {
                        redirect('../index.php');
                    } else {
                        redirect('../me.php?err=2');
                    }
                } catch (Exception $xcp) {
                    $me = $xcp->getMessage();
                    redirect('../me.php?err=3');
                }
            } else {
                redirect('../index.php');
            }
        } else {
            redirect('../index.php');
        }
    }
    if (isset($_GET['messenger'])) {
        if ($_GET['messenger'] == 1) {
            if (isset($_GET['id'])) {
                try {
                    if (Database::deleteMessenger((int)$_GET['id'])) {
                        redirect('../index.php');
                    } else {
                        redirect('../me.php?err=4');
                    }
                } catch (Exception $exp) {

                }
            }
        }
    }
    if (isset($_POST['multiDelete'])) {
        if ($_POST['multiDelete'] == "multi") {
            if (isset($_POST['array'])) {
                $checkbox = json_decode(stripslashes($_POST['array']));
                try {
                    if (Database::deleteMultiple($checkbox)) {
                        exit("Success");
                    } else {
                        exit("Failure");
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            }
        }
    }
    if (isset($_POST['multiRead'])) {
        if ($_POST['multiRead'] === 'multi') {
            if (isset($_POST['array'])) {
                $checkbox = json_decode(stripslashes($_POST['array']));
                try {
                    if (Database::readMultiple($checkbox)) {
                        exit("Success");
                    } else {
                        exit("Failure");
                    }
                } catch (Exception $ex) {
                    echo "Exception:" . $ex->getMessage();
                }
            }
        }
    }
    if (isset($_GET['readAll'])) {
        if ($_GET['readAll'] == 'readThem') {
            try {
                if ($returned = Database::readAll()) {
                    redirect('../index.php');
                } else {
                    redirect('../messages.php?err=9');
                }
            } catch (Exception $ex) {
                echo "Exception:" . $ex->getMessage();
            }
        }
    }
    if (isset($_GET['deleteAll'])) {
        if ($_GET['deleteAll'] == 'deleteThem') {
            try {
                if ($returned = Database::deleteAll()) {
                    redirect('../index.php');
                } else {
                    redirect('../messages.php?err=9');
                }
            } catch (Exception $ex) {
                echo "Exception:" . $ex->getMessage();
            }
        }
    }
    /*
     *
     * if(!is_int($page)){
                    throw new Exception("Please enter a valid page");
                }
                else if(!is_int($messagePerPage)){
                    throw new Exception("Please enter a valid page");
                }
                else if($page === 0){
                    throw new Exception("Pleae enter a valid page");
                }
                else if($page < 0){
                    throw new Exception("Pleae enter a valid page");
                }
                else
     */
