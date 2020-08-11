<?php
    include '../connect.php';
    include '../User.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/QuanLyKH/View/loginView.php");
    }else if(isset($_SESSION['username']) && isset($_SESSION['rolee']) && $_SESSION['rolee']==2){
        header("Location: http://localhost/QuanLyKH/index.php");
    }
    $id= $_GET['id'];
    $user= new User;
    $delete= $user->deleteUser($id);
    if($delete==true) header("location: ../View/KHListView.php");
?>
