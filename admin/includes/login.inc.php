<?php
include_once "connect.php";

if (isset($_POST["login"])){
$user=$_POST["username"];
$pass=$_POST["password"];

$statement=$conn->prepare("SELECT * FROM tbl_users WHERE user_name = :username");
$statement->bindParam(':username', $user);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

$userm = $user["user_name"];
$password = $user["user_pass"];

$checkpass=password_verify($pass, $password);

if($checkpass === false){
// if (password_verify($pass, $user['password'])) {
    header("location:../login.php?error=wrongpass");
exit;
}else{
    session_start();
    $_SESSION['login']=$user["user_id"];
    header("location:../index.php?error=success");
    exit;
    
}

}

?>