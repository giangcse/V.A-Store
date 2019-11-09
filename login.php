<?php
    session_start();
    include 'connect.php';

    if (isset($_POST['buttonLogin'])) {
      if (!empty($_POST['unameLogin']) && !empty($_POST['upassLogin'])) {
        $select_user = "SELECT * FROM taikhoankhachhang WHERE TaiKhoan = '".$_POST['unameLogin']."'";
        $user_query = mysqli_query($conn, $select_user);
        if ($user_query->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($user_query)){
            if (sha1($_POST['upassLogin'])==$row['MatKhau']){
                $_SESSION['IDKH'] = $row['IDKH'];
                header('Location: index.php');
            }else{
              echo '<script>alert("Sai mật khẩu.");</script>';
            }
          }
        }else{
          echo '<script>alert("Tài khoản không tồn tại");</script>';
          header('Location: index.php');
        }
        die();
      }
    }
?>