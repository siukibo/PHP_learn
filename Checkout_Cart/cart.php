<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shopping Cart</title>
<link rel="stylesheet" type="text/css" href="style_cart.css">
</head>

<body>
<h1> GIỎ HÀNG CỦA BẠN</h1>
<?php
session_start();
require("DungChung.php");

$count =0;
if(isset($_SESSION["cart"]))
	$count = count($_SESSION["cart"]);
if($count==0)
{
?>
	<div class='pro'>
		<p align='center'>Ban khong co mon hang nao trong gio hang<br />
        <a href='index.php'>Buy Ebook</a></p>
	</div>
<?php
}
else
{
	
	$arr = array_keys($_SESSION["cart"]);
	$str = implode(",", $arr);
	
	$pdo_conn = KetnoiCSDL();
	
	$strSQL = "SELECT * FROM `books` WHERE id in ($str)";
	$pdo_smt = $pdo_conn->prepare($strSQL);
	$ketqua = $pdo_smt->execute();
	if($ketqua==FALSE)
		die("<h3> LỖI TRUY VẤN CSDL</H3>");
	
	$total =0;
	$rows = $pdo_smt->fetchAll();
?>
	<form name="f1" id="f1" action="updatecart.php" method="post">
<?php
	foreach($rows as $row)
	{
		$id = $row["id"];
		$title = $row["title"];
		$author = $row["author"];
		$price = $row["price"];
		$soluong = $_SESSION['cart'][$id];
		$total+=$soluong*$price;
?>   
	<div class="pro">
    	<h3><?=$title?></h3>
		<p>Tác giả: <?=$author?> - Giá: <?=number_format($price,2);?> VNĐ</p>
        <p align="right">
        <input type="text" name="qty[<?=$id?>]" size="5" value="<?=$soluong?>">
        <a href="delcart.php?item=<?=$id?>"> Xóa Sản phẩm </a>
        </p>
        <p align="right">Giá tiền của sản phẩm: <?=number_format($soluong*$price,2)?> VNĐ</p>
    </div>
<?php
	}//đóng foreach
?>
	<div class="pro" style="text-align:right; font-weight:bold">
		Tong tien cho cac mon hang: 
        <span style="color:red"> <?=number_format($total,3)?> VND</span>
    </div>
    <div class="pro" style="text-align:right;">
	<input type="submit" name="capnhat" value="Cap Nhat Gio Hang">
	</div>
    <div class="pro" style="text-align:right; font-weight:bold">
		<a href='index.php'>Mua Sach Tiep</a> - 
        <a href='delcart.php?item=0'>Xoa Bo Gio Hang</a>
	</div>
	</form>
    <div>
    	<h3> THANH TOÁN GIỎ HÀNG</h3>
    	<form name="f2" id="f1" action="Checkout.php" method="post">
        <p><span style="width:110px; display:inline-block">Họ tên:</span> 
        	<input type="text" name="hoten" id="hoten"></p>
        <p><span style="width:110px; display:inline-block">Địa chỉ:</span> 
        	<input type="text" name="diachi" id="diachi"></p>
        <p><span style="width:110px; display:inline-block">Điện thoại:</span> 
        	<input type="text" name="dienthoai" id="dienthoai"></p>
        <p><span style="width:110px; display:inline-block">Ngày nhận hàng:</span> 
        	<input type="text" name="ngaynhan" id="ngaynhan"></p>
        <p><input type="submit" name="dathang" id="dathang" value="ĐỒNG Ý"></p>
        </form>
    </div>
<?php
}//đóng else
?>
</body>
</html>