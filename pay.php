<?php
	session_start();
	include 'connect.php';
	date_default_timezone_set("Asia/Ho_Chi_Minh");

    $HoTen = trim($_POST['HoTen']);
    $SDT = trim($_POST['SDT']);
    $DiaChi = trim($_POST['DiaChi']);

    $max_id = "SELECT MAX(CAST(SoDonDH AS int)) AS maxid FROM dathang";
    $max_result = mysqli_query($conn, $max_id);
    if($max_result->num_rows>0)
        while($row=mysqli_fetch_assoc($max_result)){
            if($row['maxid'] == "")
                $id = 0;
            else
                $id = intval($row['maxid'])+1;
        }
  if(isset($_SESSION['cart']) && $_SESSION['cart']['total'] > 0){
    if (isset($_POST['pay'])) {
        $MSKH = $_SESSION['IDKH'];
        $order = "INSERT INTO dathang VALUES ('".$id."' ,'".$MSKH."', '0', '".date("Y-m-d G:i:s")."', 'pending')";//Thêm vào bảng dathang
        $order_query = mysqli_query($conn, $order);
        echo intval($id)+1;
        $total = 0;
        foreach($_SESSION['cart'] as $key=>$value){
            $cart_select = "SELECT * FROM hanghoa WHERE MSHH = '".$key."'";
            $cart_query = mysqli_query($conn, $cart_select);
            if($cart_query->num_rows > 0){
              while($row0 = mysqli_fetch_assoc($cart_query)){ 
                    $MSHH = $row0['MSHH'];
                    $SoLuong = $_SESSION['cart'][$row0['MSHH']];
                    $total = $_SESSION['cart'][$row0['MSHH']]*$row0['Gia']+$_SESSION['cart'][$row0['MSHH']]*$row0['Gia']*(0.1);
                    $conlai = $row0['SoLuongHang']-$SoLuong;
                    $order_detail = "INSERT INTO chitietdathang VALUES ('".$id."', '".$MSHH."', '".$SoLuong."', '".$total."')";//Thêm vào bảng chitietdathang
                    $order_detail_query = mysqli_query($conn, $order_detail);
                    $quantity = "UPDATE hanghoa SET SoLuongHang = '".$conlai."' WHERE MSHH = '".$MSHH."'"; //Cập nhật số lượng sản phẩm còn lại
                    $quantity_query = mysqli_query($conn, $quantity);
                    
              }
              $_SESSION['stt']="success";
            }else{
              $_SESSION['stt']="failed";
            }
        }
    }
}else
    $_SESSION['stt']="failed";
unset($_SESSION['cart']);
header('Location: payment.php');
?>