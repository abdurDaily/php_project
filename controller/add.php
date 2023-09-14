<?php
session_start();
include './env.php';

    $title = $_REQUEST['title'];
    $date = $_REQUEST['date'];

    $query = "INSERT INTO add_data(title, date) VALUES ('$title','$date')";
    $result = mysqli_query($conn, $query);
    
    if($result){
        $_SESSION['success'] = 'your data has inserted';
        header("location:../index.php");
    }else{
        echo "not ok";
    }

// session_unset();
?>
