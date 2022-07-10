<?php

include('config.php');

if (isset($_POST['submit'])) {
    $id = $_POST['product_id'];
    $name = mysqli_real_escape_string($db, $_POST['product_name']);
    $price = $_POST['price'];
    $quant = $_POST['quant'];

    mysqli_query($db, "UPDATE tb_product SET product_name='$name', price=$price ,quantity=$quant WHERE product_id=$id");

    header("Location:table.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM tb_product WHERE product_id=" . $_GET['id']);

    $row = mysqli_fetch_array($result);

    if ($row) {

        $id = $row['product_id'];
        $name = $row['product_name'];
        $price = $row['price'];
        $quant = $row['quantity'];
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
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
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
                    <form class="form-horizontal form-material mx-2" method="POST" action="edit.php">
                        <div class="form-group">
                            <label class="col-md-12" for="name">Jenis Material</label>
                            <div class="col-md-12">
                                <input type="hidden" class="form-control form-control-line" placeholder="Jenis Material"
                                    name="product_id" value="<?php echo $id; ?>">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" placeholder="Jenis Material"
                                    name="product_name" value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Harga</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" placeholder="Harga"
                                    name="price" value="<?php echo $price; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-12">Jumlah</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" placeholder="Jumlah"
                                    name="quant" id="quant" min="1" max="" value="<?php echo $quant ?>">
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