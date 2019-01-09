<?php
    include 'config.php';

    $sender_id = $_POST['id'];
    $message_type = $_POST['message_type'];
    $message = $_POST['message'];
    $description = $_POST['description'];
    $topic = $_POST['topic'];
    $sub_topic = $_POST['sub_topic'];
    $client_password = $_POST['password'];

    $conn = mysqli_connect($db_host, $db_user, $db_password);

    $result = "messageNotReached";

    if($conn){

        if(mysqli_select_db($conn,$db_database)){

            $query = mysqli_query($conn , "select password from user where id = '$sender_id' ");

            $row = mysqli_fetch_array($query);

            $res = $row['password'];

            if($client_password == $res){

                $date = date("Y/m/d");
                $time = date("h:i:sa");

                if(mysqli_query($conn,"insert into message values('$sender_id','$message_type','$message','$topic','unseen','$sub_topic','$date','$time')")){
                    $result = 'messageReached';
                    $admin_inbox = 1;
                }

            }

        }
    }

    echo $result;

?>