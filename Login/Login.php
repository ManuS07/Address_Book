
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <div class="all">
        <div class="left">
            <img src="https://static.vecteezy.com/system/resources/previews/009/734/274/large_2x/illustration-of-people-trying-to-solve-the-puzzle-of-security-problems-with-data-security-and-encryption-technology-design-can-be-for-landing-page-website-poster-banner-mobile-apps-web-social-media-free-vector.jpg"
                style="height:65vh ;width:40vw;margin:10%;">

        </div>


        <div class="container-fluid" style="min-height: 60vh;">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h1 class="text-center" style="color:rgb(39, 114, 226)">Login</h1>
                    <form action = 'authentication.php' method="post">
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="me@example.com"
                                minlength="5" maxlength="50" required>
                        </div>
                        <br>
                        <div>
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" minlength="8" maxlength="25"
                                required>
                        </div>

                        <div class="sub">
                            <input type="submit" name="login" class="btn" id="btn-login"
                                style="color:white;background-color: rgb(39, 114, 226);padding: 10px;border-radius:15px;"
                                value="Log in">


                        </div>
                      
                    </form>
                </div>
            </div>
        </div>

    </div>


</body>

</html>

