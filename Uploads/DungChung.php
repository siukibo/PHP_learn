<?php
//$inputName: tên của input chọn file, 
//$Folder là tên thư mục trên Server để lưu tệp Upload lên
//hàm trả về tên file trên máy chủ sau khi upload, trả về chuỗi rỗng nếu lỗi
function UploadFile($inputName, $Folder)
{
	if($_FILES[$inputName]["error"]!=0)
	 	return "";//trả về rỗng là lỗi
	$filename = "";
	$tmp_name = "";
 	$filename=$_FILES[$inputName]["name"];//lấy tên tệp gốc của file upload
	$tmp_name = $_FILES[$inputName]["tmp_name"];
	move_uploaded_file($tmp_name, "$Folder/$filename");
	return $filename; 
}
?>