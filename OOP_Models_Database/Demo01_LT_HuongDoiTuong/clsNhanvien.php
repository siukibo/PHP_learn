<?php
class clsNhanvien{
	//khai báo các thuộc tính của lớp Nhanvien
	public $manv;
	public $hoten;
	//khai báo hàm tạo
	function clsNhanvien($manv, $hoten){
		$this->manv = $manv;
		$this->hoten = $hoten;
	}
	//khai báo một số hàm getter, setter
	function getManv()
	{
		return $this->manv;
	}
	function setManv($manv)
	{
		$this->manv=$manv;
	}
	function getHoten()
	{
		return $this->hoten;
	}
	function setHoten($hoten)
	{
		$this->hoten=$hoten;
	}
	//hàm hiển thị thông tin
	function Hienthi()
	{
		echo "<p> Mã nv: " . $this->manv . "</p>";
		echo "<p> Họ tên: " . $this->hoten. "</p>";
	}
}
?>