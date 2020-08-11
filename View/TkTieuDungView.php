<?php
    include '../connect.php';
    include '../User.php';

    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/QuanLyKH/View/loginView.php");
    }else if(isset($_SESSION['username']) && isset($_SESSION['rolee']) && $_SESSION['rolee']==2){
        header("Location: http://localhost/QuanLyKH/index.php");
    }
    
    $user= new User();
    $dataPoints = array();
    $result = $user->getCreateday(); 
    //var_dump($result);
    foreach($result as $row){
        array_push($dataPoints, array("x"=> strtotime($row->x) * 1000, "y"=> $row->y));
    }
    

    //cách giá trị thống kêkê
    $userData= $user->getAllUser();
    $productData= $user->getAllProduct();
    $transactionData=$user->getAllTransaction();
    $transaction= $user->getTransaction();
    $dataa=array();
    $tongDoanhThu=0;
    foreach($transaction as $row){                                 
        if(empty($dataa)){
            array_push($dataa,array("id"=>(int)$row['id'],
                                    "firstname"=>$row['firstname'],
                                    "lastname"=>$row['lastname'],
                                    "tongtien"=>($row['price']*$row['quantity'])
            ));
        }else{
            $flag=0;
            foreach($dataa as &$datarow){
                if($datarow['id'] === (int)$row['id']){
                    $flag=1;
                    $datarow['tongtien']=$datarow['tongtien']+$row['price']*$row['quantity'];
                    break;
                }
            }
            if($flag==0){
                array_push($dataa,array("id"=>(int)$row['id'],
                                        "firstname"=>$row['firstname'],
                                        "lastname"=>$row['lastname'],
                                        "tongtien"=>($row['price']*$row['quantity'])
                ));
            }  
                                            
        }
    }  
    foreach($dataa as $row){
        $tongDoanhThu= $tongDoanhThu +$row['tongtien'];
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang quản lý</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/trangquanly.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script>
                window.onload = function () {
                
                var chart = new CanvasJS.Chart("chartContainer", {

                    dataPointWidth: 20,
                    animationEnabled: true,
                    exportEnabled: true,
                    theme: "light1", // "light1", "light2", "dark1", "dark2"
                    title:{
                        text: "Lượng người đăng ký theo ngày",
                        fontFamily: "tahoma",
                        fontSize: 20,
                    },
                    data: [{
                        type: "column", //change type to bar, line, area, pie, etc
                        //indexLabel: "{y}", //Shows y value on all Data Points
                        indexLabelFontColor: "#5A5757",
                        indexLabelPlacement: "outside",  
                        xValueType: "dateTime", 
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
                }
</script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="QLKHView.php">ViVu Shop</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form style="height:38px"  id="thanhbar" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group" style="position:relative">
                    <input class="form-control" type="text" placeholder="Tìm khách hàng" id="search_text" name="search_text" />
                    <div class="input-group-append">
                        
                    </div>   
                </div>
                <div id="resultt" style="width:210px; height: auto;"></div> 
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../logout.php">Thoát</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Chính</div>
                            <a class="nav-link" href="QLKHView.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng điều khiển
                            </a>
                            <div class="sb-sidenav-menu-heading">Các chức năng</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="KHListView.php">Quản lý khách hàng</a>
                                    <a class="nav-link" href="GDListView.php">Quản lý giao dịch</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Thống kê
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="TkTieuDungView.php">Thống kê lượng tiêu dùng của khách hàng</a>
                                </nav>
                            </div>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Đăng nhập với quyền:
                             <?php
                             if($_SESSION['rolee']==1) echo 'Admin'  ?>
                        </div>


                    
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thống kê</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Thống kê khả năng chi tiêu của khách</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Danh sách các giao dịch mà khách hàng thực hiện
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>id khách</th>
                                                <th>Tên khách hàng</th>
                                                <th>Tổng tiền chi tiêu </th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>id khách</th>
                                                <th>Tên khách hàng</th>
                                                <th>Tổng tiền chi tiêu </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php 
                                                foreach($dataa as $row){
                                                  echo '  
                                                          <tr>  
                                                                  <td>'.$row["id"].'</td>  
                                                                  <td>'.$row["firstname"].' '.$row["lastname"].'</td>  
                                                                  <td>'.$row["tongtien"].'</td>
                                                          </tr>  
                                                          ';  
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Hoàng Tùng Anh 2020</div>
                            <div>
                                <a href="#">ViVuShop</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>                                     
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            $(document).ready(function(){
                load_data();
                function load_data(query)
                {
                    $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#resultt').html(data);
                    }
                    });
                }
                $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != '')
                    {
                        load_data(search);
                    }
                    else
                    {
                        load_data();
                    }
                });
            });
        </script>

    </body>
</html>
