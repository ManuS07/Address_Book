<?php
session_start();
$mail = $_SESSION['mail'];
if(!isset($_SESSION['mail'])){
  header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
  exit;
}include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';
if(isset($_GET['id'])) 
{
$id = $_GET['id'];
$sql = "SELECT  Name, Email, Mobile, Address FROM contacts WHERE contactsId = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
}

if(isset($_POST['Update'])){
    $name = $_POST['fullname'];
    $email = $_POST['EmailId'];
    $mobile = $_POST['mobileNo'];
    $address = $_POST['address'];
    $sql = "UPDATE contacts SET Name= '$name', Email = '$email', Mobile = '$mobile' , Address = '$address' WHERE contactsId = $id  ";
    if($conn->query($sql)){
        
        header("Location: http://localhost/ADDRESS_BOOK/Home/View.php");
        exit;
    }
   



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="Add.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand-lg" style="background-color: #3979d9;" >
        <div class="container-fluid"  >
          <a href = "http://localhost/address_book/Home/Home.php" class="navbar-brand" >Address Book</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right:70px;">
            <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
          </a>
          
            <ul class="dropdown-menu" >
                <a href="View.php" style="text-decoration:none;"><li><input type="submit" class="dropdown-item" name="viewcontact" value = "View Contacts"/></li>
                </a>

            </ul>
          
          </div>
</ul>
</nav>
    <div class="container">
       
            <div class="container-fluid" style="min-height: 50vh;">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <h1 class="text-center" style="color:rgb(39, 114, 226)">Update Contact</h1>
                        <form  method="post">
                            <div >
                                <label>Name</label>
                                <input type="text" name="fullname" class="form-control" 
                                    maxlength="50"  value=<?php echo $row['Name']?> required>
                            </div>
                           
                            <div>
                                <label>Email</label>
                                <input type="email" name="EmailId" class="form-control" placeholder="me@example.com"
                                    minlength="5" maxlength="50" value=<?php echo $row['Email']?> required>
                            </div>
                            <div>
                                <label>Mobile Number</label>
                                <input type="number" name="mobileNo" class="form-control" minlength="5" maxlength="50"
                                value=<?php echo $row['Mobile']?> required>
                            </div>

                            <div>
                                <label>Address</label>
                                <textarea  name="address" class="form-control" 
                                required >
                                <?php echo $row['Address']?> 
                                </textarea>
                            </div>
                            <div>
            
                                <div class="d-grid mt-4">
                                    <input type="submit" name="Update"  class="btn btn-primary shadow" id="btn-login" value="Update"
                                        style="background-color:rgb(39, 114, 226)">
                                </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php

?>

