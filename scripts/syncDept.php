<?php
    include 'config.php';

    $id = $_POST['id'];
    $password = $_POST['password'];
    $client_type = $_POST['client_type'];

    $conn = mysqli_connect($db_host, $db_user, $db_password);

    $result = "Error";

    function fetch_dept($conn){

        $query = mysqli_query($conn,"select dept from department");
        while($row = mysqli_fetch_array($query)){
            $department = $row['dept'];
            $q = mysqli_query($conn,"select subdept from subDepartment where dept = '$department' ");
            while($r = mysqli_fetch_array($q)){
                $subdept = $row['subdept'];
                echo "$subdept";
            }


        }

    }



    if($conn){

        if(mysqli_select_db($conn,$db_database)){
            fetch_dept($conn);

            if($client_type == "Admin"){

                $query = mysqli_query($conn,"select password from admin where id = '$id'");
                $row = mysqli_fetch_row($query);

                if($row['password'] == $password){

                }


            }else if($client_type == "Client"){

                $query = mysqli_query($conn,"select password from user where id = '$id'");
                $row = mysqli_fetch_row($query);

                if($row['password'] == $password){

                }

            }

        }

    }

?>