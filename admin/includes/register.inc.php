<?php
include("connect.php");
include("connection.php");
$connect = mysqli_connect("localhost", "root", "", "schooldb");

if(isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"]; // Added role field
    
    try {
        $database = new Connection();
        $dbs = $database->open();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `tbl_users`(`user_fname`, `user_email`, `user_name`, `user_pass`, `user_role`) VALUES ('$fname','$email','$username','$pass', '$role')";
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
