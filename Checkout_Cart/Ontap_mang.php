<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ôn tập mảng</title>
</head>

<body>
<h2> ôn tập biến mảng</h2>
<?php
/*
trong php mảng có 2 dạng
- Dạng 1 mảng sử dụng chỉ số (index) truy cập là vị trí 0,1,2 như C, Java, C#
- Dạng 2 mảng sử dụng key truy cập là tên tự đặt (thay cho index 0,1,2) cho mỗi phần tử của mảng
*/
$arr1 = array("Hoa", "Tuấn", "Linh");//mảng dạng 1: mỗi phần tử được đánh vị trí 0,1,2
$arr2 = array("sp2" => 3, "sp1"=> 5, "sp3"=>2);//mảng dạng 2: sử dụng key riêng cho từng phần tử
$sophantu = count($arr1); //số phần tử = 3
//thêm phần tử
$arr1[3] = "Tùng";//thêm phần tử "Tùng" vào vị trí số 3 của mảng
$arr2["sp5"] = 1;//thêm phần tử có giá trị 1 vào mảng với key truy cập là sp5
//hiển thị mảng
echo "<p> mảng arr1</p>";
print_r($arr1);
echo "<p> mảng arr2</p>";
print_r($arr2);
//có thể tạo mảng bằng các sử dụng [] để thêm 1 phần tử vào mảng
$sp[] = "A";//phần tử 0
$sp[] = "B";//phần tử 1
echo "<p> mảng sp </p>";
print_r($sp);
//lấy danh sách các key của mảng arr2
$danhsach = array_keys($arr2);
echo "<p> danh sách key của mảng arr2 </p>";
print_r($danhsach);
$str = implode(",", $danhsach);
echo "<p> danh sách key: $str </p>";
?>
</body>
</html>