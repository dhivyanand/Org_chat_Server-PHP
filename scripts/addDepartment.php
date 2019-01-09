<?php
    include 'config.php';

    $admin_id = $_POST['admin_id'];
    $admin_password = $_POST['admin_password'];
    $new_dept = $_POST['new_dept'];

    $result = "notSuccessful";

    $conn = mysqli_connect($db_host, $db_user, $db_password);

    if($conn){

        if(mysqli_select_db($conn,$db_database)){

            $query = mysqli_query($conn , "select password from user where id = '$admin_id' ");

            $row = mysqli_fetch_array($query);

            $res = $row['password'];

            if($admin_password == $res){

                $query = mysqli_query($conn , "select dept from department where dept = '$new_dept' ");

                $row = mysqli_fetch_array($query);

                $res = $row['dept'];

                if($res == $new_dept){
                    $result = "already_available";
                }else{
                    if(mysqli_query($conn , "insert into department values($new_department)")){
                        $result = "successful";
                    }
                }

            }

        }

    }

    echo $result;

?>