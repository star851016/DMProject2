<?php
require_once "DB.php";

class DB_Tool extends DB
{
	public function get_value($table, $field, $condition = '1=1', $data = array())
	{
		$sql = "SELECT $field FROM $table WHERE $condition";
		$stmt = $this->db->prepare($sql);
		if($data){
			$stmt->execute($data);
		}else{
			$stmt->execute();
		}
		$value = $stmt->fetch(PDO::FETCH_ASSOC);
		if(count($value) == 1){
			return $value[$field];
		}
		return $value;
	}

	public function count_value($table, $field, $condition = '1=1'){
		$sql = "SELECT $field FROM $table WHERE $condition";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		$value = count($rows);
		return $value;
	}

	public function query_sql($sql)
	{
		$result = $this->db->query($sql);
		$data = $result->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function execute_sql($sql)
	{
		$rows = $this->db->exec($sql);
		$id = (startsWith($sql,'insert') && $rows)?$this->db->lastInsertId($result):null;
		if($rows!==false){
			$rows = (String)$rows;
		}

		return array('rows'=>$rows,'id'=>$id);
	}

	public function &get_DB()
	{
		return $this->db;
	}

	public function close()
	{
		$this->db = null;
	}
}
?>