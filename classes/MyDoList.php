<?php
/**
*  MyDoList Class
*/
	require_once "./lib/DB.php";
	class MyDoList
	{
		private $db;
		function __construct()
		{
			$this->db = new DB();
		}

		public function insert($table,$data){
			return $this->db->insert($table,$data);
		}

		public function update($table,$data,$cond){
			return $this->db->update($table,$data,$cond);
		}

		public function select($table,$order='id'){
			$sql = "SELECT * FROM $table  order by $order ";
			return $this->db->select($sql);
		}

		public function delete($table,$deletelistid){
			return $this->db->delete($table,$deletelistid);
		}

	}
