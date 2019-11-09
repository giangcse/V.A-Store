<!doctype html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Lazy load image -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <style type="text/css">
    <style type="text/css">
      a.custom-card,
      a.custom-card:hover {
        color: inherit;
      }
    </style>
    <title>V.A Store | PC - Laptop - Gaming gear</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
      <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png"  height="40" alt="V.A Store">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline col-auto mr-auto" method="get">
          <div class="input-group">
            <input type="text" class="form-control " placeholder="Bạn tìm gì..." aria-label="Bạn tìm gì" aria-describedby="button-addon2" name="searchInput">
            <div class="input-group-append">
              <button class="btn btn-light bg-light" type="submit" id="searchBtn" name="searchBtn"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
        <ul class="navbar-nav col-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php#Gaming">Gaming</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#Multimedia">Multimedia</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#Workstation">Workstation</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#Office">Office</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#PC">PC</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#Gear">Gear</a>
          </li>
        </ul>
        <ul class="navbar-nav col-auto">
        <?php
            include 'connect.php';
            if(isset($_SESSION['IDKH'])){
              $select_username = "SELECT HoTenKH FROM khachhang WHERE MSKH = '".$_SESSION['IDKH']."'";
                $username_query = mysqli_query($conn, $select_username);
                if ($username_query->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($username_query))
                        $fullname = $row['HoTenKH'];
                }
            echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">'.$fullname.'</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                  </div>
                </li>';
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
    <main role="main" class="container md">                                  
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4>Thanh toán</h4>
    <hr>
    <?php
      if (isset($_SESSION['IDKH'])) {
        $stt = 'disable';
        $customer_info = "SELECT * FROM khachhang WHERE MSKH = '".$_SESSION['IDKH']."'";
        $customer_info_query = mysqli_query($conn, $customer_info);
        if ($customer_info_query->num_rows>0) {
          while ($row2 = mysqli_fetch_assoc($customer_info_query)){
            $customer_name = $row2['HoTenKH'];
            $customer_phone = $row2['SoDienThoai'];
            $customer_address = $row2['DiaChi'];
          }
        }
      }else{
        $stt="";
        $customer_name = "";
        $customer_phone = "";
        $customer_address = "";
      }
    ?>
    <div class="row">
      <div class="col-md-5">
      <form method="post" action="pay.php" onsubmit="return validate();">
        <div class="form-group">
            <label for="HoTen">Họ tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" disable="<?php echo $stt; ?>" value="<?php echo $customer_name; ?>" placeholder="<?php echo $customer_name; ?>">
        </div>
        <div class="form-group">
            <label for="SDT">Số điện thoại</label>
            <input type="text" pattern="\d{10,10}" class="form-control" id="SDT" name="SDT" disable="<?php echo $stt; ?>" value="<?php echo $customer_phone; ?>" placeholder="<?php echo $customer_phone; ?>">
        </div>
        <div class="form-group">
            <label for="DiaChi">Địa chỉ</label>
            <input type="text" class="form-control" id="DiaChi" name="DiaChi" disable="<?php echo $stt; ?>" value="<?php echo $customer_address; ?>" placeholder="<?php echo $customer_address; ?>">
        </div>
      </div>
      <div class="col-md"></div>
      <div class="col-md-6">
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Tên</th>
                <th scope="col">Số lượng</th>
                <th scope="col" class="text-right">Thành tiền</th>
              </tr>
            </thead>
            <tbody>      
          <?php
            include 'connect.php';
            $total = 0;
            if(isset($_SESSION['cart']))
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
      </div>
      <div class="row">
      <div class="col-auto mr-auto">
        <p class="text-muted">*Đã tính thuế VAT 10% và sẽ xuất hóa đơn khi thanh toán xong</p>
      </div>
      <div class="col-auto">
            <button onclick="history.back()" class="btn btn-danger" type="button">Quay lại</button>
            <button name="pay" class="btn btn-success" type="submit">Thanh toán</button>
        </form>
      </div>
      </div>
    </div>
    <?php if(isset($_SESSION['stt'])){
            if($_SESSION['stt']=="success"){ ?>
            <script>
              Swal.fire(
                'Thanh toán thành công!',
                'Sẽ quay lại trang chủ sau 3s',
                'success'
              )
            </script>
            <meta http-equiv="refresh" content="3;url=index.php">
        <?php }else{ ?>
            <script>
              Swal.fire(
                'Thanh toán thất bại!',
                'Sẽ quay lại trang chủ sau 3s',
                'error'
              )
            </script>
            <meta http-equiv="refresh" content="3;url=index.php">
        <?php }
        } 
        unset($_SESSION['stt']);
        ?>
    </main>
    <script>
        function validate(){
            var name = document.getElementById('HoTen').value;
            var phone = document.getElementById('SDT').value;
            var address = document.getElementById('DiaChi').value;

            if(name=="" || phone=="" || address=="")
                alert("Vui lòng điền đầy đủ thông tin");
            else
                return true;

            return false;
        }
    </script>
  </body>
</html>