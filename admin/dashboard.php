<!doctype html>
<?php 
  session_start();
  include 'connect.php';

if (isset($_SESSION['MSNV'])){ 
      $MSNV = $_SESSION['MSNV'];
      $select_msnv = "SELECT ChucVu FROM nhanvien WHERE MSNV = '".$MSNV."'";
      $result_msnv = mysqli_query($conn, $select_msnv);
      if ($result_msnv->num_rows > 0)
          while ($rows = mysqli_fetch_assoc($result_msnv)) {
              if ($rows['ChucVu'] == "quanly")
                $MSNV = $_SESSION['MSNV'];
          }
}else
  header('Location: index.php');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.ico" />

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
        <img src="../img/logo.png"  height="40" alt="V.A Store">
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
            <a class="nav-link" href="dashboard.php">Xử lý đơn hàng</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="product.php">Sản phẩm</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="employee.php">Nhân viên</a>
          </li>
          <!--<li class="nav-item active">
            <a class="nav-link" href="index.php#Office">Office</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#PC">PC</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#Gear">Gear</a>
          </li> -->
        </ul>
        <ul class="navbar-nav col-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <?php
                include 'connect.php';

                $select_username = "SELECT HoTenNV FROM nhanvien WHERE MSNV = '".$_SESSION['MSNV']."'";
                $username_query = mysqli_query($conn, $select_username);
                if ($username_query->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($username_query))
                        echo 'Xin chào '.$row['HoTenNV'];
                }
            ?>
            </a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="logout.php">Đăng xuất</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    </nav>
    <main role="main" class="container md">                                  
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h3>Danh sách đơn hàng</h3>
    <hr>
    <p class="text-muted">Click vào từng dòng để xem chi tiết.</p>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Chờ xử lý</a>
        <a class="nav-item nav-link" id="nav-processed-tab" data-toggle="tab" href="#nav-processed" role="tab" aria-controls="nav-processed" aria-selected="false">Đã xử lý</a>
        <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Đã hủy</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
      <br>
        <table class="table table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Số đơn đặt hàng</th>
              <th scope="col">Họ tên khách hàng</th>
              <th scope="col">Ngày đặt hàng</th>
              <!-- <th scope="col">Thao tác</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              include 'connect.php';
              $pending = "SELECT * FROM dathang
                            INNER JOIN khachhang
                            ON dathang.MSKH=khachhang.MSKH
                            WHERE TrangThai='pending'
                            ORDER BY dathang.NgayDH ASC";
              $pending_result = mysqli_query($conn, $pending);
              $i=0;
              if ($pending_result->num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($pending_result)) {
                    $i+=1;
            ?>
            <tr data-toggle="modal" data-target="#pending<?php echo $i; ?>">
              <th><?php echo $i; ?></th>
              <td><?php echo $row['SoDonDH']; ?></td>
              <td><?php echo $row['HoTenKH']; ?></td>
              <td><?php echo date('G:i:s d/m/Y', strtotime($row['NgayDH'])); ?></td>
              <!-- <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pending<?php echo $i; ?>">Xem</button></td> -->
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="pending<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <form method="get">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfo">Thông tin đơn hàng <?php echo $row['SoDonDH'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <?php
                    $show = "SELECT * FROM chitietdathang 
                             INNER JOIN hanghoa
                             ON chitietdathang.MSHH = hanghoa.MSHH
                             WHERE SoDonHH = '".$row['SoDonDH']."'";
                    $show_query = mysqli_query($conn, $show);
                    $tong_cho=0;
                    if ($show_query->num_rows > 0) {
                      while ($row1 = mysqli_fetch_assoc($show_query)) {
                        $tong_cho += $row1['GiaDatHang'];
                  ?>
                      <ul>
                        <li>Tên: <strong><?php echo $row1['TenHH']; ?></strong></li>
                        <li>Số lượng: <?php echo $row1['SoLuong']; ?></li>
                        <li>Thành tiền: <?php echo number_format(($row1['GiaDatHang']-(0.1)*$row1['GiaDatHang']), 0); ?>đ</li>
                        <li>Thuế VAT 10%: <?php echo number_format($row1['GiaDatHang']*(0.1)) ?>đ</li>
                      </ul>
                      <hr>
                  <?php
                      }
                    }
                    echo '<strong>Tổng tiền: '.number_format($tong_cho, 0).'đ</strong>';
                  ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="cancelBtn" value="<?php echo $row['SoDonDH']; ?>" class="btn btn-danger">Hủy đơn</button>
                    <button type="submit" name="processBtn" value="<?php echo $row['SoDonDH']; ?>" class="btn btn-success">Xác nhận đơn</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <?php
                  }
              }
              if (isset($_GET['cancelBtn'])) {
                $cancel_sql = "UPDATE dathang SET TrangThai='cancelled' WHERE SoDonDH = '".$_GET['cancelBtn']."'";
                $cancel_query = mysqli_query($conn, $cancel_sql);
                echo '<script type="text/javascript">
                      window.location.href = "dashboard.php";
                      </script>';
            }
            if (isset($_GET['processBtn'])) {
                $process_sql = "UPDATE dathang SET TrangThai='processed' WHERE SoDonDH = '".$_GET['processBtn']."'";
                $process_query = mysqli_query($conn, $process_sql);
                echo '<script type="text/javascript">
                      window.location.href = "dashboard.php";
                      </script>';
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="nav-processed" role="tabpanel" aria-labelledby="nav-processed-tab">
      <br>
        <table class="table table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Số đơn đặt hàng</th>
              <th scope="col">Họ tên khách hàng</th>
              <th scope="col">Ngày đặt hàng</th>
              <!-- <th scope="col">Thao tác</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              include 'connect.php';
              $processed = "SELECT * FROM dathang
                            INNER JOIN khachhang
                            ON dathang.MSKH=khachhang.MSKH
                            WHERE TrangThai='processed'";
              $processed_result = mysqli_query($conn, $processed);
              $i=0;
              if ($processed_result->num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($processed_result)) {
                    $i+=1;
            ?>
            <tr data-toggle="modal" data-target="#processed<?php echo $i; ?>">
              <th><?php echo $i; ?></th>
              <td><?php echo $row['SoDonDH']; ?></td>
              <td><?php echo $row['HoTenKH']; ?></td>
              <td><?php echo date('G:i:s d/m/Y', strtotime($row['NgayDH'])); ?></td>
              <!-- <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#processed<?php echo $i; ?>">Xem</button></td> -->
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="processed<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfo">Thông tin đơn hàng <?php echo $row['SoDonDH'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php
                    $show = "SELECT * FROM chitietdathang 
                             INNER JOIN hanghoa
                             ON chitietdathang.MSHH = hanghoa.MSHH
                             WHERE SoDonHH = '".$row['SoDonDH']."'";
                    $show_query = mysqli_query($conn, $show);
                    $tong_xuly=0;
                    if ($show_query->num_rows > 0) {
                      while ($row1 = mysqli_fetch_assoc($show_query)) {
                        $tong_xuly += $row1['GiaDatHang'];
                  ?>
                      <ul>
                        <li>Tên: <strong><?php echo $row1['TenHH']; ?></strong></li>
                        <li>Số lượng: <?php echo $row1['SoLuong']; ?></li>
                        <li>Thành tiền: <?php echo number_format(($row1['GiaDatHang']-(0.1)*$row1['GiaDatHang']), 0); ?>đ</li>
                        <li>Thuế VAT 10%: <?php echo number_format($row1['GiaDatHang']*(0.1)) ?>đ</li>
                      </ul>
                      <hr>
                  <?php
                      }
                    }
                    echo '<strong>Tổng tiền: '.number_format($tong_xuly, 0).'đ</strong>';
                  ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <?php
                  }
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
      <br>
        <table class="table table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Số đơn đặt hàng</th>
              <th scope="col">Họ tên khách hàng</th>
              <th scope="col">Ngày đặt hàng</th>
              <!-- <th scope="col">Thao tác</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              include 'connect.php';
              $cancelled = "SELECT * FROM dathang
                            INNER JOIN khachhang
                            ON dathang.MSKH=khachhang.MSKH
                            WHERE TrangThai='cancelled'";
              $cancelled_result = mysqli_query($conn, $cancelled);
              $i=0;
              if ($cancelled_result->num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($cancelled_result)) {
                    $i+=1;
            ?>
            <tr data-toggle="modal" data-target="#restore<?php echo $i; ?>">
              <th><?php echo $i; ?></th>
              <td><?php echo $row['SoDonDH']; ?></td>
              <td><?php echo $row['HoTenKH']; ?></td>
              <td><?php echo date('G:i:s d/m/Y', strtotime($row['NgayDH'])); ?></td>
              <!-- <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#restore<?php echo $i; ?>">Xem</button></td> -->
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="restore<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <form method="get">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfo">Thông tin đơn hàng <?php echo $row['SoDonDH'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php
                    $show = "SELECT * FROM chitietdathang 
                             INNER JOIN hanghoa
                             ON chitietdathang.MSHH = hanghoa.MSHH
                             WHERE SoDonHH = '".$row['SoDonDH']."'";
                    $show_query = mysqli_query($conn, $show);
                    $tong_huy=0;
                    if ($show_query->num_rows > 0) {
                      while ($row1 = mysqli_fetch_assoc($show_query)) {
                        $tong_huy += $row1['GiaDatHang'];
                  ?>
                      <ul>
                        <li>Tên: <strong><?php echo $row1['TenHH']; ?></strong></li>
                        <li>Số lượng: <?php echo $row1['SoLuong']; ?></li>
                        <li>Thành tiền: <?php echo number_format(($row1['GiaDatHang']-(0.1)*$row1['GiaDatHang']), 0); ?>đ</li>
                        <li>Thuế VAT 10%: <?php echo number_format($row1['GiaDatHang']*(0.1)) ?>đ</li>
                      </ul>
                      <hr>
                  <?php
                      }
                    }
                    echo '<strong>Tổng tiền: '.number_format($tong_huy, 0).'đ</strong>';
                  ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="pendingBtn" value="<?php echo $row['SoDonDH']; ?>" class="btn btn-warning">Khôi phục đơn</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <?php
                // $pending = "pendingBtn".$row['SoDonDH'];
                  }
              }
              if (isset($_GET['pendingBtn'])) {
                $pending_sql = "UPDATE dathang SET TrangThai='pending' WHERE SoDonDH = '".$_GET['pendingBtn']."'";
                $pending_query = mysqli_query($conn, $pending_sql);
                // header('Refresh:0');
                echo '<meta http-equiv="refresh" content="3;url=dashboard.php">';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    </main>
  </body>
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
    <script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>