<?php
session_start();
if(isset($_POST["capnhat"]))
{
	$sp = $_POST["sp"];//lấy mảng các input có tên là sp
	//print_r($sp);
	//duyệt số lượng mới nhập trong input của từng sản phẩm và update vào mảng cart trong SESSION
	foreach($sp as $id => $soluong)
	{
		$_SESSION["cart"][$id] = $soluong;
	}
	//hiển thị lại giỏ hàng
	foreach($_SESSION["cart"] as $id => $soluong)
	{
		echo "<p> sản phẩm: $id, số lượng mới: $soluong </p>";
	}
}
?>