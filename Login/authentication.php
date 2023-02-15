<?php
session_start();
include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
        $sql = "SELECT id,Name FROM users WHERE Email ='$email' AND Password = '$password' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row){
            $_SESSION['mail'] = $email;
            header("Location: http://localhost/address_book/Home/Home.php");
            exit;       
        }
        else{
            header("Location: http://localhost/address_book/Registration/Registration.php");
            exit;
        }
  
}
?>
