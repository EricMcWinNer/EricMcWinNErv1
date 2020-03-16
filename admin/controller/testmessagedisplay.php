<?php
/**
 * Created by PhpStorm.
 * User: Eric McWinNEr
 * Date: 11/23/2017
 * Time: 7:07 PM
 */
    include('../../Functions/mainfunction.php');
    include('../../Model/me.php');
    include('../../Model/message.php');
    include('../../Model/database.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            table{
                width: 80%;
                border: 1px solid black;
                margin: 0 auto;
                padding: 5px;
                box-sizing: border-box;

            }
            tr{
                padding: 5px;
                border: 1px solid black;
            }
            tr:first-of-type td{
                font-weight: bold;
                text-align: center;
            }
            td{
                padding: 10px;
                border: 1px dashed black;
            }
        </style>
    </head>
    <body>
    <table cellspacing="9px">

        <tr>
            <td>Delete</td>
            <td>Name</td>
            <td>Email Address</td>
            <td>Phone Number</td>
            <td>Message</td>
            <td>Time sent</td>
            <td>Status</td>
        </tr>
        <?php
            $allmessages = Database::getAllMessages();
             for($i=0; $i< count($allmessages); $i++) {
                 $message = new Message();
                 $message = $allmessages[$i];
                 ?>
                 <tr>
                     <td><a href="messagecontroller.php?id=<?php echo $message->getMessageId();?>&delete=1">Delete</a></td>
                     <td><?php echo $message->getFirstname().' '.$message->getLastname();?></td>
                     <td><?php echo $message->getEmail();?></td>
                     <td><?php echo $message->getPhonenumber();?></td>
                     <td><a href="messagecontroller.php?id=<?php echo $message->getMessageId();?>&status=1">
                         <?php
                            $message_content =  $message->getMessage();
                            if(strlen($message_content) >= 40){
                                echo substr($message_content, 0, 35)."...";
                            }else{
                                echo $message_content;
                            }
                         ?>
                         </a></td>
                     <td title="<?php
                                    $time_sent = (int)$message->getTimesent();
                                    $full_time = date('jS', $time_sent)." ".date('M', $time_sent)." at ".date('H:i', $time_sent);
                                    echo $full_time;


                                ?>"><?php
                            $time_difference = time() - $time_sent;
                            if(date('d', time()) != date('d', $time_sent)){
                                echo date('jS', $sent_time)." ".date('M', $time_sent);
                            }
                            else{
                                echo date('H:i', $time_sent);
                            }
                         ?>
                     </td>
                     <td><?php echo $message->getStatus();?></td>
                     </tr>
                 <?php
             }
        ?>
    </table>
    </body>
</html>

