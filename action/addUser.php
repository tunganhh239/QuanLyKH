<?php
    include '../connect.php';
    include '../User.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/QuanLyKH/View/loginView.php");
    }else if(isset($_SESSION['username']) && isset($_SESSION['rolee']) && $_SESSION['rolee']==2){
        header("Location: http://localhost/QuanLyKH/index.php");
    }
    if(isset($_POST['submit'])){
        $fname= $_POST['firstname'];
        $lname= $_POST['lastname'];
        $uname= $_POST['username'];
        $pass= md5($_POST['password']);
        $dob = strtotime($_POST["dob"]);
        $dob = date('Y-m-d', $dob);
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address= $_POST['address'];
        $create_time= date("Y-m-d");
        $update_time= date("Y-m-d");
        $satus="thường";
        $role_id= 2;
        //
        $target= "../View/images/avatar/".basename($_FILES['image']['name']);
        $image= $_FILES['image']['name'];
        $user= new User;
        $insert=$user->insertUser($fname,$lname,$uname
        ,$pass,$dob,$email,$phone,$address,$create_time,$update_time
        ,$role_id,$satus,$image);

        if($insert==true){
            move_uploaded_file($_FILES['image']['tmp_name'],$target);
            header("location: ../View/KHListView.php");

        }
    }
    
?>