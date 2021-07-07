<?php
session_start();
if(isset($_POST["capnhat"])==false)
	die("<p>LỖI FORM</p>");
$qty = $_REQUEST["qty"];//lấy mảng các input có name="qty[x]"
foreach($qty as $id=>$soluong)
{
	//nếu số lượng =0 hoặc không phải số thì xóa sản phẩm
	if($soluong==0 || is_numeric($soluong)==false)
		unset($_SESSION["cart"][$id]);
	else	
		$_SESSION["cart"][$id] = $soluong;
}
//chuyển hướng trình duyệt sang trang cart.php
header("location:cart.php");
?>