<?php
include("connect.php");
include("connection.php");
$connect = mysqli_connect("localhost", "root", "", "mike");

    if(isset($_POST["submit"])){
        $fname = $_POST["fname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);


        
        // $sql = "SELECT * FROM tbl_sched WHERE room_id = '$room' AND day_id = '$day' AND  ('$st' BETWEEN start_time AND end_time
        //         OR '$en' BETWEEN start_time AND end_time OR '$st' >= end_time AND '$en' <= end_time)";
        // $stmt = $dbs->query($sql);
        // $result = $stmt->fetchAll();
        // if(empty($result)){
        // }else{
        // }

        try {
            $database = new Connection();
            $dbs = $database->open();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `tbl_users`(`user_fullname`, `user_email`, `user_name`, `user_pass`) VALUES ('$fname','$email','$username','$pass')";
            $conn->exec($sql);
            echo "New record created successfully";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
        header("location: ../login.php?error=success");
    }else{
        header("location: ../login.php?error=error");
    }
?>