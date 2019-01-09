<?php
    include 'config.php';

    $name = $_POST['name'];
    $id = $_POST['id'];
    $dp = $_POST['dp'];
    $password = $_POST['password'];
    $dept = $_POST['dept'];
    $subdept = $_POST['subdept'];

    $conn = mysqli_connect($db_host, $db_user, $db_password);

    $result = "Error";

    if($conn){

        if(mysqli_select_db($conn,$db_database)){

            if(mysqli_query($conn , "insert into user values('$name','$id','$dp','$password','$dept','$subdept)")){
                $result = "Success";
            }

        }

    }

    echo $result;

?>