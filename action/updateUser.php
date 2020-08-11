<?php 
    include '../connect.php';
    include '../User.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/QuanLyKH/View/loginView.php");
    }else if(isset($_SESSION['username']) && isset($_SESSION['rolee']) && $_SESSION['rolee']==2){
        header("Location: http://localhost/QuanLyKH/index.php");
    }
    $id = $_POST['id'];
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $uname= $_POST['username'];
    $pass= md5($_POST['password']);
    $dob = strtotime($_POST["dob"]);
    $dob = date('Y-m-d', $dob);
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address= $_POST['address'];
    $update_time= date("Y-m-d");
    $status="thuong";
    $role_id= $_POST['role'];
    $user= new User;
    $update=$user->updateUser($fname,$lname,$uname
    ,$pass,$dob,$email,$phone,$address,$update_time
    ,$role_id,$status,$id);
    if($update==true){
        header("location: ../View/KHListView.php");
    }
?>