<?php
session_start();
$mail = $_SESSION['mail'];
if(!isset($_SESSION['mail'])){
  header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
  exit;
}
if(isset($_POST['close'])){
    session_destroy();
    header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
    exit;
}
if(isset($_POST['viewcontact'])){
    header("Location: http://localhost/ADDRESS_BOOK/Home/View.php");
    exit;
  }
  include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';
$sql1 = "SELECT id FROM users WHERE Email = '$mail'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$name_error = "";
$email_error = "";
$phone_error = "";
$address_error = "";                              
$is_valid = true;

if(isset($_POST['AddContacts'])){
    $name = $_POST['fullname'];
    $avatar = $_FILES["avatar"]["name"];
    $email = $_POST['EmailId'];
    $mobile = $_POST['mobileNo'];
    $address = $_POST['address'];
    $userId = $row['id'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $extensions_arr = array("jpg","jpeg","png","gif");
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["avatar"]["tmp_name"],$target_file);
    $imgContent = addslashes(file_get_contents($target_file)); 

     
    
   
    if (!preg_match('/^[\p{L} ]+$/u', $name)) {
      $name_error = "Name must contain only letters";
      $is_valid = false;
    }
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (!preg_match ($pattern, $email) ){  
            $email_error = "Email is not valid.";  
           $is_valid = false; 
    }    
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $phone_error = "Mobile must contain 10 digits";
        $is_valid = false;
      }
     
   
    if($is_valid){
      $sql = "INSERT INTO contacts (userId,Avatar,Avatar_name,Name,Email,Mobile,Address) VALUES ($userId,'$imgContent','$avatar','$name','$email','$mobile','$address')";
      if($conn->query($sql)===TRUE){
        echo '<script>alert("Added successfully");
        window.location.href =" http://localhost/ADDRESS_BOOK/Home/Home.php";
        </script>';  
      }
      else{
       echo "Error: " . $sql . ":-" . $conn->error;
      }

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
        <div class="container-fluid" >
          <a href = "http://localhost/address_book/Home/Home.php" class="navbar-brand" >Address Book</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right:75px;">
            <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
          </a>
          <form method="post">
            <ul class="dropdown-menu" style="padding:0px;">
                <li><input type="submit" class="dropdown-item" name="viewcontact" value = "View Contacts"/></li>
                <li><input type="submit" class="dropdown-item" name="close" value = "Logout"/></li>
            </ul>
          </form>
          </div>
</ul>
</nav>
    <div class="container">
       
            <div class="container-fluid" style="min-height: 50vh;">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <h1 class="text-center" style="color:rgb(39, 114, 226)">Add Contacts</h1>
                        <form  method="post" enctype="multipart/form-data">
                        <img id="image" height='100' width='150' style='border-radius:50px;margin-left:250px; margin-top:30px;border:none;'/>
                            <div >
                                <label>Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Enter  name"
                                    maxlength="50" required>
                                    <span class="error" style="color:red;"><?php echo $name_error; ?></span>
                            </div>
                            <div >
                                <label>Avatar</label>
                                <input type="file" id="avatar" name="avatar" class="form-control" placeholder="Choose file" onChange="showAvatar()"
                                 required>
                                 
                            </div>
                           
                            <div>
                                <label>Email</label>
                                <input type="text" name="EmailId" class="form-control" placeholder="me@example.com"
                                    minlength="5" maxlength="50" required>
                                    <span class="error" style="color:red;"><?php echo $email_error; ?></span>
                            </div>
                            <div>
                                <label>Mobile Number</label>
                                <input type="number" name="mobileNo" class="form-control" 
                                    required>
                                    <span class="error" style="color:red;"><?php echo $phone_error; ?></span>
                            </div>

                            <div>
                                <label>Address</label>
                                <textarea type="text" name="address" class="form-control"  required></textarea>

                               
                            </div>
                            <div>
            
                                <div class="d-grid mt-4 mb-5">
                                    <input type="submit" name="AddContacts"  class="btn btn-primary shadow" id="btn-login" value="Add"
                                        style="background-color:rgb(39, 114, 226)">
                                </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script type="text/Javascript">
  function showAvatar(){
      image.src=URL.createObjectURL(event.target.files[0]);
  }
</script>