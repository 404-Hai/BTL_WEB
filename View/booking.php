<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Booking</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>

    <style>
        #brand-name {
            color: #F2EEEB;
            font-family: 'Quicksand', sans-serif;
        }

        .btn-booking {
            background-color: #f6e58d;
            color: #535c68;

        }

        .btn-booking:hover {
            background-color: #f9ca24;

        }

        .error {
            color: red !important;
        }

        .error-text {
            border: 1px solid red !important;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a id="brand-name" class="navbar-brand mx-auto" href="/index.php">The Dreamer Hotel</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
			<!-- Chưa kiểm tra trường hợp ẩn đi khi có session
			
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="/Controller/signup.php?id=<?php echo $row["id"] ?>">Regsiter

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/Controller/signin.php?id=<?php echo $row["id"] ?>">Sign in</a>
						</li>
					</ul>
				</div>
			-->
			
          
			
        </div>
    </nav>
    <form id="formconfirm" action="../Controller/addinforoom.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <!-- Page Content -->
        <div class="container">

            <div class="row">
			<!--Lấy id từ phòng đang chọn để set thông tin phòng đang chọn -->
			<?php
								
						if (isset($_GET["id"])) {
							$id = $_GET["id"];
							require_once("../conn.php");
							$sql = "SELECT * FROM room,bangtam WHERE id = $id";
							$result = $conn->query($sql);
							if ($result->num_rows == 1) {
								$row = $result->fetch_assoc();
								$name = $row["name"];
								$brand = $row["brand"];
								$price = $row["price"];
								$image = $row["image"];
								$checkin = $row["checkin"];
								$checkout = $row["checkout"];
								$soluong = $row["number"];
								$ngay = ((int)substr( $checkout,0,2))-((int)substr( $checkin,0,2));
							}
					}
			?>

                <!-- Post Content Column -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <h1 class="mt-4" style="font-family: Montserrat, sans-serif">Your Booking Details</h1>

                    <hr>

                    <p class="text-center">Hãy xác nhận thông tin để đặt phòng</p>

                    <hr>

                    <!-- Preview Image -->
                    <div class="container-fluid" style="height: 400px;">
                        <?php
            
								if (isset($_GET["id"])) {
								 echo '<img id="expandImg" style="width:100%; height: 400px ;" class="img-fluid" src="../uploads/' . $image . '">';
								}
						?>
                    </div>
                    <div class="mt-3 font-weight-bold">Phòng bạn đặt là:<input name="brand" value=" <?php echo $row["brand"] ?>" readonly> <a class="font-italic font-weight-light"
                            href="/View/Phong/index.php" style="text-decoration: underline ; font-size: 12px;">Bạn có
                            muốn
                            đổi phòng?</a>
                    </div>


                    <hr>
					<!--Lấy thông tin checkin checkout -->
					
					
                    <div class="card my-3">
                        <div class="card-body">
                            <p class="card-text"><b>Check-in:</b>
                               <input name="checkin" value="<?php echo $row["checkin"]  ?>" size="8" readonly>,  2:00 PM
                                <br><b> Check-out: </b>
                                <input name="checkout" value="<?php echo $row["checkout"]  ?>" size="8" readonly>,  12:00 PM

                        </div>
                    </div>
					<!-- Lấy thông tin phòng đang chọn     -->
					
                    <div class="card my-3">
                        <div class="card-header">
                            Your price summary (Chưa tính dịch vụ đi kèm)
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <p class="card-text"> 
											Tên phòng: <input name="tenphong" value=" <?php echo $row["name"] ?>"readonly>
										</p>
                                        <p class="card-text"><b> Total length of stay:</b></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="card-text">Gía phòng <?php echo $price ?>$</p>
                                        <p class="card-text">Số ngày ở:
										<?php echo $ngay?>
										</p>
										<p class="card-text">Số lượng phòng:
										<input name="soluong" size="1" value="<?php echo $soluong ?>" readonly>
										</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex">
                            <h5>Price</h5>
                            <div class="text-muted ml-auto">
								<b >
									<input name="giaphong" value="<?php echo $price*$ngay*$soluong ?>" readonly>
								</b>$
                            </div>
                        </div>

                    </div>


                    <!-- Post Content -->
                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">
				<!--Kiểm tra nếu có session sẽ tự thêm thông tin vào-->	
				<?php
					if (isset($_SESSION["username"])){
						$user = $_SESSION['name'];
						require_once("../conn.php");
						$sql = "SELECT * FROM account_customer WHERE username='$user'";
						$result = $conn->query($sql);
						if($result->num_rows ==1){
							$row = $result->fetch_assoc();
							$taikhoan = $row["username"];
							$sdt = $row["numberphone"];
							$ten = $row["name"];
							$ngaysinh = $row["birthday"];
						
					
                ?>	
                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Thông tin của bạn</h5>
                        <div class="card-body">
                            <div class="form-row ">
                                
                                    <label for="firstname">Name</label>
                                    <input type="text" class="form-control" id="firstname" name="nameuser" value="<?php echo $ten?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This Field cannot be empty.
                                    </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                        value="<?php echo $taikhoan?>" required>
                                    <div class="invalid-feedback">
                                        Please Enter a valid email ID
                                    </div>
                                    <div class="valid-feedback">
                                        Looks Good!.
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmEmail">Confirm email</label>
                                    <input type="email" class="form-control" id="confirmEmail" value="<?php echo $taikhoan?>" required>
                                    <div id="validate" class="valid-feedback">
                                        Emails should match
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <label for="mobile">Phone</label>
                                <input type="tel" pattern=".{10}" class="form-control" id="phone" name="phone" oninput="check(this)"
                                    value="<?php echo $sdt?>"required>
                                <div class="valid-feedback">
                                    Looks Good!.
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid number.
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-booking btn-block" data-toggle="tooltip" data-placement="top"
                                title="I want this room!" type=" submit">Book</button>

                        </div>
                    </div>
					<?php
						}
					}else{
					?>
					<div class="card my-4">
                        <h5 class="card-header">Thông tin của bạn</h5>
                        <div class="card-body">
                            <div class="form-row ">
                                
                                    <label for="firstname">Name</label>
                                    <input type="text" class="form-control" id="firstname" name="nameuser" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This Field cannot be empty.
                                    </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                        value="" required>
                                    <div class="invalid-feedback">
                                        Please Enter a valid email ID
                                    </div>
                                    <div class="valid-feedback">
                                        Looks Good!.
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmEmail">Confirm email</label>
                                    <input type="email" class="form-control" id="confirmEmail" value="" required>
                                    <div id="validate" class="valid-feedback">
                                        Emails should match
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <label for="mobile">Phone</label>
                                <input type="tel" pattern=".{10}" class="form-control" id="phone" name="phone" oninput="check(this)"
                                    value=""required>
                                <div class="valid-feedback">
                                    Looks Good!.
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid number.
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-booking btn-block" data-toggle="tooltip" data-placement="top"
                                title="I want this room!" type=" submit">Book</button>

                        </div>
                    </div>
					<?php
					}					
					?>

                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header"> Dịch vụ đi kèm</h5>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex px-3">
                                    <div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="50" name="duadon"
                                                    id="duadonsanbay">
                                                <label class="form-check-label" for="duadonsanbay">
                                                    Đưa đón sân bay
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-auto"> 50$</div>
                                </li>
                                <li class="d-flex px-3">
                                    <div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="20" name="buffet" id="buffet">
                                                <label class="form-check-label" for="buffet">
                                                    Buffet
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-auto"> 20$</div>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Thông tin liên quan</h5>
                        <div class="card-body">
                            <a href="/View/about.php#otherRule" class="badge badge-info btn-block p-3"
                                style="font-size: 18px;">Nội quy khách
                                sạn</a>
                            <a href="/View/rulebooking.php" class="badge badge-secondary btn-block p-3"
                                style="font-size: 18px;">Quy định đặt phòng</a>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </form>
    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark pt-4 w-100">



        <div class="bg-dark p-3 text-light">
            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <button class="btn btn-facebook btn-link btn-icon-only btn-circle waves-effect ">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                </li>
                <li class="list-inline-item">
                    <button class="btn btn-twitter btn-link btn-icon-only btn-circle waves-effect waves-teal text-info">
                        <i class="fab fa-twitter"></i>
                    </button>
                </li>
                <li class="list-inline-item">
                    <button
                        class="btn btn-google btn-link btn-icon-only btn-circle waves-effect waves-red btn-lg text-danger">
                        <i class="fab fa-google-plus-g"></i>
                    </button>
                </li>
            </ul>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="color: #BDC581; ">© 2019 Copyright: Khách sạn
                người
                mơ
            </div>
            <!-- Copyright -->
        </div>
    </footer>
    <!-- Footer -->
    <script>
        function check(input) {
            if (input.length != 10)
                return false;
            return true;
        }



        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        var email = $("#email").val();
                        var confirmemail = $("#confirmEmail").val();
                        if (email !== confirmemail) {
                            form.classList.add('was-validated');
                            $("#validate").php("Email Should Match");
                            $("#validate").addClass("error");
                            $("#confirmEmail").addClass("error-text");
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            form.classList.add('was-validated');
                            $("#validate").removeClass("error");
                            $("#confirmEmail").removeClass("error-text");
                            $("#validate").php("Looks Good!");
                        }
                    }, false);
                });
            }, false);
        })();


        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>