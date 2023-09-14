<?php
include './env.php';
 
$id = $_GET['id'];
$dlt = "DELETE FROM `add_data` WHERE id=$id";
$reault = mysqli_query($conn,$dlt);

if($reault){
   header('location:../index.php');
}
