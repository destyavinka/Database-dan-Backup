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
?>
<?php

include 'config.php';
// initializing variables
$item_name = "";
$item_price    = "";


// // connect to the database
// $db = mysqli_connect('localhost', 'tima5_skd', 'skd', 'tima5_skd');
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  echo "connect";
  $item_name = mysqli_real_escape_string($db, $_POST['product_name']);
  $item_price = mysqli_real_escape_string($db, $_POST['price']);
  $quant = mysqli_real_escape_string($db, $_POST['quant']);
  $satuan = mysqli_real_escape_string($db, $_POST['satuan']);

  $query = "INSERT INTO tb_product (product_name,price,quantity,satuan) 
  			  VALUES('$item_name','$item_price','$quant','$satuan')";
  if (mysqli_query($db, $query)) {
    echo "<script>alert('Successfully stored');</script>";
  } else {
    echo "<script>alert('Somthing wrong!!!');</script>";
  }

  header('location: table.php');
}
?>