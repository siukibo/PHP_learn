<?php
if(isset($_REQUEST["b1"])==false)//nếu form chưa submit
{
	die("<h3>CHƯA SUBMIT FORM</h3>");
}

$thongtin = $_REQUEST["thongtin"];
if($_FILES["file1"]["error"]!=0)
	die("<h3>Lỗi upload file</h3>");
	
$filename = $_FILES["file1"]["name"];
$tmp_name = $_FILES["file1"]["tmp_name"];//đường dẫn tới file đã được lưu trên máy chủ
echo "<P> file name: $filename </p>";
echo "<P> tệp ở thư mục tạm: $tmp_name </P>";
//Move tệp tạm ở thư mục $tmp_name sang thư mục cầu lưu trữ với tên tệp gốc
move_uploaded_file($tmp_name,"Uploads/$filename");
?>
<h3>ảnh đã upload</h3>
<img width="200" src="Uploads/<?=$filename?>" style="border:1px red solid">