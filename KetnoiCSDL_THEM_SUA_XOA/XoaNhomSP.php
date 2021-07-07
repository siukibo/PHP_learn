<?php
require("DungChung.php");
//lấy thông tin từ url
$id = $_REQUEST["id"];//lấy id từ form
//Kết nối CSDL và thực hiện lệnh SQL
$conn = KetnoiCSDL();
$sql = "DELETE FROM tbNhomSP WHERE manhom=?";
$pdo_stm = $conn->prepare($sql);
$pdo_stm->bindParam(1, $id);
$ketqua = $pdo_stm->execute();//thực thi  lệnh sql
if($ketqua==false)
	echo "<h3> LỖI xóa DỮ LIỆU </h3>";
else
	echo "<h3> Thành công </h3>";
?>
<a href="DSNhomSP.php"> Danh sách nhóm SP</a>