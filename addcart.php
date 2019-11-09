<?php session_start(); 
	include 'connect.php';
    $id = $_GET['MSHH'];
    $quantity = $_GET['quantity'];
	if(isset($_SESSION['cart'][$id])){
	  $qty = $_SESSION['cart'][$id] + $quantity;
	}else{
	  $qty = $quantity;
	}
	$check_quantity = "SELECT SoLuongHang FROM hanghoa WHERE MSHH = '".$id."'";
    $check_query = mysqli_query($conn, $check_quantity);
     if($check_query->num_rows > 0){
       while ($row2 = mysqli_fetch_assoc($check_query)) {
        if($quantity >= $row2['SoLuongHang']){
        //   echo '<script>alert("Hiện chỉ còn '.$row2['SoLuongHang'].' sản phẩm.");</script>';
		  $_SESSION['cart'][$id] = $row2['SoLuongHang'];
		}
		else
		  $_SESSION['cart'][$id] = $qty;
     } 
    }
	
	header("location:index.php");
	exit();
?>