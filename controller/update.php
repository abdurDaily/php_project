<?php
session_start();


include './env.php';
$id = $_GET['edit'];
$update = "SELECT * FROM add_data WHERE id ='$id'";
$rslt = mysqli_query($conn, $update);

$fetch = mysqli_fetch_assoc($rslt);
$_SESSION['update'] = $fetch;
header("location:../index.php");
?>