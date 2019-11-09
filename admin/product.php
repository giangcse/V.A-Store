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
    <script src="../js/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <style type="text/css">
      a.custom-card,
      a.custom-card:hover {
        color: inherit;
      }
      .img {
        visibility: hidden;
        position: absolute;
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
           <a href="employee.php" class="nav-link">Nhân viên</a>
          </li>
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
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-show-tab" data-toggle="tab" href="#nav-show" role="tab" aria-controls="nav-show" aria-selected="true">Danh sách sản phẩm</a>
        <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">Thêm sản phẩm</a>
        <a class="nav-item nav-link" id="nav-adds-tab" data-toggle="tab" href="#nav-adds" role="tab" aria-controls="nav-adds" aria-selected="false">Loại sản phẩm</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-show" role="tabpanel" aria-labelledby="nav-show-tab">
    <br>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $show = "SELECT * FROM hanghoa";
          $show_query = mysqli_query($conn, $show);
          if($show_query->num_rows > 0)
            while ($row = mysqli_fetch_assoc($show_query)) {
                $Ten = substr($row['TenHH'], 0, 40).'...';
            ?>
            <tr>
              <th><?php echo $row['MSHH']; ?></th>
              <td><img src="../img/product/<?php echo $row['Hinh']; ?>" width="100"></td>
              <td><?php echo $row['TenHH']; ?></td>
              <td><?php echo $row['SoLuongHang']; ?></td>
              <td class="text-right"><?php echo number_format($row['Gia'], 0); ?>đ</td>
              <td>
              <form method="POST" action="delete_product.php">
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#<?php echo $row['MSHH']; ?>">
                    <i class="material-icons">edit</i>
                  </button>
                  <button type="submit" rel="tooltip" class="btn btn-danger btn-sm" name="delete" value="<?php echo $row["MSHH"]; ?>" onclick="return del()">
                    <i class="material-icons">delete</i>
                  </button>
                </form>
              </td>
            </tr>
            <script>
            function del(){
              var del = confirm('Bạn có muốn xóa?');
              if (del == true)
                return true;
              else
                return false;
              return false;
            }
            </script>
            <div class="modal fade" id="<?php echo $row['MSHH']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="get" onsubmit="return validateUpdate();" action="update_product.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $Ten; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="tensp">Tên sản phẩm</label>
                    <input type="text" name="tensp" id="tensp" class="form-control" placeholder="<?php echo $row['TenHH']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="sosp">Số lượng</label>
                    <input type="text" name="sosp" id="sosp" placeholder="<?php echo $row['SoLuongHang']; ?>" pattern="\d{1,5}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="giasp">Giá</label>
                    <input type="text" name="giasp" id="giasp" class="form-control" placeholder="<?php echo $row['Gia']; ?>" pattern="\d{1,9}">
                  </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" name="update" value="<?php echo $row['MSHH']; ?>" class="btn btn-primary">Lưu thay đổi</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <script>
            function validateUpdate(){
                var ten = document.getElementById('tensp').value;
                var hinh = document.getElementById('hinhsp').value;
                var gia = document.getElementById('giasp').value;
                var soluong = document.getElementById('sosp').value;

                if(ten=="" && hinh=="" && gia=="" && soluong=="")
                    $('<?php echo $row["MSHH"]; ?>').modal('hide');
                else
                    return true;
                $('<?php echo $row["MSHH"]; ?>').modal('hide');
            }
            </script>
            <?php
            }
        ?>
        </tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="nav-adds" role="tabpanel" aria-labelledby="nav-adds-tab">
      <h3>Loại sản phẩm</h3>
      <hr>
      <div class="container">
        <div class="row justify-content-md-center">
         <form method="post" action="add_specie.php" class="col-md-5">
          <div class="form-group">
            <label for="maloai">Mã loại</label>
            <small class="form-text text-muted">Tối thiểu 1 ký tự và tối đa 5 ký tự</small>
            <input type="text" name="maloai" id="maloai" class="form-control" pattern="[a-zA-Z]{1,5}">
          </div>
          <div class="form-group">
            <label for="tenloai">Tên loại</label>
            <input type="text" name="tenloai" id="tenloai" class="form-control">
          </div>
          <button type="submit" name="addspecie" class="btn btn-success btn-block">Thêm</button>
         </form>
        </div>
      </div>
      <?php if(isset($_SESSION['addspecie'])){
            if($_SESSION['addspecie']=="yes"){ ?>
            <script>
              Swal.fire(
                'Đã thêm loại sản phẩm!',
                '',
                'success'
              )
            </script>
        <?php }else{ ?>
            <script>
              Swal.fire(
                'Chưa thêm loại sản phẩm!',
                '',
                'error'
              )
            </script>
        <?php }
        } 
        unset($_SESSION['addspecie']);
        ?>
        <hr>
      <h3>Danh sách nhóm sản phẩm</h3>
      <hr>
      <table class="table table-hover table-bordered">
        <thead>
          <th scope="col">Mã nhóm</th>
          <th scope="col">Tên nhóm</th>
          <th scope="col" class="text-right"></th>
        </thead>
        <tbody>
        <?php
          $showNhom = "SELECT * FROM nhomhanghoa";
          $showNhom_query = mysqli_query($conn, $showNhom);
          if ($showNhom_query->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($showNhom_query)) {
            ?>
            <tr>
              <td><?php echo $row2['MaNhom']; ?></td>
              <td><?php echo $row2['TenNhom']; ?></td>
              <td class="text-right">
                <form method="post" onsubmit="return confirm('Bạn có muốn xóa?');">
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#suanhom<?php echo $row2['MaNhom']; ?>"><i class="material-icons">edit</i></button>
                  <button type="submit" name="delete_specie" value="<?php echo $row2['MaNhom']; ?>" class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                </form>
              </td>
            </tr>
            <div class="modal fade" id="suanhom<?php echo $row2['MaNhom']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo $row2['MaNhom']; ?> - <?php echo $row2['TenNhom']; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post">
                <div class="modal-body">
                   <div class="form-group">
                    <label for="tenn">Tên nhóm</label>
                    <input type="text" name="tenn" id="tenn" class="form-control">
                   </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="id" value="<?php echo $row2['MaNhom']; ?>" class="btn btn-primary">Lưu</button>
                </div>
                </form>
              </div>
            </div>
          </div>
            <?php
            if (isset($_POST['id'])) {
              $updatespecie = "UPDATE nhomhanghoa SET TenNhom = '".trim($_POST['tenn'])."' WHERE MaNhom = '".$_POST['id']."'";
              $result_update = mysqli_query($conn, $updatespecie);
              if ($result_update) {
              ?>
            <script>
              window.location.href = "product.php"
              Swal.fire({
                type: 'success',
                title: 'Đã chỉnh sửa!',
                showConfirmButton: false,
                timer: 1500
              })
            </script>
              <?php
              }
            }
            if (isset($_POST['delete_specie'])) {
              $deletes = "DELETE FROM nhomhanghoa WHERE MaNhom = '".$_POST['delete_specie']."'";
              mysqli_query($conn, $deletes);
              echo '<script>window.location.href = "product.php"</script>';
            }
            }
          }
        ?>
        </tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
      <h3>Thêm sản phẩm</h3>
      <hr>
      <div class="container">
      <div class="row justify-content-md-center">
       <div class="col-md-6">
        <form method="post" action="add_product.php" id="themsp" onsubmit="return validate()" enctype="multipart/form-data">
          <div class="form-group">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" name="ten" id="ten" class="form-control">
          </div>
          <div class="form-group">
            <label for="gia">Giá sản phẩm</label>
            <input type="text" name="gia" id="gia" class="form-control" pattern="\d{1,11}">
          </div>
          <div class="form-group">
            <label for="soluong">Số lượng nhập</label>
            <input type="text" name="soluong" id="soluong" class="form-control" pattern="\d{1,5}">
          </div>
          <div class="form-group">
           <label for="loai">Loại sản phẩm </label>
            <select name="loai" id="loai" id="loai" class="form-control">
              <?php
                $loai = "SELECT * FROM nhomhanghoa";
                $loai_query = mysqli_query($conn, $loai);
                if ($loai_query->num_rows > 0) {
                  while ($row1 = mysqli_fetch_assoc($loai_query)) {
                  ?>
                  <option value="<?php echo $row1['MaNhom']; ?>"><?php echo $row1['TenNhom']; ?></option>
                  <?php
                  }
                }
              ?>
            </select>
            </div>
          <div class="form-group">
          <label for="hinh">Chọn hình</label>
          <input type="file" name="hinh" id="hinh" class="form-control">
          </div>
          <div class="form-group">
            <label for="mota">Mô tả sản phẩm</label>
            <textarea name="mota" id="mota" class="form-control"></textarea>
          </div>
            <button type="submit" name="add" class="btn btn-success btn-lg btn-block">Thêm sản phẩm</button>
        </form>
        </div>
        </div>
        </div>
