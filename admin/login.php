<?php
    session_start();
    include 'connect.php';

    if (isset($_POST['login'])) {
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $select_user = "SELECT * FROM taikhoannhanvien WHERE TaiKhoan = '".$_POST['username']."'";
        $user_query = mysqli_query($conn, $select_user);
        if ($user_query->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($user_query)){
            if (sha1($_POST['password'])==$row['MatKhau']){
                $_SESSION['MSNV'] = $row['MSNV'];
                header('Location: dashboard.php');
            }else{
              echo '<script>alert("Sai mật khẩu.");</script>';
              header('Location: index.php');
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