<?php
    include '../connect.php';
    include '../User.php';
   // include 'Controller/loginController.php';
    session_start();
    $user = new User;
    $data=null;
    if(isset($_POST['uname']) && isset($_POST['pass'])){
        $data= $user->getUserLogin($_POST['uname'],$_POST['pass']);
    }
    
    if(isset($_SESSION['username']) ){
        header("Location: http://localhost/QuanLyKH/View/QLKHView.php");
    }
    if($data){
        foreach($data as $row){
            $username=$row['username'];
            $password=$row['password'];
            $role= $row['RoleID'];
        }
        $_SESSION['username']= $username;
        $_SESSION['rolee']= $role;
        header("Location: http://localhost/QuanLyKH/View/QLKHView.php");
    }else{
        //header("Location: http://localhost/QuanLyKH/loginView.php");
        //die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/log.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container" id="khung">  
            <form action="loginView.php" method="post">  
                <div class="text-center" id="circle">
                    <img src="../View/images/login/person.png" class="rounded" alt="ảnh">
                  </div>   
                <div class="form-group">
                    <label for="">Tài khoản</label>
                    <input type="text" name="uname" class="form-control" placeholder="Nhập tài khoản của bạn">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" name="pass" class="form-control"  placeholder="Nhập mật khẩu của bạn">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Duy trì đăng nhâp</label>
                </div>
                <button type="submit" class="btn btn-danger">Đăng nhập</button>
                <div id="register">Nếu bạn chưa có tài khoản, hãy <a href="register.html">đăng ký</a></div>
                <a href="home.html">Trở về trang chủ</a>
            </form>
            
</body>
</html>