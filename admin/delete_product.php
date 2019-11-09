<?php
session_start();
include 'connect.php';
if (isset($_SESSION['MSNV'])) {
  $find = "SELECT ChucVu FROM nhanvien WHERE MSNV = '".$_SESSION['MSNV']."'";
  $find_query = mysqli_query($conn, $find);
  if ($find_query->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($find_query)) {
      if ($row['ChucVu']=="quanly") {
        if (isset($_POST['delete'])) {
          $delete = "DELETE FROM hanghoa WHERE MSHH = '".$_POST["delete"]."'";
          mysqli_query($conn, $delete);
          header('Location: product.php');
        }
      }else{
        header('Location: index.php');
      }
    }
  }
}else{
  header('Location: index.php');
}
?>