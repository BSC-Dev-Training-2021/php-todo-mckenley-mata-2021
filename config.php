<?php 
class database{
	private $localhost="localhost";
	private $db="db_blogpost";
	private $username="mckenley";
	private $password="mckenley";
	public $conn;

	public function getConnection(){
		$this->conn=null;
		try {
			$this->conn= new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		} catch (PDOException $exception) {
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->conn;
	}
}
 ?>