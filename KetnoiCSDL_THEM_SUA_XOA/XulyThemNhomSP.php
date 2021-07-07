<?php
require("DungChung.php");
//lấy thông tin từ form
if(isset($_REQUEST["b1"])==false)
	die("chưa submit form");
$tenhom = $_REQUEST["tennhom"];
$sothutu = $_REQUEST["sothutu"];
$trangthai=0;
if(isset($_REQUEST["trangthai"])==true)//nếu checkbox name="trangthai" được check
	$trangthai=1;
//Kết nối CSDL và thực hiện lệnh SQL
$conn = KetnoiCSDL();
$sql = "INSERT INTO tbNhomSP VALUES(NULL,?,?,?)";
$pdo_stm = $conn->prepare($sql);
$pdo_stm->bindParam(1, $tenhom);
$pdo_stm->bindParam(2, $sothutu);
$pdo_stm->bindParam(3,$trangthai);
$ketqua = $pdo_stm->execute();//thực thi  lệnh sql
if($ketqua==false)
	echo "<h3> LỖI THÊM DỮ LIỆU </h3>";
else
	echo "<h3> Thành công </h3>";
?>
<a href="DSNhomSP.php"> Danh sách nhóm SP</a>