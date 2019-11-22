<?php
session_start();
if(isset ($_SESSION["username"])){
	header("Location: http://localhost/Web/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="/CSS/signin.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        .card-body {
            position: relative;
        }

        h4::before {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            left: 10px;
            top: 5%;
            /* z-index: 2; */
        }

        h4::after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            right: 10px;
            top: 5%;

        }

        hr {
            border: 1px solid white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-custom my-5">
                    <!-- <img class="card-img-top image-background" src="/Image/signinimg.png"
                            style="max-width:100%;height:auto;"> -->


                    <div class="card-body">
                        <h4 class="card-title text-center text-white">Sign In</h4>
                        <form action="" method="POST" class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username"
                                    required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>


                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"
                                    required>
                                <label for="inputPassword">Password</label>
                            </div>


                            <div class="custom-control custom-checkbox mt-4 mb-2 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember password
                                </label>
                            </div>


                            <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercase my-3">Sign
                                in</button>
							
							<?php
								if (isset($_POST["username"]) && isset($_POST["password"])) {
									$username = $_POST["username"];
									$password = $_POST["password"];
									$sql = "SELECT * FROM account_admin WHERE username = '$username' AND password = '$password'";
									require_once("../conn.php");
									
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										$_SESSION["username"] = $username;
										header("Location: ../Admin/index.php");
									} else {
											$username = $_POST["username"];
											$password = $_POST["password"];
											$sql = "SELECT * FROM account_customer WHERE username = '$username' AND password = '$password'";
											require_once("../conn.php");
											
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												$_SESSION["username"] = $username;
												header("Location:../index.php");
											} else {
												echo "Login Failed";
											}
									}
									
								}
							?>

                            <a href="signup.php" style="color: white;">I don't have an account</a>

                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                    class="fab fa-google mr-2"></i> Sign in with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                    class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>