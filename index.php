<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="Welcome.css">


</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous">
          </script>
    <nav class="navbar navbar-expand-lg" style="background-color: #3979d9;" >
        <div class="container-fluid"  >
          <a class="navbar-brand" >Address Book</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <form method='post' style=" position: absolute;top: 40x;right: 90px;cursor:pointer;">
          <input name="in"  type='submit' value=" Login"
                style="margin-right:10px;background-color: white; border-radius:20px;color: black;font-size: 12pt;padding:10px;border:none;"/>

            <input name="create" type='submit' value='Sign Up'
                style="background-color: white; border-radius:20px;color: black;font-size: 12pt;padding: 10px;border:none;"/>
</form>
     
        
          </div>
        </div>
      </nav>

   
    
</body>
</html>

<?php
if(isset($_POST['in'])){
  header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
}
if(isset($_POST['create'])){
  header("Location: http://localhost/ADDRESS_BOOK/Registration/Registration.php");
}

?>        
