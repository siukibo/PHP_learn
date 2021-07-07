<?php
session_start();
//lấy id sản phẩm từu link delcart.php?item=n
$id = $_REQUEST["item"];
if($id=="" || is_numeric($id)==false)
	die("<p> id sản phẩm không hợp lệ</p>");
if($id==0)//xóa toàn bộ giỏ hàng
{
	unset($_SESSION["cart"]);
}
else//xóa sản phẩm có id chọn
{
	unset($_SESSION["cart"][$id]);
}
//chuyển hướng trình duyệt sang trang cart.php
header("location:cart.php");
?>