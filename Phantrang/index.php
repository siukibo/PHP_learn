<?php
require("DungChung.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Demo Phân trang</title>
	<link rel="stylesheet" href="style_cart.css" />
</head>
<body>
<h1>DemoPhân trang</h1>

<?php
$pdo_conn = KetnoiCSDL();

$limit = 2; 

$total_records = 0;
$strSQL = "SELECT COUNT(*) AS tong FROM books";
$pdo_smt = $pdo_conn->prepare($strSQL);
$ketqua = $pdo_smt->execute();
if($ketqua==FALSE)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
$row = $pdo_smt->fetch();
$total_records = $row["tong"];

$total_pages = ceil($total_records/$limit);

$current_page = 1;
if(isset($_REQUEST["trang"]) && is_numeric($_REQUEST["trang"]))
{
	$current_page = $_REQUEST["trang"];
}
if($current_page<=0)
	$current_page=1;
if($current_page>$total_pages)
	$current_page = $total_pages;

$start = ($current_page-1)*$limit;


$strSQL = "select * from books order by id desc LIMIT $start,$limit";
$pdo_smt = $pdo_conn->prepare($strSQL);
$ketqua = $pdo_smt->execute();
if($ketqua==FALSE)
	die("<h3> LỖI TRUY VẤN CSDL</H3>");
if($pdo_smt->rowCount()<=0)
	die("<h3> Không có sản phẩm nào</h3>");
if($pdo_smt->rowCount() > 0)
{
	$rows = $pdo_smt->fetchAll();
	foreach($rows as $row)
	{
		$id = $row["id"];
		$title = $row["title"];
		$author = $row["author"];
		$price = $row["price"];
		
		echo "\n<div class='pro'>";
		echo "<h3>$title</h3>";
		echo "Tac Gia: $author - Gia: ".number_format($price,3)." VND";
		echo "</div>\n";
	}
}
	
	$trang=1;
	echo "<B>Trang:</B>";
	echo "<a href='?trang=$trang'> Đầu </a> |";
	$trang = (($current_page-1)>0)?($current_page-1):1;
	echo "<a href='?trang=$trang'> Trước </a> |";
	
	for($trang=1;$trang<=$total_pages;$trang++)
	{
		$strStyle="";
		if($trang==$current_page)
			$strStyle="color:red";
		echo "<a href='?trang=$trang' style='$strStyle'> $trang </a> |";
	}
	$trang = (($current_page+1)<=$total_pages)?($current_page+1):$total_pages;
	echo "<a href='?trang=$trang'> Tiếp </a> |";
	$trang = $total_pages;
	echo "<a href='?trang=$trang'> Cuối </a>";
	echo "\n";
?>
</body>
</html>