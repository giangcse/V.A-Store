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
                if(isset($_GET['delete'])){    
                    $delete = "DELETE FROM nhanvien WHERE MSNV = '".$_GET['delete']."'";
                    $delete_query = mysqli_query($conn, $delete);
                    // echo $_GET['delBtn'];
                    header('Location: employee.php');
                }
              }
          }
}else
  header('Location: index.php');
?>