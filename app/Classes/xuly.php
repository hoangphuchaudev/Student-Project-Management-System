<?php 
namespace App\Classes;

define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
define('DB_NAME','qlda-nv');
class xuly
{
	private $__conn;
	function connect()
	{
		if(!$this->__conn)
		{
			$this->__conn= mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
			 mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		}
	}
	function dis_connect()
	{
		if($this->__conn)
		{
			mysqli_close($this->__conn);
		}
	}
	function insertDB($data,$table)
	{
		$this->connect();

    $field_list = '';
    // Lưu trữ danh sách giá trị tương ứng với field
    $value_list = '';
 
    // Lặp qua data
    foreach ($data as $key => $value){
        $field_list .= ",$key";
        $value_list .= ",'".mysqli_real_escape_string($this->__conn,$value)."'";
    }
 
    // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
    $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
    return mysqli_query($this->__conn, $sql);


	}
	function updateDB($table, $data, $where)
	{
		 // Kết nối
    $this->connect();
    $sql = '';
    // Lặp qua data
    foreach ($data as $key => $value){
        $sql .= "$key = '".mysqli_real_escape_string($this->__conn,$value)."',";
    }
 
    // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
    $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
 
    return mysqli_query($this->__conn, $sql);
	}
	function removeDB($table, $where)
	{
    $this->connect();
 
    $sql = "DELETE FROM $table WHERE $where";
    return mysqli_query($this->__conn, $sql);
	}
	function getlist($sql)
	{
		  // Kết nối
    $this->connect();
 
    $result = mysqli_query($this->__conn, $sql);
 
    if (!$result){
        die ('Câu truy vấn bị sai');
    }
 
    $return = array();
 
    // Lặp qua kết quả để đưa vào mảng
    $i=0;
    $row=array();
    while ($row = mysqli_fetch_assoc($result)){
        $return[] = $row;  
        $i++; 
    }
 
    // Xóa kết quả khỏi bộ nhớ
    mysqli_free_result($result);
 
    return $return;

	}
	// Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
	function get_row($sql)
	{
    // Kết nối
    $this->connect();
 
    $result = mysqli_query($this->__conn, $sql);
 
    if (!$result){
        die ('Câu truy vấn bị sai');
    }
 
    $row = mysqli_fetch_assoc($result);
    
 
    // Xóa kết quả khỏi bộ nhớ
     mysqli_free_result($result);
 
    if ($row){
        return $row;
    }
 
    return false;
	}

}

 ?>