<?php
function KetnoiCSDL()
{
	$conn = NULL;
	try
	{
		$conn = new PDO("mysql:host=localhost;dbname=shop","root","");
		$conn->exec("SET NAMES UTF8");
		
	}
	catch(PDOException $ex)
	{
		echo "<h3>" . $ex->getMessage() . "</h3>";
		die("<h3> LỖI KẾT NỐI CSDL </h3>");
	}
	return $conn;
}
?>