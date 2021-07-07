<?php
require_once("clsNhanvien.php");
//tạo lớp con kế thừa lớp clsNhanvien
class clsNhanvienKythuat extends clsNhanvien
{
	public $ngaycong;
	//khai báo hàm tạo
	function clsNhanvienKythuat($manv, $hoten,$ngaycong)
	{
		parent::__construct($manv,$hoten);//gọi hàm tạo của lớp cha
		$this->ngaycong = $ngaycong;
	}
	function getNgaycong()
	{
		return $this->ngaycong;
	}
	function setNgaycong($ngaycong)
	{
		$this->ngaycong = $ngaycong;
	}
	function Hienthi()//ghi đè (Ovreride) hàm Hienthi() của lớp cha
	{
		parent::Hienthi();//gọi hàm hiển thị kế thừa từ lớp cha
		echo "<p> Ngày công: " . $this->ngaycong. "</p>";
	}
}
?>