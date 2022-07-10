<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
include 'config.php';
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Input Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php">Sistem Administrasi Pabrik</a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>

                            </li>
                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Materials</span></a>

                            <li class="active">
                                <a href="dataorder.php" aria-expanded="true"><i class="fa fa-book"></i>
                                    <span>Data Order</span></a>
                            </li>

                            </li>
                            <li>
                                <a href="user.php" aria-expanded="true"><i class="fa fa-user"></i>
                                    <span>User</span></a>

                            </li>
                            <li class="">
                                <a href="backup.php" aria-expanded="true"><i class="fa fa-recycle"></i>
                                    <span>Backup & Restore</span></a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="backup.php" aria-expanded="true"><i class="fa fa-download"></i>
                                            <span>Backup Data</span></a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="restore.php" aria-expanded="true"><i class="fa fa-upload"></i>
                                            <span>Restore Data</span></a>

                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->



        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div> -->
                    </div>

                    <!-- profile info & task notification-->
                    <div class="col-md-6 col-sm-4 clearfix">

                    </div>
                </div>
            </div>

            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Data Order</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                <?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="gantipassword.php">ganti password</a>
                                <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div>

                <h1 style="text-align:center">Tambahkan Data Order</h1>

                <body>
                    <div class="row justify-content-center">
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material mx-2" method="POST" action="addorder.php">
                                        <div class="form-group">
                                            <label class="col-md-12" for="name">Jenis Order</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" placeholder="Jenis Order" name="order_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Harga</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" placeholder="Harga" name="order_price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Jumlah</label>
                                            <div class="col-md-12">
                                                <input type="number" class="form-control form-control-line" placeholder="Jumlah" name="order_quant" id="order_quant" min="1" max="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Satuan</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" placeholder="Satuan" name="order_satuan" id="order_satuan" min="1" max="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success text-white" type="submit" name="add">Input</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </body>
                <div class="main-content-inner">
                    <div class="row">

                        <body class="bg-dark">
                            <div class="container mt-5">
                                <h1 class="text-center text-dark card=title">Data Order</h1>
                                <table class="table table-light table-striped border border-1 border-secondary">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Order</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $conn = new mysqli("localhost", "tima5_skd", "skd", "tima5_skd");
                                        $sql = "SELECT * FROM tb_dataorder";
                                        $result = $db->query($sql);
                                        $count = 0;
                                        if ($result->num_rows >  0) {

                                            while ($row = $result->fetch_assoc()) {
                                                $count = $count + 1;
                                        ?>


                                                <tr>
                                                    <th><?php echo $count ?></th>
                                                    <th><?php echo $row["order_name"] ?></th>
                                                    <th>$ <?php echo $row["order_price"]  ?></th>
                                                    <th><?php echo $row["order_quantity"]  ?></th>
                                                    <th><?php echo $row["order_satuan"]  ?></th>
                                                    <th>$ <?php echo $row["order_quantity"] * $row["order_price"]  ?></th>

                                                    <th> <a href="up" Edit></a><a href="edit_dataorder.php?id=<?php echo $row["order_id"] ?>">Edit</a>
                                                        <a href="up" Edit></a><a href="delete_dataorder.php?id=<?php echo $row["order_id"] ?>">Delete</a>
                                                    </th>


                                                </tr>
                                        <?php

                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>

                            </div>
                    </div>
                </div>
            </div>
            <div>


            </div>
        </div>
        <footer>
            <div class="footer-area">
                <p><a href="">Sistem Administrasi Pabrik</a> 2021-<?= date('Y') ?></p>
                </p>
            </div>
        </footer>
        <!-- Contextual Classes end -->

        <!-- main content area end -->

        <html>

        <head>
            <title>Add Order</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        </head>

        </html>

    </div>
    <!-- page container area end -->
    <!-- offset area start -->

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>