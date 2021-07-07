<?php
require("DungChung.php");
if(isset($_REQUEST["b1"])==false)
	die("<h3> CHUA SUBMIT FORM</h3>");
$tep1 = UploadFile("file1","Uploads");
$tep2 = UploadFile("file2","Uploads");
if($tep1=="")
	echo "<h3>Lỗi upload file1</h3>";
else
	echo "<h3> file1: $tep1 </h3>";

if($tep2=="")
	echo "<h3>Lỗi upload file2</h3>";
else
	echo "<h3> file2: $tep2 </h3>";	
?>