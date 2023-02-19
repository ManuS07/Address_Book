<?php
include_once 'C:/XAMPP/htdocs/address_book/Database/db.php';
$name_error = "";
$email_error = "";
$mobile_error = "";
$password_error = "";
$conpassword_error = "";
$emailId_error="";
$is_valid = true;
?>
<script type="text/JavaScript">
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
<?php
if(isset($_POST['signup'])){
    $name = $_POST['full_name'];
    $email = $_POST['emailId'];
    $mobile = $_POST['mobile_no'];
    $password = $_POST['security'];
    
    $sql = "SELECT id FROM users WHERE Email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row){
        $emailId_error = "Email already used";
        $is_valid = false;

    }

    

    if (!preg_match('/^[\p{L} ]+$/u', $name)) {
        $name_error = "Name must contain only letters";
        $is_valid = false;
      }
  
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
        $is_valid = false;
      }
  
      
      if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobile_error = "Mobile must contain 10 digits";
        $is_valid = false;
      }
  
      if (!preg_match("/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+=-])(?=.*[0-9]).{8,}$/", $password)) {
        $password_error = "Password must contain at least one upper-case letter, one special character and a minimum of 8 characters";
        $is_valid = false;
      }
   

      if($is_valid){
        $sql = "INSERT INTO users (Name,Email,Mobile,Password) VALUES ('$name','$email','$mobile','$password')";
        $conn->query($sql) ;
       
     
        echo '<script>alert("Registration successful");
        window.location.href =" http://localhost/ADDRESS_BOOK/Login/Login.php";
        </script>';
     
            

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
    <link rel="stylesheet" href="Registration.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <div class="container">
        <div class="left">
            <img src="https://static.vecteezy.com/system/resources/previews/003/689/228/non_2x/online-registration-or-sign-up-login-for-account-on-smartphone-app-user-interface-with-secure-password-mobile-application-for-ui-web-banner-access-cartoon-people-illustration-vector.jpg"
            style="height:65vh ;width:40vw;margin:80px 0 0 10px">
        </div>
        <div class="right">
            <div class="container-fluid" style="min-height: 50vh;">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <h1 class="text-center" style="color:rgb(39, 114, 226)">SIGN UP</h1>
                        <form  method="post">
                            <div >
                                <label>Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Enter  name"
                                    maxlength="50" required>
                                    <span class="error" style="color:red;"><?php echo $name_error; ?></span>
                            </div>
                           
                            <div>
                                <label>Email</label>
                                <input type="text" name="emailId" class="form-control" placeholder="me@example.com"
                                    minlength="5" maxlength="50" required>
                                    <span class="error" style="color:red;"><?php echo $email_error; ?></span>
                            </div>
                            <div>
                                <label>Mobile Number</label>
                                <input type="number" name="mobile_no" class="form-control" minlength="10" maxlength="10"
                                    required>
                                    <span class="error" style="color:red;"><?php echo $mobile_error; ?></span>
                            </div>

                            <div>
                                <label>Password</label>
                                <input type="password" id= "password" name="security" class="form-control" minlength="8" maxlength="25"
                                    required>
                                    <input type= "checkbox" onClick = "myFunction()" >Show Password</input><br>
                                    <span class="error" style="color:red;"><?php echo $password_error; ?></span>
                            </div>
                            
                            <div>
            
                                <div class="d-grid mt-4">
                                    <input type="submit" name="signup" class="btn btn-primary shadow" id="btn-login"  value="Sign Up"
                                        style="background-color:rgb(39, 114, 226)" >
                                        <span class="error" style="color:red;"><?php echo $emailId_error; ?></span>

                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

