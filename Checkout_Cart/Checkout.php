<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thanh toán hóa đơn</title>
</head>
<body>
<?php
session_start();
require("Dungchung.php");
//Lấy thông tin từ form và chèn hóa đơn mới
if(isset($_REQUEST["dathang"])==false)
	die("lỗi submit form");
$hoten = $_REQUEST["hoten"];
$diachi = $_REQUEST["diachi"];
$dienthoai = $_REQUEST["dienthoai"];
$ngaynhan = $_REQUEST["ngaynhan"];
$pdo_conn = KetnoiCSDL();
$strSQL = "INSERT INTO tbHoadon(tennguoimua,diachi,dienthoai,ngaynhan) VALUES(?,?,?,?)";
$pdo_stm = $pdo_conn->prepare($strSQL);
$pdo_stm->bindParam(1,$hoten);
$pdo_stm->bindParam(2,$diachi);
$pdo_stm->bindParam(3,$dienthoai);
$pdo_stm->bindParam(4,$ngaynhan);
$ketqua = $pdo_stm->execute();
if($ketqua==FALSE)
	die("<p> LỖI THÊM HÓA ĐƠN </p>");
//lấy mã hóa đơn tự động sinh từ lệnh insert trên
$mahd = $pdo_conn->lastInsertId();
echo "<p> MÃ HÓA ĐƠN: $mahd </p>";
//duyệt giỏ hàng và lưu các sản phẩm vào chi tiết hóa đơn gắn với mahd mới
$ok= TRUE;
foreach($_SESSION["cart"] as $id=>$soluong)
{
	$giasp = layGiaSP($id);//kết nối csdl lấy giá của sản phẩm từ books
	$strSQL = "INSERT INTO tbChitietHoadon VALUES(NULL,?,?,?,?)";
	$pdo_stm = $pdo_conn->prepare($strSQL);
	$pdo_stm->bindParam(1,$mahd);
	$pdo_stm->bindParam(2,$id);
	$pdo_stm->bindParam(3,$soluong);
	$pdo_stm->bindParam(4,$giasp);
	$ketqua = $pdo_stm->execute();
	if($ketqua==FALSE)
	{
		$ok = FALSE;
		die("<p> LỖI THÊM CHI TIẾT HÓA ĐƠN </p>");
	}
}
if($ok)
	echo "<H3> CẢM ƠN BẠN ĐÃ MUA HÀNG, CHÚNG TÔI SẼ LIÊN HỆ SỚM NHẤT</H3>";
?>
</body>
</html>