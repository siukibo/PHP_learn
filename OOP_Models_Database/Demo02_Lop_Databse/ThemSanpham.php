<?php
require("Models/clsSanpham.php");
//tạo đối tượng của lớp clsSanpham
$sanpham = new clsSanpham();
//thêm sách
$ketqua = $sanpham->ThemSanpham("Sách 3","Tác giả 3", 3000);
if($ketqua==FALSE)
	die("<p>Lỗi thêm dũ liệu</p>");
else
{
	echo "<p>thêm dũ liệu thành công</p>";
	$id = $sanpham->db->conn->lastInsertId();
	echo "<p> mã sách vừa thêm là $id</p>";
}
?>