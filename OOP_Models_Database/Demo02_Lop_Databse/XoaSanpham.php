<?php
require("Models/clsSanpham.php");
if(isset($_REQUEST["id"])==FALSE)
{
	echo "<p>link chạy bài: XoaSanpham.php?id=masach</p>";
	echo "<p> ví dụ xóa sách id=1</p>";
	echo "<a href='XoaSanpham.php?id=1'> Test xóa  </a>";
	die();
}
$id = $_REQUEST["id"];
//tạo đối tượng của lớp clsSanpham
$sanpham = new clsSanpham();
//gọi hàm xóa sách
$ketqua = $sanpham->XoaSanpham($id);
if($ketqua==FALSE)
	die("<p>Lỗi xóa dũ liệu</p>");
else
	echo "<p>xóa dữ liệu id =$id thành công</p>";
?>