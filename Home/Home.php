<?php
session_start();
$mail = $_SESSION['mail'];
if(!isset($_SESSION['mail'])){
  header("Location: http://localhost/ADDRESS_BOOK/Login/Login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
    <link rel="stylesheet" href="Home.css">

   
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
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right:70px;">
            <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
          </a>
          <form method="post">
            <ul class="dropdown-menu" >
              <li><input type="submit" class="dropdown-item" name="add" value = "Add Contacts"/></li>
              <li><input type="submit" class="dropdown-item" name="view" value = "View Contacts"/></li>
            </ul>
          </form>
          </div>
        </div>
      </nav>
</body>
</html>
<?php
if(isset($_POST['add'])){
  header("Location: http://localhost/ADDRESS_BOOK/Home/Add.php");
  exit;
}
if(isset($_POST['view'])){
  header("Location: http://localhost/ADDRESS_BOOK/Home/View.php");
  exit;
}
?>