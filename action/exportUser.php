<?php
    include '../connect.php';
    include '../User.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/QuanLyKH/View/loginView.php");
    }else if(isset($_SESSION['username']) && isset($_SESSION['rolee']) && $_SESSION['rolee']==2){
        header("Location: http://localhost/QuanLyKH/index.php");
    }
    $user= new User;
    $output='';
    $result=$user->getAllUser();
    $output .= '
        <table class="table" bordered="1">  
                    <tr>  
                         <th>id</th>  
                         <th>Họ</th>  
                         <th>Tên</th>  
                         <th>Tên tài khoản</th>
                         <th>Ngày sinh</th>
                         <th>Email</th>
                         <th>Điện thoại</th>
                         <th>Cấp độ</th>
                         <th>là Thành viên từ</th>
                         <th>Địa chỉ</th>
                    </tr>
        ';
    foreach($result as $row){
        $output .= '
                    <tr>  
                        <td>'.$row["id"].'</td>  
                        <td>'.$row["firstname"].'</td>  
                        <td>'.$row["lastname"].'</td>  
                        <td>'.$row["username"].'</td>  
                        <td>'.$row["dob"].'</td>
                        <td>'.$row["email"].'</td>
                        <td>'.$row["phone"].'</td>
                        <td>'.$row["status"].'</td>
                        <td>'.$row["create_at"].'</td>
                        <td>'.$row["Address"].'</td>
                    </tr>
        ';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
?>