<?php
  if (isset($_SESSION['upload'])) {
    switch ($_SESSION['upload']) {
      case 'success':
      ?>
      <script>
        Swal.fire({
          type: 'success',
          title: 'Đã thêm thành công!',
          showConfirmButton: false,
          timer: 1500
        })
      </script>
      <?php
        break;
      case 'failed':
      ?>
      <script>
        Swal.fire({
          type: 'error',
          title: 'Upload ảnh thất bại!',
          showConfirmButton: false,
          timer: 1500
        })
      </script>
      <?php
        break;
      case 'notImg':
      ?>
      <script>
        Swal.fire({
          type: 'error',
          title: 'Vui lòng chọn đúng định dạng!',
          showConfirmButton: false,
          timer: 1500
        })
      </script>
      <?php
        break;
      case 'exist':
      ?>
      <script>
        Swal.fire({
          type: 'error',
          title: 'Tên hình ảnh đã tồn tại!',
          showConfirmButton: false,
          timer: 1500
        })
      </script>
      <?php
        break;
      default:
      ?>
      <script>
        Swal.fire({
          type: 'error',
          title: 'File ảnh kích thước nhỏ hơn 2.5MB!',
          showConfirmButton: false,
          timer: 1500
        })
      </script>
      <?php
        break;
    }
    unset($_SESSION['upload']);
  }
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>