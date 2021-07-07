<?php
session_start();
require("DungChung.php");
?>
<html>
<head>
	<title>Demo Shopping Cart</title>
	<link rel="stylesheet" href="style_cart.css" />
</head>
<body>
<h1>Demo Shopping Cart</h1>
<?php
$ok=1;//giỏ hàng rỗng
if(isset($_SESSION['cart']))
{
	if(array_keys($_SESSION['cart']))
		$ok=2;//giỏ hàng khác rỗng
}
if($ok == 2)
{


			echo "<form action='updatecart.php' method='post'>";
			foreach($_SESSION['cart'] as $id=>$qty)
			{
				$item[]=$id;//mảng chứa các mã sản phẩm
			}
			$str=implode(",",$item);//tạo chuỗi "sp1,sp2,sp3,.."
			$pdo_conn = KetnoiCSDL();
			$strSQL = "select * from books where id in ($str)";
			echo "<p> $strSQL </p>";
			$pdo_smt = $pdo_conn->prepare($strSQL);
			$ketqua = $pdo_smt->execute();
			if($ketqua==FALSE)
				die("<h3> LỖI TRUY VẤN CSDL</H3>");
			$total=0;
			while($row = $pdo_smt->fetch())
			{
				$id = $row["id"];
				$title = $row["title"];
				$author = $row["author"];
				$price = $row["price"];
			echo "<div class='pro'>";
			echo "<h3>$title</h3>";
			echo "Tac gia: $author - Gia: ".number_format($price,3)." VND<br />";
			echo "<p align='right'>So Luong: <input type='text' name='qty[$id]' size='5' value='{$_SESSION['cart'][$id]}'> - ";
			echo "<a href='delcart.php?item=$id'>Xoa Sach Nay</a></p>";
			echo "<p align='right'> Gia tien cho mon hang: ". number_format($_SESSION['cart'][$id]*$price,3) ." VND</p>";
			echo "</div>";
			$total+=$_SESSION['cart'][$id]*$price;
			}
		echo "<div class='pro' align='right'>";
		echo "<b>Tong tien cho cac mon hang: <font color='red'>". number_format($total,3)." VND</font></b>";
		echo "</div>";
		echo "<input type='submit' name='capnhat' value='Cap Nhat Gio Hang'>";
		echo "<div class='pro' align='center'>";
		echo "<b><a href='index.php'>Mua Sach Tiep</a> - <a href='delcart.php?productid=0'>Xoa Bo Gio Hang</a></b>";
		echo "</div>";	
	}

else
	{
		echo "<div class='pro'>";
		echo "<p align='center'>Ban khong co mon hang nao trong gio hang<br /><a href='index.php'>Buy Ebook</a></p>";
		echo "</div>";
	}
?>
</body>
</html>