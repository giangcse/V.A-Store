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
    
    $manv = "SELECT MAX(CAST(MSNV AS int)) AS MSNV FROM nhanvien";
    $manv_result = mysqli_query($conn, $manv);
    if($manv_result->num_rows>0)
        while($row=mysqli_fetch_assoc($manv_result)){
            if($row['MSNV'] == "")
                $id = 0;
            else
                $id = intval($row['MSNV'])+1;
        }
	if (isset($_POST['add'])) {
		if ($_POST['hotennv']=="" && $_POST['chucvunv']=="" && $_POST['sodienthoainv']=="" && $_POST['diachinv']=="" && $_POST['taikhoannv'] && $_POST['matkhaunv']) {
            header('Location: employee.php');
		}else{
            $add_emp = "INSERT INTO nhanvien (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES ('".$id."', '".trim($_POST['hotennv'])."', '".$_POST['chucvunv']."', '".trim($_POST['diachinv'])."', '".$_POST['sodienthoainv']."')";
            mysqli_query($conn, $add_emp);
            $add_empaccount = "INSERT INTO taikhoannhanvien VALUES ('".$id."', '".trim($_POST['taikhoannv'])."', '".sha1($_POST['matkhau'])."')";
            mysqli_query($conn, $add_empaccount);
            // echo $add_emp;
        }
	}
	header('Location: employee.php');
?>