<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Demo form input là mảng</title>
</head>

<body>
<?php
	session_start();
	$cart = array(1=>2, 3 => 1, 5 =>4);
	$_SESSION["cart"] = $cart;
?>
<form action="UpdateCart.php" method="post">
	<?php
	foreach($cart as $id => $soluong)
	{
	?>
	<p>Sản phẩm <?=$id?>: <input type="text" name="sp[<?=$id?>]" value="<?=$soluong?>" size="5"></p>
	<?php
	}
	?>
	<p><input name="capnhat" type="submit" value="Update"></p>
</form>
</body>
</html>