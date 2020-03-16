<?php
    include('../../Functions/mainfunction.php');
    include('../../Model/me.php');
    include('../../Model/message.php');
    include('../../Model/database.php');
    /**
     * Created by PhpStorm.
     * User: Eric McWinNEr
     * Date: 1/8/2018
     * Time: 12:29 AM
     */
    if (isset($_GET['deleteAll'])) {
        if ($_GET['deleteAll'] === "all") {
            try {
                if (Database::deleteAllMessengers()) {
                    redirect('../index.php?redirect=users.php');
                } else {
                    redirect('../index.php?redirect=users.php?err=1');
                }
            } catch (Exception $exp) {
                redirect("../index.php?redirect=message.php?err=0&exp={$exp->getMessage()}");
            }
        }
    }
    if (isset($_POST['deleteMultiple'])) {
        if ($_POST['deleteMultiple'] === "multipleUsers") {
            if (isset($_POST['userArray'])) {
                try {
                    $array = json_decode(stripslashes($_POST['userArray']));
                    if (Database::deleteMultipleUsers($array)) {
                        redirect('../index.php?redirect=users.php');
                    }
                } catch (Exception $exp) {
                    redirect("../index.php?redirect=users.php?err=0&exp={$exp->getMessage()}");
                }
            }
        }
    }
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 1) {
            if (isset($_GET['messenger'])) {
                try {
                    if (Database::deleteMessenger($_GET['messenger'])) {
                        redirect("../index.php?redirect=users.php?info=1");
                    } else {
                        redirect('../index.php?redirect=users.php?err=2');
                    }
                } catch (Exception $exp) {
                    redirect("index.php?redirect=users.php?err=1&exp={$exp->getMessage()}");
                }
            }
        }
    }