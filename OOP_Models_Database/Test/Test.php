<?php
require("DungChung.php");
$conn = KetnoiCSDL();
$sql = "INSERT INTO books(title,author,price) VALUES(?,?,?)";
//tạo chứa các giá trị sẽ gắn cho các dấu ? trong sql
$data[] = "Sách mới"; //chèn 1 phần tử vào mảng
$data[] = "Tác giả mới";//chèn thêm 1 phần tử thứ 2 vào mảng
$data[] = 300;////chèn thêm 1 phần tử thứ 3 vào mảng
//gán câu lệnh sql cho đối tượng PDOStatement để thực thi
$pdo_stm = $conn->prepare($sql);
//thực thi câu lệnh sql với mảng data tương ứng với các dấu ?
$ketqua = $pdo_stm->execute($data);
if($ketqua==TRUE)
	echo "<p> thêm thành công </p>";
else
	echo "<p> thêm lỗi </p>";
?>