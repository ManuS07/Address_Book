<?php

include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM contacts WHERE contactsId = $id";
    if ($conn->query($sql)) {
      echo '<script>alert("Deleted successfully");
      window.location.href =" http://localhost/ADDRESS_BOOK/Home/View.php";
     </script>'; 
        
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    
  }

?>