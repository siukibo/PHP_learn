<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách nhóm sản phẩm</title>
</head>

<body>
<h1> Danh sách nhóm sản phẩm</h1>
<a href="ThemNhomSP.php"> THÊM NHÓM SẢN PHẨM MỚI</a>
<?php
require("DungChung.php");
$conn = KetnoiCSDL();//gọi hàm kết nối CSDL và lưu lại đối tượng PDO 
$sql = "SELECT * FROM tbnhomsp";
$pdo_stm = $conn->query($sql);//thực hiện lệnh sql trả về PDOStatement
if($pdo_stm==NULL)
	die("<H3>LỖI SQL</H3>");
$n =$pdo_stm->rowCount();//lấy số bản ghi kết quả
echo "<h3> số kết quả nhóm sản phẩm là $n </h3>";
//lấy mảng chứa các dòng và cột từ kết quả SELECT
$rows  = $pdo_stm->fetchAll(PDO::FETCH_ASSOC);
//PDO::FETCH_BOTH truy cập cả theo tên cột hoặc số thứ tự cột
//print_r($rows);//hiển thị cấu trúc mảng
?>
 <table width="800" border="1" align="center" cellspacing="0">
    <tr bgcolor="#FF9900">
        <td width="10%"> Mã nhóm</td>
        <td width="50%"> Tên nhóm</td>
        <td width="10%"> Số thứ tự</td>
        <td width="10%"> Trạng Thái</td>
        <td width="30%"> Thao tác </td>
    </tr>
	<?php
	foreach($rows as $row)//lặp từng dòng trong mảng $rows lưu vào mảng 1 chiều $row	
	{//hiển thị từng dòng
	?>
    <tr>
        <td width="10%"> <?=$row["manhom"]?></td>
        <td width="50%"> <?=$row["tennhom"]?></td>
        <td width="10%"> <?=$row["sothutu"]?></td>
        <td width="10%"> <?=$row["trangthai"]?></td>
        <td width="30%"> Sửa - Xóa </td>
    </tr>
    <?
	}//kết thúc vòng lặp foreach
    ?>
</table>
</body>
</html>