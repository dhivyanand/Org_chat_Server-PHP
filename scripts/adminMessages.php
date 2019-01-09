<?php

error_reporting(0);

    include 'config.php';

    $admin_id = $_POST['id'];
    $password = $_POST['password'];

    $conn = mysqli_connect($db_host, $db_user, $db_password);

    $myObj->sender_id = null;
    $myObj->message_type = null;
    $myObj->dept = null;
    $myObj->sub_dept = null;
    $myObj->result = "no_message";

    if($conn){

        if(mysqli_select_db($conn,$db_database)){

            $query = mysqli_query($conn , "select password from admin where id = '$admin_id' ");

            $row = mysqli_fetch_array($query);

            $res = $row['password'];

            if($password == $res){

                $query = mysqli_query($conn , "select * from message where status = 'unsee' ");

                while ($rows = mysqli_fetch_array($query)) {

                    $myObj->message = $rows['message'];
                    $myObj->description = $rows['description'];
                    $myObj->sender_id = $rows['sender_id'];
                    $myObj->message_type = $rows['message_type'];
                    $myObj->dept = $rows['topic'];
                    $myObj->sub_dept = $rows['sub_topic'];
                    $myObj->date = $rows['date'];
                    $myObj->time = $rows['time'];
                    $myObj->result = "yes";

                    $date = $rows['date'];
                    $time = $rown['time'];

                    $myJSON = json_encode($myObj);
                    echo $myJSON;
                    echo "\n";

                    mysqli_query($conn , "update message set status = 'seen' ");
                    $admin_inbox = 0;

                }

            }

        }
    }

    $myObj->result = "no";
    $myJSON = json_encode($myObj);

    echo $myJSON;


?>