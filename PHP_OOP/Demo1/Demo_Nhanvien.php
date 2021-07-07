<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DEMO sử dụng lớp clsNhanvien</title>
</head>
<body>
<h2> Demo sử dụng lớp clsNhanvien</h2>
<?php
require("clsNhanvien.php");
//tạo đối tượng (instance/object) của lớp clsNhanvien
$nv1 = new clsNhanvien("NV01", "Phương");
$nv2 = new clsNhanvien("","");
$nv2->setManv("NV02");
$nv2->setHoten("Linh");
echo "<h3> Nhân viên 1 </h3>";
$nv1->Hienthi();
echo "<h3> Nhân viên 2 </h3>";
$nv2->Hienthi();
//khai báo và sử dụng lớp con
require("clsNhanvienKythuat.php");
$nv3 = new clsNhanvienKythuat("NV03", "Hải", 24);
echo "<h3> Nhân viên 3</h3>";
$nv3->Hienthi();
?>
</body>
</html>