<?php
session_start();
$mail = $_SESSION['mail'];
include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';
$sql1 = "SELECT id FROM users WHERE Email = '$mail'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();


if(isset($_POST['AddContacts'])){
    $name = $_POST['fullname'];
    $email = $_POST['EmailId'];
    $mobile = $_POST['mobileNo'];
    $address = $_POST['address'];
    $userId = $row['id'];
   

   

    $sql = "INSERT INTO contacts (userId,Name,Email,Mobile,Address) VALUES ($userId,'$name','$email','$mobile','$address')";
     if($conn->query($sql)===TRUE){
        header("Location: Home.php");
     }
     else{
      echo "Error: " . $sql . ":-" . $conn->error;
     }
 
  
     
}
?>