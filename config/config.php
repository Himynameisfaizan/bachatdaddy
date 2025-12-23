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

		// return $statement->execute();
		$success = $statement->execute();

		if (!$success) {
			$errorInfo = $statement->errorInfo();
			file_put_contents(
				__DIR__ . '/db_error.log',
				date('H:i:s') . " SQL ERROR: {$errorInfo[2]} | QUERY: {$query}\n",
				FILE_APPEND
			);
		}

		return $success;
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

	public function updateOfferDetailsAllOrNothing(
		int $vendor_id,
		int $offer_id,
		string $mobile,
		string $email,
		string $vendor_condition,
		string $general_condition,
		?array $imageFile // $_FILES['image'] ya null
	) {
		try {
			$this->conn->beginTransaction();

			// 1) mobile
			$stmt = $this->conn->prepare(
				"UPDATE vendermobile SET mobile = ? WHERE vendor_id = ? AND offer_id = ?"
			);
			$stmt->execute([$mobile, $vendor_id, $offer_id]);

			// 2) email
			$stmt = $this->conn->prepare(
				"UPDATE venderemail SET email = ? WHERE vendor_id = ? AND offer_id = ?"
			);
			$stmt->execute([$email, $vendor_id, $offer_id]);

			// 3) vendor condition
			$stmt = $this->conn->prepare(
				"UPDATE venderscondition SET `condition` = ? WHERE vendor_id = ? AND offer_id = ?"
			);
			$stmt->execute([$vendor_condition, $vendor_id, $offer_id]);

			// 4) general condition
			$stmt = $this->conn->prepare(
				"UPDATE vendergcondition SET `condition` = ? WHERE vendor_id = ? AND offer_id = ?"
			);
			$stmt->execute([$general_condition, $vendor_id, $offer_id]);

			// 5) image (optional)
			if (!empty($imageFile) && !empty($imageFile['name'])) {

				if ($imageFile['error'] !== UPLOAD_ERR_OK) {
					throw new Exception('Image upload error');
				}

				if ($imageFile['size'] > 2 * 1024 * 1024) { // 2MB
					throw new Exception('Image too large (max 2MB)');
				}

				$ext = pathinfo($imageFile['name'], PATHINFO_EXTENSION);
				$newName = 'vendor_' . $vendor_id . '_offer_' . $offer_id . '_' . time() . '.' . $ext;

				$uploadDir = __DIR__ . '/../uploads/vendor/';
				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0777, true);
				}

				$targetPath = $uploadDir . $newName;
				if (!move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
					throw new Exception('Failed to move uploaded file');
				}

				$stmt = $this->conn->prepare(
					"UPDATE vendor_image SET image = ? WHERE vendor_id = ? AND offer_id = ?"
				);
				$stmt->execute([$newName, $vendor_id, $offer_id]);
			}

			$this->conn->commit();
			return ['success' => true, 'message' => 'Offer details updated successfully'];
		} catch (Exception $e) {
			if ($this->conn->inTransaction()) {
				$this->conn->rollBack();
			}
			return ['success' => false, 'message' => $e->getMessage()];
		}
	}
}

date_default_timezone_set("Asia/Kolkata");
$dateTime = date('Y-m-d H:i:s');
$date = date('Y-m-d');
$time = date('H:i:s');

$websiteTitle = 'RBM Wealth Management';
$websiteUrl = 'https://www.rbmwm.com/';
$copyright = '<strong>Copyright &copy; 2024 <a href="#">RBM Wealth Management</a>.</strong> All rights reserved.';
