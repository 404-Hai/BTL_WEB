<?php
require_once("../Controller/checkSignin.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #brand-name {
            color: #8c4830;
            font-family: "Quicksand", sans-serif;
        }

        #nav-bar {
            background-color: #f2eeeb !important;
        }
    </style>

</head>

<body>
    <!-- navigation -->
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <a id="brand-name" class="navbar-brand mx-auto" href="/index.php">The Dreamer Hotel</a>
    </nav>
    <!-- page conetent -->
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card border-light my-5">
                    <div class="card-header">
                        <ul class="nav nav-pills mb-3 justify-content-around" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard" data-toggle="pill" href="#dashboard-content"
                                    role="tab" aria-controls="dashboard-content" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="history" data-toggle="pill" href="#history-content" role="tab"
                                    aria-controls="history-content" aria-selected="false">History</a>
                            </li>
                            <li class="nav-item">
                                <a href="../Controller/logout.php" class="nav-link btn btn-outline-danger" style="cursor: pointer;" id="logout">Log
                                    out</a>
                            </li>
                        </ul>
                    </div>
					
                    <div class="card-body">
					<?php
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
						}
						
					?>
                        <h5 class="card-title text-center text-uppercase">
                            <?php echo $user ?>
                        </h5>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="dashboard-content" role="tabpanel"
                                aria-labelledby="dashboard">
                                <!-- dashboard content -->
                                <div class="container-fluid d-flex">
                                    <div class="card w-100 border-info mb-3 mx-auto">
                                        <div class="card-header bg-secondary">
                                            <h5 class="card-title text-uppercase text-light">
                                                Your information
                                            </h5>
                                        </div>
                                        <!-- card header -->
                                        <form action="../Controller/addinforoom.php" method="POST" enctype="multipart/form-data">
                                            <div class="card-body bg-dark text-info">
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Profile Picture:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <img src="/Image/anonymous.png" class="mx-auto"
                                                            style="width:100px; height:100px; ;" alt="" />
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Name:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class="text-center mx-auto">
															<?php echo $ten ?>
														</div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Email:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class="text-center mx-auto">
															<?php echo $taikhoan ?>
														</div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Phone:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class="mx-auto"> <input type="number" name="phone"
                                                                id="phonenumber" class="form-control" value="<?php echo $sdt ?>"
                                                                required /></div>

                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                        Your Birthday:
                                                    </div>

                                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 d-flex">
                                                        <div class=" mx-auto">
                                                            <!-- echo vo o value -->
                                                            <input type="date" name="birthday" id="inputbirthday"
                                                                class="form-control" value="<?php echo $ngaysinh ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ">
                                                    <button type="submit"
                                                        class="btn btn-info btn-block w-50 mx-auto">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- card body -->
                                    </div>
                                    <!-- card -->
                                </div>
                                <!-- cotianer -->
                            </div>
                            <!-- history -->
                            <div class="tab-pane fade" id="history-content" role="tabpanel" aria-labelledby="history">
                                <div class="container-fluid d-flex">
								
                                    <div class="card w-100 border-info mb-3 mx-auto">
                                        <div class="card-header bg-secondary">
                                            <h5 class="card-title text-uppercase text-light">
                                                Your history
                                            </h5>
                                        </div>
                                        <!-- card header -->

                                        <div class="card-body bg-dark text-info">
                                            Lịch sử đặt phòng của bạn
                                            <table class="table table-light table-bordered table-striped my-3">
													
                                                <thead>
                                                    <tr>
                                                        <th>Ngày đặt</th>
                                                        <th>Ngày trả</th>
                                                        <th>Phòng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
													
													require_once("../conn.php");
													$sql = "SELECT *FROM info
														WHERE email='$user' ";
													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														// output data of each row
														while($row = $result->fetch_assoc()) {
															
													
													?>		
															<tr >
															
																<td><?php echo $row["checkin"]?></td>
																<td><?php echo $row["checkout"]?></td>
																<td><?php echo $row["brand"]?></td>
																
															</tr>
													<?php 
														}
													}
													?>
                                                </tbody>
											
                                            </table>
												
                                        </div>
                                        <!-- card body -->
                                    </div>
                                    <!-- card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>



</html>