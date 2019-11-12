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
      <a class="navbar-brand">
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
    <h3>Danh sách nhân viên</h3>
    <hr>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="true">Danh sách</a>
        <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">Thêm nhân viên</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
      <br>
        <table class="table table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">Mã</th>
              <th scope="col" class="text-left">Họ tên nhân viên</th>
              <th scope="col">Tài khoản</th>
              <th scope="col">SĐT</th>
              <th scope="col" class="text-left">Địa chỉ</th>
              <th scope="col">Chức vụ</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include 'connect.php';
              $select_emp = "SELECT * FROM nhanvien INNER JOIN taikhoannhanvien ON nhanvien.MSNV = taikhoannhanvien.MSNV";
              $result_emp = mysqli_query($conn, $select_emp);
              if ($result_emp->num_rows > 0){
                  while ($row = mysqli_fetch_assoc($result_emp)) {
                    switch ($row['ChucVu']) {
                      case 'quanly':
                        $chucvu = "Quản lý";
                        break;
                      case 'tuvan':
                        $chucvu = "Tư vấn";
                        break;
                      case 'banhang':
                        $chucvu = "Bán hàng";
                        break;
                      default:
                        $chucvu = "Kỹ thuật";
                        break;
                    }
            ?>
            <tr>
              <th><?php echo $row['MSNV']; ?></th>
              <td class="text-left"><?php echo $row['HoTenNV']; ?></td>
              <td><?php echo $row['TaiKhoan']; ?></td>
              <td><?php echo $row['SoDienThoai']; ?></td>
              <td class="text-left"><?php echo $row['DiaChi']; ?></td>
              <td><?php echo $chucvu; ?></td>
              <td>
               <form method="get" action="delete_emp.php">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['MSNV']; ?>"><i class="material-icons">edit</i></button>
                <button type="submit" class="btn btn-danger btn-sm" name="delete" value="<?php echo $row['MSNV']; ?>"><i class="material-icons">delete</i></button>
               </form>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="edit<?php echo $row['MSNV']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <form method="post" action="update_emp.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfo"><?php echo $row['HoTenNV'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" pattern="\d{10,10}" name="sdt" id="sdt" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="matkhau">Mật khẩu</label>
                    <input type="password" name="matkhau" id="matkhau" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" name="diachi" id="diachi" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="chucvu">Chức vụ</label>
                    <select name="chucvu" id="chucvu" class="form-control">
                      <option value="quanly">Quản lý</option>
                      <option value="banhang">Bán hàng</option>
                      <option value="kythuat">Kỹ thuật</option>
                      <option value="tuvan">Tư vấn</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="update" value="<?php echo $row['MSNV']; ?>" class="btn btn-success">Cập nhật</button>
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
      <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
      <br>
      <div class="container">
        <div class="row justify-content-md-center">
        <form action="add_emp.php" method="post" class="col-md-5">
            <div class="form-group">
              <label for="hotennv">Họ tên nhân viên</label>
              <input type="text" name="hotennv" id="hotennv" class="form-control">
            </div>
            <div class="form-group">
              <label for="chucvunv">Chức vụ</label>
              <select name="chucvunv" id="chucvunv" class="form-control">
                <option value="quanly">Quản lý</option>
                <option value="banhang">Bán hàng</option>
                <option value="kythuat">Kỹ thuật</option>
                <option value="tuvan">Tư vấn</option>
              </select>
            </div>
            <div class="form-group">
              <label for="taikhoannv">Tài khoản</label>
              <input type="text" name="taikhoannv" id="taikhoannv" class="form-control">
            </div>
            <div class="form-group">
              <label for="matkhaunv">Mật khẩu</label>
              <input type="password" name="matkhaunv" id="matkhaunv" class="form-control">
            </div>
            <div class="form-group">
              <label for="sodienthoainv">Số điện thoại</label>
              <input type="text" name="sodienthoainv" id="sodienthoainv" class="form-control" pattern="\d{10,10}">
            </div>
            <div class="form-group">
              <label for="diachinv">Địa chỉ</label>
              <input type="text" name="diachinv" id="diachinv" class="form-control">
            </div>
            <button type="submit" name="add" class="btn btn-success btn-block">Thêm</button>
          </form>
        </div>
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