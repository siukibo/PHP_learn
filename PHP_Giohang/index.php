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
<div id='cart'>
<?php
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	}

	if ($ok != 2)
	 {
		echo '<p>Ban khong co mon hang nao trong gio hang</p>';
	} else {
		$items = $_SESSION['cart'];
		echo '<p>Ban dang co <a href="cart.php">'.count($items).' mon hang trong gio hang</a></p>';
	}
?>
</div>
<?php
$pdo_conn = KetnoiCSDL();
$strSQL = "select * from books order by id asc";
$pdo_smt = $pdo_conn->prepare($strSQL);
$ketqua = $pdo_smt->execute();
if($ketqua==FALSE)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($pdo_smt->rowCount()<=0)
	die("<h3> Không có sản phẩm nào</h3>");
if($pdo_smt->rowCount() > 0)
{
	while($row = $pdo_smt->fetch())
	{
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