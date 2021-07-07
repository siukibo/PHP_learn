<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách sản phẩm - Demo Shopping Cart</title>
<link rel="stylesheet" type="text/css" href="style_cart.css">
</head>
<body>
<div id="cart">
<?php
session_start();
//kiểm tra xem đã có sản phẩm trong giỏ hàng chưa? số lượng là bao nhiêu?
$count =0;
if(isset($_SESSION["cart"])==true)//nếu đã có biến cart trong SESSION
{
	$count = count($_SESSION["cart"]);//đếm số phần tử của mảng cart trong SESSION
}
if($count == 0)
	echo "<p> GIỎ HÀNG CHƯA CÓ SẢN PHẨM NÀO </p>";
else
	echo "<p> BẠN ĐANG CÓ $count SẢN  PHẨM TRONG GIỎ HÀNG </p>";
?>
</div>
<h1> DANH SÁCH SẢN PHẨM</h1>
<?php
require("DungChung.php");
$pdo_conn = KetnoiCSDL();
$strSQL = "select * from books order by id asc";
$pdo_smt = $pdo_conn->prepare($strSQL);
$ketqua = $pdo_smt->execute();
if($ketqua==FALSE)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($pdo_smt->rowCount()<=0)
	die("<h3> Không có sản phẩm nào</h3>");
if($pdo_smt->rowCount() > 0){
	$rows = $pdo_smt->fetchAll();
	foreach($rows as $row){
		$id = $row["id"];
		$title = $row["title"];
		$author = $row["author"];
		$price = $row["price"];
		echo "\n<div class='pro'>";
		echo "<h3>$title</h3>";
		echo "Tac Gia: $author - Gia: ".number_format($price,3)." VND";
		echo "<p align='right'><a href='addcart.php?item=$id'>Mua Sach Nay</a></p>";
		echo "</div>\n";
	}
}
?>
</body>
</html>