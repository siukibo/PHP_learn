<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Demo Mảng giỏ hàng</title>
</head>

<body>
<?php
if(isset($cart)==false)
	echo "chưa có giỏ hàng";
//thêm 1 phần tử vào giỏ hàng
$cart[2] = 3;//thêm sản phẩm mã sp là 2 số lượng 3
$cart[1] = 5;//thêm sản phẩm mã sp là 1 số lượng 5
$cart[3] = 4;//thêm sản phẩm mã sp là 3 số lượng 4
echo "<p style='font-weight:bold'>giỏ hàng sau khi thêm 3 sản phẩm </p>";
print_r($cart);
foreach($cart as $id => $soluong)
{
	echo "<p> Sản phẩm id = $id, số lượng = $soluong</p>";
}
//Update số lượng của 1 sản phẩm: gán giá trị mới cho mảng tại vị trí có id tương ứng
//Update sản phẩm có id = 3, số lượng là 10
$cart[3] = 10;
echo "<p style='font-weight:bold'>giỏ hàng sau update số lượng của sản phẩm có id =3 </p>";
print_r($cart);
//xóa 1 sản phẩm khỏi giỏ hàng: xóa sản phẩm có id là 3
unset($cart[3]);
echo "<p style='font-weight:bold'>giỏ hàng sau xóa sản phẩm có id =3 </p>";
print_r($cart);
echo("<p style='font-weight:bold'>danh sách các mã sản phảm</p>");
print_r(array_keys($cart));//array_keys($arr): trả về danh sách các key truy cập của mảng
foreach(array_keys($cart) as $key)//vòng lặp lấy các mã sản phẩm trong mảng giỏ hàng
{
	echo"<p> mã sp: $key</p>";
}
?>
</body>
</html>