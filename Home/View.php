<?php
session_start();
$mail = $_SESSION['mail'];
if(!isset($_SESSION['mail'])){
  header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
  exit;
}
include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';
$sql1 = "SELECT id FROM users WHERE Email = '$mail'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$id = $row['id'];

$sql = "SELECT * FROM contacts WHERE userId = $id";
$execute = $conn->query($sql);
// $count = $execute->fetch_assoc();
if(isset($_POST['logout'])){
   session_destroy();
   header('Location: http://localhost/ADDRESS_BOOK/Login/Login.php');
   exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">    

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous">
          </script>
<nav class="navbar navbar-expand-lg" style="background-color: #3979d9;height:11.2vh;" >
        <div class="container-fluid"  >
          <a href = "http://localhost/address_book/Home/Home.php" class="navbar-brand" >Address Book</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <form method="post">
           
              <input type="submit" class="dropdown-item" name="logout"  value = "Logout"/>
            
          </form>
          </div>
        </div>
      </nav>
    <h1 class="text-center" style="color:rgb(39, 114, 226);margin-top:50px;">Contacts</h1>
    <table class="table table-primary table-striped text-center align-middle" style="margin:30px 0 0  90px;width: 85vw;">
        <tr>
            
            <th>Sl.No</th>
            <th>Name</th>
            <th>Avatar</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
       
            <?php
            
                 $i=1;
                if($execute->num_rows > 0){
                    while($count = $execute->fetch_assoc()){
                    echo " <tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>". $count['Name']."</td>";
                    echo "<td><img src='./images/". $count['Avatar_name']."'height='100' width='150' style='border-radius:50px'/></td>";
                    echo "<td>". $count['Email']."</td>";
                    echo "<td>". $count['Mobile']."</td>";
                    echo "<td>". $count['Address']."</td>";
                    echo "<td><a style='text-decoration:none;' href='Update.php?id=" . $count['contactsId'] . "'>
                      <button class='btn btn-primary'>Edit</button>
                    </a>
                    <a style='text-decoration:none;' href='Delete.php?id=" . $count['contactsId'] . "'>
                      <button class='btn btn-danger'>Delete</button>
                    </a>
                    </td>";            
                    echo "</tr>";
                    }
             
                }
              
            ?>
           
           
        
    </table>
</body>
</html>
