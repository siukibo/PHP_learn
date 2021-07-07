<?php
class clsDatabase
{
	public $conn = NULL; //lưu đối tượng PDO kết nối CSDL 
	public $pdo_stm = NULL;//lưu đối tượng PDOStatement
	function clsDatabase()
	{
		try//kết nối CSDL và lưu vào thuộc tính conn
		{
			$this->conn = new PDO("mysql:host=localhost;dbname=shop","root","");
			$this->conn->exec("SET NAMES UTF8");//Thiết lập làm việc với unicode
		}
		catch(PDOException $ex)
		{
			echo "<h3>" . $ex->getMessage() . "</h3>";
			die("<h3> LỖI KẾT NỐI CSDL </h3>");
		}
	}
	//Xây dựng hàm Thực thi SQL Dùng chung cho mọi lệnh SELECT, INSERT, UPDATE, DELETE
	//tham số $sql: câu lệnh sql cần thực thi
	//tham số $data: mảng chứa các dữ liệu tương ứng với tham số ? trong lệnh sql
	//trả TRUE: thành công, FALSE: lỗi
	function ThucthiSQL($sql, $data=NULL)
	{
		$this->pdo_stm = $this->conn->prepare($sql);
		$ketqua=false;
		if($data!=NULL)
			$ketqua = $this->pdo_stm->execute($data);
		else
			$ketqua = $this->pdo_stm->execute();
		return $ketqua;
	}
}
?>