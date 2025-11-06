<?php

class Authentication {

	private $email;
	private $pass;
	private $conn;
	
	public function adminLogin($email,$pass) {
	
		$conn = new dbClass();
		$this->conn = $conn;
		$this->email = $email;
		$this->pass = $pass;
		
		$result = $conn->getData("SELECT * FROM `admin` WHERE `username` = '$email' AND `password` = '$pass' ");
		// var_dump($result);
		if($result !=''){
			// var_dump($result);
			
			$_SESSION['ADMIN_USER'] = $result['username'];
			$_SESSION['ADMIN_USER_ID'] = $result['id'];
			
			$_SESSION['ADMIN_USER_IP'] = $_SERVER['REMOTE_ADDR'];
			
			return true; 
		
		} else {
			return false;
		}
	}

	public function checkSession() {
        if (
            !isset($_SESSION['ADMIN_USER_ID']) || $_SESSION['ADMIN_USER_ID'] == '' 
            
        ) {
            header('Location: index.php');
            exit();
        }
    }
	
	public function SignOut() {
		unset($_SESSION['ADMIN_USER']);
		unset($_SESSION['ADMIN_USER_ID']);
		unset($_SESSION['ADMIN_USER_TYPE']);
		unset($_SESSION['ADMIN_USER_IP']);
		session_destroy();
		echo "<script>window.location.href='index.php'</script>";
	}
}

class ChangePassword
{
    private $db;

    public function __construct()
    {
        $this->db = new dbClass();
    }

    public function changePassword($userId, $newPassword)
	{
		$userId = (int) $userId;

		try {
			$query = "UPDATE `admin` SET `password` = :password WHERE `id` = :id";
			$params = array(':password' => $newPassword, ':id' => $userId);

			$stmt = $this->db->executeUpdateWithRowCount($query, $params);

			if ($stmt !== false) {
				return true; // Successfully changed password
			} else {
				return false; // Error occurred
			}
		} catch (PDOException $e) {
			error_log("Error changing password: " . $e->getMessage());
			return false; // Error occurred
		}
	}

	public function verifyPassword($userId, $enteredPassword)
	{
		$userId = (int) $userId;

		try {
			$query = "SELECT `password` FROM `admin` WHERE `id`= :id";
			$params = array(':id' => $userId);

			$result = $this->db->getDataWithParams($query, $params);

			if ($result && $result['password'] === $enteredPassword) {
				return true; // Passwords match
			} else {
				return false; // Incorrect password
			}
		} catch (PDOException $e) {
			error_log("Error verifying password: " . $e->getMessage());
			return false; // Error occurred
		}
	}
}

?>