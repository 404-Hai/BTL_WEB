<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phòng</title>
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
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>
    </script>
    <!-- <link rel="stylesheet" href="/CSS/modal.css"> -->
    <style>
        #room-content a {
            background-color: #f6e58d;
            color: #535c68;
        }

        #room-content a:hover {
            background-color: #f9ca24;
        }
    </style>
</head>

<body>
    <div class="jumbotron text-center noselect"
        style="height: 40vh;;margin-bottom:0; background-image: url(/Image/logo.png);  background-position: center;background-repeat: no-repeat; background-size: cover; ">
    </div>

    <nav id="about-navbar" class="navbar navbar-expand-md bg-dark navbar-dark d-flex sticky-top w-100">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around align-item-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Controller/deletebangtam.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/View/about.php" id="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/View/about.php#otherContact" id="">
                        Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/View/about.php#otherRule" id="">
                        Nội quy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/View/booking.php">Đặt phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/View/account.php">Tài khoản</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/View/rulebooking.php">
                        Quy định đặt phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#!">
                        Phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/View/offer.php">
                        Ưu đãi</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="room-content" class="container">

        <!-- Page Heading -->
        <h1 class="my-4 text-center text-uppercase border border-warning rounded p-3">Danh sách phòng
        </h1>

        <!-- single -->
        <div class="row">
			<?php
				require_once("../conn.php");
				$sql = "SELECT * FROM room WHERE brand='singleroom'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
				
			?>		
            <div class="col-md-7">
                <a href="/View/Phong/single.php?id=<?php echo $row["id"] ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" img src="/uploads/<?php echo $row["image"] ?>"
                        style="width: 700px; height: 400px;" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Phòng đơn</h3>
				<p>Mã phòng: <?php echo $row["name"]?></p>
				<p>Giá phòng: <?php echo $row["price"]?>$</p>
                <p>Phòng 1-2 người</p>
                <a class="btn btn-primary" href="/View/Phong/single.php?id=<?php echo $row["id"] ?>">View Room</a>
            </div>
			<?php
					}
				}
			?>
        </div>
        <!-- /.row -->
        <hr>
		<div class="row">
				<?php
					require_once("../conn.php");
					$sql = "SELECT * FROM room WHERE brand='doubleroom'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
					
				?>		
				<div class="col-md-7">
					<a href="/View/Phong/single.php?id=<?php echo $row["id"] ?>">
						<img class="img-fluid rounded mb-3 mb-md-0" img src="/uploads/<?php echo $row["image"] ?>"
							style="width: 700px; height: 400px;" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3>Phòng đôi</h3>
					<p>Mã phòng: <?php echo $row["name"]?></p>
					<p>Giá phòng: <?php echo $row["price"]?>$</p>
					<p>Phòng 2-4 người</p>
					<a class="btn btn-primary" href="/View/Phong/double.php?id=<?php echo $row["id"] ?>">View Room</a>
				</div>
				<?php
						}
					}
				?>
        </div>

        
        <hr>
		<div class="row">
			<?php
				require_once("../conn.php");
				$sql = "SELECT * FROM room WHERE brand='quadrupleroom'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
				
			?>		
            <div class="col-md-7">
                <a href="/View/Phong/single.php?id=<?php echo $row["id"] ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" img src="/uploads/<?php echo $row["image"] ?>"
                        style="width: 700px; height: 400px;" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Phòng tập thể</h3>
				<p>Mã phòng: <?php echo $row["name"]?></p>
				<p>Giá phòng: <?php echo $row["price"]?>$</p>
                <p>Phòng 4-8 người</p>
                <a class="btn btn-primary" href="/View/Phong/group.php?id=<?php echo $row["id"] ?>">View Room</a>
            </div>
			<?php
					}
				}
			?>
        </div>
		<hr>
		<div class="row">
			
				<?php
					require_once("../conn.php");
					$sql = "SELECT * FROM room WHERE brand='kingroom'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
					
				?>		
				<div class="col-md-7">
					<a href="/View/Phong/single.php?id=<?php echo $row["id"] ?>">
						<img class="img-fluid rounded mb-3 mb-md-0" img src="/uploads/<?php echo $row["image"] ?>"
							style="width: 700px; height: 400px;" alt="">
					</a>
				</div>
				<div class="col-md-5">
					<h3>Phòng king</h3>
					<p>Mã phòng: <?php echo $row["name"]?></p>
					<p>Giá phòng: <?php echo $row["price"]?>$</p>
					<p>Phòng 1-2 người</p>
					<a class="btn btn-primary" href="/View/Phong/king.php?id=<?php echo $row["id"] ?>">View Room</a>
				</div>
				<?php
						}
					}
				?>
		
        </div>
		<hr>

        
        <!-- /.row -->

    </div>
    <!-- /.container -->


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
            <div class="footer-copyright text-center py-3" style="color: #BDC581; ">© 2019 Copyright: Khách sạn người
                mơ
            </div>
            <!-- Copyright -->
        </div>
    </footer>
    <!-- Footer -->



    <script>
        $(".collapse.show").each(function () {
            $(this).prev(".card-header").addClass("highlight");
        });

        // Highlight open collapsed element 
        $(".card-header .btn").click(function () {
            $(".card-header").not($(this).parents()).removeClass("highlight");
            $(this).parents(".card-header").toggleClass("highlight");
        });
    </script>
</body>

</html>