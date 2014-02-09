<?php
	session_start();

	if (isset($_POST['action']) && $_POST['action'] == 'retrieve_country_info')
	{
		retrieve_country_info();		
	}

	function retrieve_country_info()
	{
		$process = new Process($_POST['action'], 'world');
		$query = "SELECT name, continent, region, population, life_expectancy, government_form
				  FROM countries
				  WHERE id = {$_POST['country_name']}";

		$database = $process->get_database();
		$_SESSION['process'] = $database->fetch_record($query);

		header("Location: country.php");
	}

	class Process 
	{
		private $name;
		private $database;

		public function __construct($name, $database)
		{
			$this->name = $name;
			$this->database = new Database($database);
		}

		public function get_name()
		{
			return $this->name;
		}

		public function get_database()
		{
			return $this->database;
		}
	}

	class Database
	{
		private $connection;

		public function __construct($database)
		{
			define('DB_HOST', 'localhost');
			define('DB_USER', 'root');
			define('DB_PASS', '');
			define('DB_DATABASE', $database);
			$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		}

		public function get_connection()
		{
			return $this->connection;
		}

		public function fetch_all($query)
		{
			$data = [];
			$result = mysqli_query($this->connection, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			return $data;
		}

		//use when expecting a single result
		public function fetch_record($query)
		{
			$result = mysqli_query($this->connection, $query);
			return mysqli_fetch_assoc($result);
		}
	}
?>