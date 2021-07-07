<?php
session_start();
$id = $_REQUEST["item"];//lấy id sản phẩm từu link addcart.php?item=n
if($id=="" || is_numeric($id)==false)
	die("<p> id sản phẩm không hợp lệ</p>");
//thêm sản phẩm vào giỏ hàng
//nếu id đã có trong giỏ hàng thì tăng thêm 1 đơn vị
//nếu id chưa có thêm sản sản phẩm id đó vói số lượng là 1

//nếu id sản phẩ đã có trong key của mảng
if(array_key_exists($id,$_SESSION["cart"]))
{
	$soluong = $_SESSION["cart"][$id];
	//tăng số lượng của sản phẩm trong mảng lên 1 đv và gán cho id cũ
	$_SESSION["cart"][$id] = $soluong +1; 
}
else//id sản phẩm chưa có trong giỏ hàng (mua sản phẩm mới)
{
	//thêm 1 phần tử có key là $id và giá trị là 1 vào mảng cart
	$_SESSION["cart"][$id] =1;
}
//chuyển hướng trình duyệt sang trang cart.php
header("location:cart.php");
?>