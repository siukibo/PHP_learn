<?php
require("Models/clsSanpham.php");
if(isset($_REQUEST["id"])==FALSE)
{
	echo "<p>link chạy bài:
		SuaSanpham.php?id=masach&name=ten_sach&author=tacgia&price=gia</p>";
	echo "<p> ví dụ sửa thông tin sách có id = 1</p>";
	echo "<a href='SuaSanpham.php?id=1&name=sach1&author=tacgia1&price=1000'>
	 	Test Cập nhật </a>";
	die();
}
//lấy dữ liệu từ thanh địa chỉ URL
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$author = $_REQUEST["author"];
$price = $_REQUEST["price"];
//tạo đối tượng của lớp clsSanpham
$sanpham = new clsSanpham();
//gọi hàm sửa sản phẩm
$ketqua = $sanpham->SuaSanpham($id,$name,$author,$price);
if($ketqua==FALSE)
	die("<p>Lỗi sửa dũ liệu</p>");
else
{
	echo "<p>sửa dữ liệu thành công</p>";
}
?>