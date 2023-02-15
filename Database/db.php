
<?php
$servername = "localhost";
$username = "root";
$password = "rootpassword";
$dbname = "address_book";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
// $sql = "CREATE TABLE users (
// id INT(6) UNSIGNED AUTO_INCREMENT  NOT NULL PRIMARY KEY,
// Name VARCHAR(50) NOT NULL,
// Email VARCHAR(50) NOT NULL,
// Mobile VARCHAR(10) NOT NULL,
// Password VARCHAR(30) NOT NULL
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table users created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// Creation of Contacts table

// $sql1 = "CREATE TABLE contacts (
//   contactsId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//   userId INT(6) UNSIGNED NOT NULL,
//   Avatar VARCHAR(100) NOT NULL, 
//   Name VARCHAR(50) NOT NULL,
//   Email VARCHAR(50) NOT NULL,
//   Mobile VARCHAR(10) NOT NULL,
//   Address VARCHAR(100) NOT NULL,
//   FOREIGN KEY (userId) REFERENCES users(id)
 
//   )";
  
//   if ($conn->query($sql1) === TRUE) {
//     echo "Table contacts created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }


?>