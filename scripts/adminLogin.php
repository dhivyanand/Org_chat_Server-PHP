<?php

error_reporting(0);

    include 'config.php';

    $id = $_POST['id'];
    $password = $_POST['password'];

    $conn = mysqli_connect($db_host, $db_user, $db_password);

    $myObj->name = null;
    $myObj->dp = null;
    $myObj->result = "Login unSuccessful";

    if($conn){

        if(mysqli_select_db($conn,$db_database)){

            $query = mysqli_query($conn , "select name, profile_photo, password from admin where id = '$id' AND password = '$password' ");

            while ($rows = mysqli_fetch_array($query)) {

                $name = $rows['name'];
                $dp = $rows['profile_photo'];
                $passwrd = $rows['password'];

            }
            if($passwrd == $password){
                $myObj->name = $name;
                $myObj->dp = $dp;
                $myObj->result = "Login Successful";
            }
        }

    }

    $myJSON = json_encode($myObj);

    echo $myJSON;

?>