<?php
require_once("clsDatabase.php");
class clsSanpham
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsSanpham()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//Hàm LayDanhSachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
	function LayDanhSachSanpham()
	{
		$sql = "SELECT * FROM books";
		$ketqua = $this->db->ThucthiSQL($sql);// $db->ThucthiSQL($sql,NULL);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm thêm dữ liệu
	function ThemSanpham($name,$author,$price)
	{
		$sql = "INSERT INTO books VALUES (NULL, ?, ?, ?)";
		$data[] = $name;
		$data[] = $author;
		$data[] = $price;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);// $db->ThucthiSQL($sql,NULL);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaSanpham($id,$name,$author,$price)
	{
		$sql = "UPDATE books SET title=?, author = ?, price = ? WHERE id=?";
		$data[] = $name;
		$data[] = $author;
		$data[] = $price;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);// $db->ThucthiSQL($sql,NULL);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaSanpham($id)
	{
		$sql = "DELETE FROM books WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);// $db->ThucthiSQL($sql,NULL);
		return $ketqua;
	}
}
?>