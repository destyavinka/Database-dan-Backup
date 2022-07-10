<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $order_name = mysqli_real_escape_string($db, $_POST['order_name']);
    $price_order = $_POST['order_price'];
    $quant_order = $_POST['order_quant'];

    mysqli_query($db, "UPDATE tb_dataorder SET order_name='$order_name', order_price=$price_order ,order_quantity=$quant_order WHERE order_id=$order_id");
    header("Location:dataorder.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

    $order_id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM tb_dataorder WHERE order_id=" . $_GET['id']);

    $row = mysqli_fetch_array($result);

    if ($row) {

        $order_id = $row['order_id'];
        $order_name = $row['order_name'];
        $price_order = $row['order_price'];
        $quant_order = $row['order_quantity'];
    } else {
        echo "No results!";
    }
}
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Input Material</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
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
    <div class="row justify-content-center">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="edit_dataorder.php">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control form-control-line" placeholder="Jenis Material" name="order_id" value="<?php echo $order_id; ?>">
                            </div>
                            <label class="col-md-12" for="name"></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" placeholder="Jenis Material" name="order_name" value="<?php echo $order_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Harga</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" placeholder="Harga" name="order_price" value="<?php echo $price_order; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Jumlah</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" placeholder="Jumlah" name="order_quant" id="quant" min="1" max="" value="<?php echo $quant_order ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit" name="submit">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>