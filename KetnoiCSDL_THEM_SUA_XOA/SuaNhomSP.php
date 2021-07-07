<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa nhóm sản phẩm</title>
</head>
<body>
<h2 align="center"> Sửa NHÓM SẢN PHẨM</h2>
<?php
$id = $_REQUEST["id"];
require("Dungchung.php");
$conn = KetnoiCSDL();
$sql = "SELECT * FROM tbNhomSP WHERE manhom=?";
$pdo_stm = $conn->prepare($sql);
$pdo_stm->bindParam(1,$id);
$ketqua = $pdo_stm->execute();
if($ketqua==false)
	die("<h3> LỖI TRUY VẤN CSDL</h3>");
if($pdo_stm->rowCount()==0)
	die("<h3> KHÔNG TÌM THẤY DỮ LIỆU</h3>");
$row = $pdo_stm->fetch(PDO::FETCH_BOTH);//lấy 1 dòng dữ liệu vào biến $row
?>
<form name="f1" id="f1" method="post" action="XulySuaNhomSP.php">
<input type="hidden" name="id" id="id" value="<?=$id?>">
<table width="400" align="center" border="0">
<tr><td width="100">Tên nhóm:</td>
    <td width="300">
    <input type="text" name="tennhom" id="tennhom" value="<?=$row["tennhom"]?>"></td>
</tr>
<tr><td width="100">Số thứ tự:</td>
    <td width="300">
    <input type="text" name="sothutu" id="sothutu" value="<?=$row["sothutu"]?>"></td>
</tr>
<tr><td width="100">Hiển thị:</td>
    <td width="300">
    <input type="checkbox" name="trangthai" id="trangthai" 
    	value="1" <?=$row["trangthai"]==true?"checked":""?> >
    </td>
</tr>
<tr><td colspan="2" align="center">
    <input type="submit" name="b1" id="b1" value="Đồng ý">&nbsp;&nbsp;
    <input type="reset" name="b2" id="b2" value="Nhập lại">
    </td>
</tr>
</table>
</form>
</body>
</html>