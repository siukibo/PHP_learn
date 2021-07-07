<?php
require("Models/clsSanpham.php");
//tạo đối tượng của lớp clsSanpham
$sanpham = new clsSanpham();
echo "<h3> Danh mục sách</h3>";
//hiển thị sách
$ketqua = $sanpham->LayDanhSachSanpham();
if($ketqua)
{
	$rows = $sanpham->data;
	foreach($rows as $row)
	{
		echo "<p> Tên:". $row["title"] . " - Tác giả: " . $row["author"]. 
		" - Giá: " . $row["price"] . "</p>";
	}
}
?>