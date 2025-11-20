<?php

class dbClass
{

	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $conn;
	private $error;

	public function __construct()
	{
		$this->connect();
	}

	public function __destruct()
	{
		$this->disconnect();
	}

	private function connect()
	{

		$this->host = 'localhost:3307';
		$this->user = 'root';
		$this->pass = '';
		$this->dbname = 'bachatdaddy_db';

		// $this->host = 'localhost';
		// $this->user = 'bachatdaddy_db';
		// $this->pass = 'Yt2F2ammvzgShpyqHmVZ';
		// $this->dbname = 'bachatdaddy_db';

		try {

			$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . '', $this->user, $this->pass);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Set MySQL time zone to IST (Asia/Kolkata)
			$this->conn->exec("SET time_zone = '+05:30';");
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		if (!$this->conn) {
			$this->error = 'Fatal Error :' . $e->getMessage();
		}

		return $this->conn;
	}

	



	public function getDbName()
	{
		return $this->dbname;
	}


	public function disconnect()
	{
		if ($this->conn) {
			$this->conn = null;
		}
	}

	public function getData($query)
	{
		$result = $this->conn->prepare($query);
		$query = $result->execute();
		if ($query == false) {
			echo 'Error SQL: ' . $query;
			die();
		}

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetch();

		return $reponse;
	}

	public function getDataWithParams($query, $params = [])
	{
		$result = $this->conn->prepare($query);

		foreach ($params as $key => &$value) {
			$result->bindParam($key, $value);
		}

		$query = $result->execute();
		if ($query == false) {
			echo 'Error SQL: ' . $query;
			die();
		}

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$response = $result->fetch();

		return $response;
	}

	public function getAllData($query)
	{
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
			echo 'Error SQL: ' . $ret;
			die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetchAll();

		return $reponse;
	}

	public function getRowCount($query)
	{
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
			return false;
		}
		$reponse = $result->rowCount();

		return $reponse;
	}

	public function execute($query)
	{
		$response = $this->conn->exec($query);

		if ($response == false)
			return false;
		else
			return true;
	}

	// used bindParam for security reason for user input
	// public function executeStatement($query, $params = []) {
	// 	$statement = $this->conn->prepare($query);
	// 	$success = $statement->execute($params);

	// 	if (!$success) {
	// 		return false;
	// 	}

	// 	return $statement;
	// }

	public function executeStatement($query, $params = [])
	{
		$statement = $this->conn->prepare($query);

		foreach ($params as $key => &$value) {
			$statement->bindParam($key, $value);
		}

		return $statement->execute();
	}

	public function executeUpdateWithRowCount($query, $params = [])
	{
		$statement = $this->conn->prepare($query);

		foreach ($params as $key => &$value) {
			$statement->bindParam($key, $value);
		}

		if (!$statement->execute()) {
			// Log or display error information
			$errorInfo = $statement->errorInfo();
			echo "SQL error: " . $errorInfo[2];
			return false;
		}

		return $statement; // Return the statement object
	}


	public function updateExecute($query)
	{
		$response = $this->conn->exec($query);

		if ($response == false)
			return false;
		else
			return true;
	}

	public function addStr($val)
	{
		$res = addslashes(trim($val));
		return $res;
	}

	public function removeStr($val)
	{
		$res = stripslashes(trim($val));
		return $res;
	}

	public function lastInsertId()
	{

		$res = $this->conn->lastInsertId();

		return $res;
	}

	public function slug($string)
	{
		$slug = strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace("/[^a-zA-Z0-9\-]/", '-', addslashes($string))), "-"));
		return $slug;
	}
}

date_default_timezone_set("Asia/Kolkata");
$dateTime = date('Y-m-d H:i:s');
$date = date('Y-m-d');
$time = date('H:i:s');

$websiteTitle = 'RBM Wealth Management';
$websiteUrl = 'https://www.rbmwm.com/';
$copyright = '<strong>Copyright &copy; 2024 <a href="#">RBM Wealth Management</a>.</strong> All rights reserved.';
