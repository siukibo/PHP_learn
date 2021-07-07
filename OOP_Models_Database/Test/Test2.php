<?php
require("DungChung.php");
$conn = KetnoiCSDL();
$sql = "SELECT * FROM books WHERE id=?";
//khi câu sql có 1 ? cũng phải khai báo data là dạng biến mảng
$data[]=1;
$pdo_stm = $conn->prepare($sql);
//thực thi lệnh sql với 1 giá trị từ mảng data
$ketqua = $pdo_stm->execute($data);
if($ketqua==TRUE)
{
	echo "<p> SELECT thành công </p>";
	$row = $pdo_stm->fetch();
	print_r($row);
}else
	echo "<p> SELECT lỗi </p>";
?>