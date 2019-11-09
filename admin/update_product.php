<?php
    session_start();
    include 'connect.php';
    if (isset($_SESSION['MSNV'])) {
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
    if(isset($_GET['update'])){
        $select = "SELECT * FROM hanghoa WHERE MSHH = '".$_GET['update']."'";
        $select_query = mysqli_query($conn, $select);
        if ($select_query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($select_query)) {
                $ten = $row['TenHH'];
                $gia = $row['Gia'];
                $so = $row['SoLuongHang'];
            }
        }
        if ($_GET['tensp']== "")
            $_GET['tensp'] = $ten;
        if ($_GET['giasp'] == "")
            $_GET['giasp'] = $gia;
        if ($_GET['sosp'] == "")
            $_GET['sosp'] = $so;

        $_GET['tensp'] = trim($_GET['tensp']);
        $_GET['giasp'] = trim($_GET['giasp']);
        $_GET['sosp'] = trim($_GET['sosp']);
        $update = "UPDATE hanghoa SET TenHH='".$_GET['tensp']."', Gia='".$_GET['giasp']."', SoLuongHang='".$_GET['sosp']."' WHERE MSHH = '".$_GET['update']."'";
        $update_query = mysqli_query($conn, $update);
        header('Location: product.php');
    }
?>