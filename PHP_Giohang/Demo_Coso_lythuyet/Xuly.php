<?php
if(isset($_POST["capnhat"]))
{
	$arr = $_POST["sp"];//khi input name ="sp[xxx]" thì $_POST["sp"] trả về dạng mảng
	print_r($arr);
}
?>