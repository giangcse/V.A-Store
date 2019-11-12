<!doctype html>
<?php session_start(); 
      include 'connect.php';
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Lazy load image -->
    <script
    src="https://kit.fontawesome.com/0e6673a1b2.js"
    crossorigin="anonymous"
    ></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />
    <title>V.A Store | PC - Laptop - Gaming gear</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
      <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png"  height="40" alt="V.A Store">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline col-auto mr-auto" method="get">
          <div class="input-group">
            <input type="text" class="form-control " placeholder="Bạn tìm gì..." aria-label="Bạn tìm gì" aria-describedby="button-addon2" name="search">
            <div class="input-group-append">
              <button class="btn btn-light bg-light" type="button" id="searchBtn" name=""><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
        <ul class="navbar-nav col-auto">
        <?php
          $manhom = "SELECT * FROM nhomhanghoa ORDER BY TenNhom";
          $result_manhom = mysqli_query($conn, $manhom);
          if ($result_manhom->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result_manhom)) {
              ?>
          <li class="nav-item active">
            <a class="nav-link" href="#<?php echo $row1['MaNhom']; ?>"><?php echo $row1['TenNhom']; ?></a>
          </li>
          <?php
            }
          }
          ?>
        </ul>
        <ul class="navbar-nav col-auto">
          <?php
            include 'connect.php';
            error_reporting(E_PARSE);
            if(isset($_SESSION['IDKH'])){
              $select_username = "SELECT HoTenKH FROM khachhang WHERE MSKH = '".$_SESSION['IDKH']."'";
                $username_query = mysqli_query($conn, $select_username);
                if ($username_query->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($username_query))
                        $fullname = $row['HoTenKH'];
                }
            ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php echo $fullname; ?>
                  </a>
                  <div class="dropdown-menu">
                  <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link" id="myBtn" data-toggle="modal" data-target="#paymentModal"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <?php
            }else
              echo '<li class="nav-item">
              <a class="nav-link"  data-toggle="modal" data-target="#myModal">Đăng kí</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  data-toggle="modal" data-target="#myModal">Đăng nhập</a>
            </li>';
          ?>
        </ul>
      </div>
    </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div role="tabpanel">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="true">Đăng nhập</a>
                            <a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">Đăng kí</a>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                            <form method="post" action="login.php">
                              <br>
                              <div class="form-group">
                                <label for="unameLogin">Tên người dùng</label>
                                <input type="text" class="form-control" id="unameLogin" name="unameLogin" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="upassLogin">Mật khẩu</label>
                                <input type="password" class="form-control" id="upassLogin" name="upassLogin" placeholder="">
                              </div>
                              <button type="submit" class="btn btn-primary btn-block" name="buttonLogin">Đăng nhập</button>
                            </form>
                          </div>
                          <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                            <form method="post" action="register.php" onsubmit="return ValidateForm()">
                              <br>
                              <div class="form-group">
                                <label for="unameRegister">Tên người dùng</label>
                                <input type="text" class="form-control" id="unameRegister" name="unameRegister" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="upassRegister">Mật khẩu</label>
                                <input type="password" class="form-control" id="upassRegister" name="upassRegister" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="re_upassRegister">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="re_upassRegister" name="re_upassRegister" placeholder="">
                              </div>
                             <div class="from-group">
                               <label for="fullnameRegister">Họ tên</label>
                               <input type="text" class="form-control" name="fullnameRegister" id="fullnameRegister" placeholder="">
                             </div>
                             <div class="form-group">
                               <label for="phoneRegister">Số điện thoại</label>
                               <input type="text" class="form-control" name="phoneRegister" id="phoneRegister" placholder="" pattern="\d{10,10}">
                             </div>
                             <div class="form-group">
                              <label for="addressRegister">Địa chỉ</label>
                              <input type="text" class="form-control" name="addressRegister" id="addressRegister" placeholder="">
                             </div>
                              <button type="submit" class="btn btn-success btn-block" name="buttonRegister">Đăng kí</button>
                            </form>
                          </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      function ValidateForm(){
        var username = document.getElementById('unameRegister').value;
        var password = document.getElementById('upassRegister').value;
        var re_password = document.getElementById('re_upassRegister').value;
        var fullname = document.getElementById('fullnameRegister').value;
        var phone = document.getElementById('phoneRegister').value;
        var address = document.getElementById('addressRegister').value;

        if (username=="" || password=="" || re_password=="" || fullname=="" || phone=="" || address=="") {
          alert('Vui lòng điền đầy đủ thông tin.');
        }else{
          if (password != re_password) {
            alert('Mật khẩu không trùng khớp');
          }else
            return true;
        }
        return false;
      }
    </script>
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="title header">Thông tin giỏ hàng</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-hover table-responesive">
            <thead>
              <tr>
                <th scope="col">Tên</th>
                <th scope="col">Số lượng</th>
                <th scope="col" class="text-right">Thành tiền</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>      
          <?php
            include 'connect.php';
            $total = 0;
            if (isset($_SESSION['cart'])) 
              foreach($_SESSION['cart'] as $key=>$value){
              $cart_select = "SELECT * FROM hanghoa WHERE MSHH = '".$key."'";
              $cart_query = mysqli_query($conn, $cart_select);
              if($cart_query->num_rows > 0)
                while($row0 = mysqli_fetch_assoc($cart_query)){ 
                  echo'
                        <tr>
                          <th>'.$row0['TenHH'].'</th>
                          <td class="text-center">'.$_SESSION['cart'][$row0['MSHH']].'</td>
                          <td class="text-right">'.number_format($_SESSION['cart'][$row0['MSHH']]*$row0['Gia'], 0).'đ</td>
                          <td><form method="get" action="deletecart.php?id="><button class="close" type="submit" name="delete" value="'.$row0['MSHH'].'"><span aria-hidden="true">&times;</span></button></form></td>
                        </tr>';
                  $total = $total + $_SESSION['cart'][$row0['MSHH']]*$row0['Gia'];
                }
              }
            $_SESSION['cart']['total'] = $total;
          ?>
          <tr>
            <td class="text-right" colspan="5">Thuế VAT 10%: <?php echo number_format((0.1)*$total, 0);?>đ</td>
          </tr>
          <tr>
            <th class="text-right" colspan="5">Tổng tiền: <?php echo number_format($total+(0.1)*$total, 0); ?>đ</th>
          </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <form method="post" action="payment.php">
            <button type="submit" name="pay" class="btn btn-success">Thanh toán</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <main role="main" class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/banner/1.jpg" class="d-block w-100" height="400" alt="img/banner/1.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/banner/2.jpg" class="d-block w-100" height="400" alt="img/banner/2.jpg">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <br>
<?php
  include 'connect.php';
  include 'show_product.php';
  $select_loai = "SELECT * FROM nhomhanghoa ORDER BY TenNhom";
  $result_loai = mysqli_query($conn, $select_loai);
  if ($result_loai->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($result_loai)) {
    ?>
      <section id="<?php echo $rows['MaNhom'] ?>">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
          <a class="navbar-brand"><strong><?php echo $rows['TenNhom']; ?></strong></a>
        </nav>
        <br>
          <div class="row">
            <?php
              show($rows['MaNhom']);
            ?>
        </div>
      </section>
    <?php
    }
  }
?>
  </main>
  <nav class="navbar navbar-warning bg-warning">
  <div class="container">
    <p>&copy; 2019       Designed and built with all the love in the world by <strong>b1609816</strong>
    </p>
  </div>
  </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>