<?php 
	class db {
		private $host 	  = "localhost";
		private $db 	  = "messenger";
		private $username = "root";
		private $password = "";
		protected $con;

		public function __construct() {
			try {
				// new PDO()
				$this->con = new PDO("mysql:host=". $this->host .";dbname=". $this->db, $this->username, $this->password);
			} catch(Exception $e) {
				echo "DB Connection Error: " . $e->getMessage();
			}
		}
 	}
?>