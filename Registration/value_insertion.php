<?php
include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';


if(isset($_POST['signup'])){
    $name = $_POST['full_name'];
    $email = $_POST['emailId'];
    $mobile = $_POST['mobile_no'];
    $password = $_POST['security'];

    $sql = "INSERT INTO users (Name,Email,Mobile,Password) VALUES ('$name','$email','$mobile','$password')";
     $conn->query($sql) ;
   //   {
   //      echo "New record has been added successfully !";
   //   } 
   //   else {
   //      echo "Error: " . $sql . ":-" . $conn->error;
   //   }
   header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
   exit;
     
}
?>