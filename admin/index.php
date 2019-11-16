<html lang="en">
<?php
  session_start();
  include 'connect.php';
  if (isset($_SESSION['MSNV'])){ 
    $MSNV = $_SESSION['MSNV'];
    $select_msnv = "SELECT ChucVu FROM nhanvien WHERE MSNV = '".$MSNV."'";
    $result_msnv = mysqli_query($conn, $select_msnv);
    if ($result_msnv->num_rows > 0)
        while ($rows = mysqli_fetch_assoc($result_msnv)) {
            if ($rows['ChucVu'] == "quanly"){
              $MSNV = $_SESSION['MSNV'];
              header('Location: dashboard.php');
            }
        }
}
?>
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
        <form class="form-inline col-auto mr-auto">
          <div class="input-group">
            <input type="text" class="form-control " placeholder="Bạn tìm gì..." aria-label="Bạn tìm gì" aria-describedby="button-addon2" name="searchInput">
            <div class="input-group-append">
              <button class="btn btn-light bg-light" type="button" id="searchBtn" name="searchBtn"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </nav>
<main role="main" class="container md">                                  
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-5">
          <h3>Đăng nhập</h3>
          <hr>
          <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
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