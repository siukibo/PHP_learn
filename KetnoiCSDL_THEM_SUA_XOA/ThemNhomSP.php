<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm nhóm sản phẩm</title>
</head>
<body>
<h2 align="center"> THÊM NHÓM SẢN PHẨM</h2>
<form name="f1" id="f1" method="post" action="XulyThemNhomSP.php">
<table width="400" align="center" border="0">
<tr>
	<td width="100">Tên nhóm:</td>
    <td width="300"><input type="text" name="tennhom" id="tennhom"></td>
</tr>
<tr>
	<td width="100">Số thứ tự:</td>
    <td width="300"><input type="text" name="sothutu" id="sothutu"></td>
</tr>
<tr>
	<td width="100">Hiển thị:</td>
    <td width="300"><input type="checkbox" name="trangthai" id="trangthai" value="1"></td>
</tr>
<tr>
    <td colspan="2" align="center">
    <input type="submit" name="b1" id="b1" value="Đồng ý">&nbsp;&nbsp;
    <input type="reset" name="b2" id="b2" value="Nhập lại">
    </td>
</tr>
</table>
</form>
</body>
</html>