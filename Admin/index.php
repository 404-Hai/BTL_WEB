<?php
require_once("../Controller/checkSignin.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/7b3b63fc99.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway&display=swap" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .active {
            color: aliceblue;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>

<body>
    <nav class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading"> Administration </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action active" id="manage-home">Trang
                    chủ</a>
                <a href="#" class="list-group-item list-group-item-action" id="manage-room">Phòng</a>
                <a href="#" class="list-group-item list-group-item-action" id="manage-order">Đặt phòng</a>
                <a href="#" class="list-group-item list-group-item-action" id="manage-offer">Ưu Đãi</a>
                <a href="#" class="list-group-item list-group-item-action" id="manage-manage">Thống kê</a>
                <a href="#" class="list-group-item list-group-item-action" id="manage-account">Tài
                    khoản</a>
                <!-- tao cai session dang xuat giong trong phong lab -->
                <a href="../Controller/logout.php" class="list-group-item list-group-item-action " id="logout">Đăng xuất</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-info " id="menu-toggle">Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <h5 class="text-center">Admin</h5>
                                <!-- cho nay nho sua lai nhu trong phong lab -->
                                <a class="dropdown-item" href="#">Trang chủ</a>
                                <div class="dropdown-divider"></div>
                                <!-- cho nay setting lai session la khach -->
                                <a class="dropdown-item" href="../index.php">Xem với tư cách là khách</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="admin-show-content"></div>
        </div>

        <!-- /#page-content-wrapper -->

        <!-- /#wrapper -->

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            // When we click on the LI
            $("#sidebar-wrapper a").click(function () {
                // If this isn't already active
                if (!$(this).hasClass("active")) {
                    // Remove the class from anything that is active
                    $("a.active").removeClass("active");
                    // And make this active
                    $(this).addClass("active");
                    if ($(this).is("#manage-home")) {
                        $("#admin-show-content").load("adminhome.php");
                    } else if ($(this).is("#manage-room")) {
                        $("#admin-show-content").load("adminroom.php");
                    } else if ($(this).is("#manage-offer")) {
                        $("#admin-show-content").load("adminoffer.php");
                    } else if ($(this).is("#manage-manage")) {
                        $("#admin-show-content").load("adminmanage.php");
                    } else if ($(this).is("#manage-account")) {
                        $("#admin-show-content").load("adminaccount.php");
                    } else if ($(this).is("#manage-order")) {
                        $("#admin-show-content").load("adminorder.php");
                    }
                }
            });
            //load home page
            $("#admin-show-content").load("adminhome.php");
        </script>
</body>

</html>