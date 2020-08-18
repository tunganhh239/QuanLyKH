<?php
    include 'connect.php';
    include 'User.php';

    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/QuanLyKH/View/loginView.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="View/css/trangchu.css">
</head>

<body>
     <!-- Thanh điều hướng -->
    <div id="homepage">
     <nav class="navbar navbar-expand-lg navbar-dark" id="thanh-menu">
        <a class="navbar-brand" href="home.html" ><img src="View\images\trangchu\icon.jpg" alt="icon" id="brand"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barContent" aria-controls="barContent" aria-expanded="false" >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="barContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active" >
              <a class="nav-link" href="home.html">Trang chủ </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.html">Mô hình</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Phụ kiện
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="shop.html">Vũ khí</a>
                <a class="dropdown-item" href="shop.html">Mũ</a>
                <a class="dropdown-item" href="shop.html">Quần</a>
                <a class="dropdown-item" href="shop.html">Áo</a>
                <a class="dropdown-item" href="shop.html">Giày</a>
                <a class="dropdown-item" href="shop.html">Trang sức</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Bộ trang phục</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html" >Liên hệ</a>
            </li>
          </ul>
          <form class="form-inline">
            <a href="logout.php" class="icon-function" style="text-decoration: none;color:white">Thoát</a>
            <?php
            if(isset($_SESSION['username']) && isset($_SESSION['rolee']) && $_SESSION['rolee']==1){
              echo '<a href="View/QLKHView.php" class="icon-function" style="text-align:center;text-decoration: none;color:white">Quản lý</a>';
            } 
            
            ?>
            <input class="form-control mr-md-2" type="search" placeholder="Tìm kiếm mô hình" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-md-0" type="submit">Tìm</button>
          </form>
        </div>
      </nav>
      <div id="lala" class="text-center">
            <h1 id="header-tieude">Thế giới mô hình Dota</h1>
            <div id="header-content" >Hệ thống bán mô hình lớn nhất trên thế giới</div>
      </div>
    </div>
    <!-- content page -->
    <div class="container-fluid">
        <div class="row justify-content-center" id="content1">
            <div class="col-md-5 mx-auto " id="khungAnhJug">
                <img src="View\images\trangchu\jug.png" alt="ssssss" id="jug">
            </div>
            <div class="col-md-5 " id="note" >
                <div id="content1-note">
                    <h2>Tại sao lại lựa chọn chúng tôi?</h2>
                    <div>Là một hệ thống lớn nhất Việt Nam, công ty chúng tôi luôn
                    cung cấp sản phẩm chất lượng và nhanh chóng đến tay của khách hàng     
                    </div>
                </div>
                <div class="row justify-content-center content1-detail" >
                    <div class="col-md-1 circle-img">
                        <img src="View\images\trangchu\icon2.png" alt="icon" class="circle-icon">
                    </div>
                    <div class="col-md-4 circle-content">
                        <h5>Sản phẩm rõ xuất xứ, nguồn gốc</h5>
                        <div>Sản phẩm của chúng tôi được nhập khẩu từ những nhà sản xuất ở nước ngoài
                        </div>
                    </div>
                    <div class="col-md-1 circle-img">
                        <img src="View\images\trangchu\icon1.png" alt="icon" class="circle-icon">
                    </div>
                    <div class="col-md-4 circle-content">
                        <h5>Chăm sóc khách hàng</h5>
                        <div>Luôn có nhân viên trực 24/7 để giải đáp thắc mắc của bạn
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center content1-detail"  >
                  <div class="col-md-1 circle-img"><img src="View\images\trangchu\icon3.png" alt="icon"></div>
                  <div class="col-md-4 circle-content">
                        <h5>Dịch vụ vận chuyển tại nhà</h5>
                        <div>Bạn không cần phải di chuyển nhưng vẫn mua được hàng
                        </div>
                  </div>
                  <div class="col-md-1 circle-img"><img src="View\images\trangchu\icon4.png" alt="icon"></div>
                  <div class="col-md-4 circle-content">
                        <h5>Bảo hành tận tâm</h5>
                        <div>Khi sản phẩm của bạn bị hỏng, bạn muốn vệ sinh sản phẩm, chúng tôi luôn sẵn sàng
                        </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="row justify-content-center " id="content2">
            <div class="col-md-5 text-center">
              <h2>Những câu hỏi thường gặp</h2>
              <div >
                <!-- ------ -->
                <button class="btn btn-danger question-guest" type="button" data-toggle="collapse" data-target="#contentCollapse2" aria-expanded="false" aria-controls="collapseExample">
                  Có thể thanh toán được bằng những phương thức nào?
                </button>
                <div class="collapse" id="contentCollapse2">
                  <div class="card card-body question-guest-text ">
                    Chúng tôi hỗ trợ khách hàng thanh toán thông qua ví điện tử Momo,
                    qua các ngân hàng như Vietcombank, TPbank
                  </div>
                </div>
                <!-- ------ -->
                <button class="btn btn-danger question-guest" type="button" data-toggle="collapse" data-target="#contentCollapse3" aria-expanded="false" aria-controls="collapseExample">
                  Nên bảo quản mô hình như thế nào?
                </button>
                <div class="collapse" id="contentCollapse3">
                  <div class="card card-body question-guest-text" >
                   Để mô hình ở nơi thoáng mát, tránh tiếp xúc với lửa, tránh xa trẻ em.
                  </div>
                </div>
                <!-- ------ -->
                <button class="btn btn-danger question-guest" type="button" data-toggle="collapse" data-target="#contentCollapse1" aria-expanded="false" aria-controls="collapseExample">
                  Tìm hướng dẫn lắp mô hình ở đâu
                </button>
                <div class="collapse" id="contentCollapse1">
                  <div class="card card-body question-guest-text">
                   Dối với những mô hình dạng lắp ráp, khách hàng có thể sử dụng hướng dẫn lắp trong hộp, 
                   hay có thể quan sát cách lắp trên youtube.
                  </div>
                </div>
              </div>
              <img id="content2-pic" src="View/images/trangchu/rune.png" alt="Ảnh">
            </div>
        </div>
        <div id="content3">
            <h2 class="text-center">Một số hình ảnh về mô hình</h2> 
            <div class="row justify-content-center">        
              <div class="col-md-3">
                <div class="card khung-anh" style="width: 15rem;">
                  <img class="card-img-top" src="View\images\trangchu\tiny.png" alt="Ảnh mô hình">
                  <div class="card-body">
                    <h5 class="card-title">Người đá</h5>
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="card khung-anh" style="width: 15rem;">
                  <img class="card-img-top" src="View\images\trangchu\pudge.png" alt="Ảnh mô hình">
                  <div class="card-body">
                    <h5 class="card-title">Đồ tể</h5>
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="card khung-anh" style="width: 15rem;">
                  <img class="card-img-top" src="View\images\trangchu\prophet.png" alt="Ảnh mô hình">
                  <div class="card-body">
                    <h5 class="card-title">Ma nữ xanh</h5>
                  </div>
                </div> 
              </div>
            </div>
            <div class="row justify-content-center">        
              <div class="col-md-3">
                <div class="card khung-anh" style="width: 15rem;">
                  <img class="card-img-top" src="View\images\trangchu\cm.png" alt="Ảnh mô hình">
                  <div class="card-body">
                    <h5 class="card-title">Cô gái mùa đông</h5>
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="card khung-anh" style="width: 15rem;">
                  <img class="card-img-top" src="View\images\trangchu\bounty.png" alt="Ảnh mô hình">
                  <div class="card-body">
                    <h5 class="card-title">Thợ săn tiền thưởng</h5>
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="card khung-anh" style="width: 15rem;">
                  <img class="card-img-top" src="View\images\trangchu\slark.jpg" alt="Ảnh mô hình">
                  <div class="card-body">
                    <h5 class="card-title">Bé cóc</h5>
                  </div>
                </div> 
              </div>
            </div>   
        </div> <!--  Hết content 3 -->
        <div id="content4">
            <div class="row">
                <div class="col-md-6 " id="title-content-cuoi">
                  <h2>Đăng ký với tài khoản email của bạn</h2>
                  <div>Để nhân được thông báo sớm nhất về sản phẩm mới và ưu đãi</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="form-content-cuoi">
                  <form>
                      <div class="row">
                        <div class="col">
                          <label >Họ</label>
                          <input type="text" class="form-control" placeholder="Hoàng">
                        </div>
                        <div class="col">
                          <label >Tên</label>
                          <input type="text" class="form-control" placeholder="Tùng Anh">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="tunganhh239@gmail.com">
                      </div>
                      <div class="form-group">
                        <label >Một vài lưu ý</label>
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-danger">Submit</button>
                  </form>
                </div>
            </div>
        </div>
        <div id="content5">
            <h2 class="text-center">Phản hồi của khách hàng với sản phẩm</h2>
            <img src="View\images\trangchu\feedback.png" alt="feedback"class="mx-auto anhfeedback" style="width: 64px;">
            <div class="row justify-content-center">
              <div class="col-md-3">
                <div class="card text-secondary bg-light feedback" style="max-width: 18rem;">
                  <div class="card-header">
                    Huyền
                    <span class="float-right"><img class="avatar-feedback" src="View\images\trangchu\sohyun.jpg" alt=""></span>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nhân viên rất tận tình</h5>
                    <p class="card-text">Được nhân viên chăm sóc một cách chu đáo khiến mình muốn quay lại đây mua hàng </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-secondary bg-light feedback" style="max-width: 18rem;">
                  <div class="card-header">
                      IU
                      <span class="float-right"><img class="avatar-feedback" src="View\images\trangchu\iu.jpg" alt=""></span>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Sản phẩm ở đây thật tuyệt vời</h5>
                    <p class="card-text">Các mô hình ở đây đều rất đa dạng về mẫu mã, nguồn gốc xuất xứ rõ ràng </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-secondary bg-light feedback" style="max-width: 18rem;">
                  <div class="card-header">
                    Bill Gates
                    <span class="float-right"><img class="avatar-feedback" src="View\images\trangchu\bill.jpg" alt=""></span>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Mọi thứ đều hoàn hảo, nên thay đổi địa điểm bán hàng</h5>
                    <p class="card-text">Dịch vụ và sản phẩm rất tốt, ngoại trừ Vị trí cửa hàng khá khó tìm</p>
                  </div>
                </div>
              </div>
            </div>
            
        </div> 
    </div>
    <div class="container-fluid" id="footerrr">
        <div class="row justify-content-center" >
            <div class="col-md-3 " class="content-footer">
                <h5>Mạng xã hội</h5>
                <div><a class="link-footer" href="#">Facebook</a></div>
                <div><a class="link-footer" href="#">Instagram</a></div>
                <div><a class="link-footer" href="#">Twitter</a></div>
               
            </div>
            <div class="col-md-4" class="content-footer">
                <h5>Liên hệ</h5>
                <div class="contact-footer"><img src="View\images\trangchu\map.png" alt="map"> Số 2, Trần Phú, Hà Đông</div>
                <div class="contact-footer"><img src="View\images\trangchu\phone.png" alt="dien thoai"> 0123456789</div>
            </div>
            <div class="col-md-3">
                <h5>Đưỡng dẫn nhanh</h5>
                <div><a class="link-footer" href="#">Trang chủ</a></div>
                <div><a class="link-footer" href="#">Mô hình</a></div>
                <div><a class="link-footer" href="#">Phụ kiện cho mô hình</a></div>
                <div><a class="link-footer" href="#">Bản đồ</a></div>
            </div>
        </div>
        <hr>
        <div class="footer-copyright text-center " >
          Bản quyền thuộc về Hoàng Tùng Anh
        </div>
     </div>
</body>
</html>