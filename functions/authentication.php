<?php

class Authentication {

	private $email;
	private $pass;
	private $conn;
	
	public function userLogin($email,$pass) {
	
		$conn = new dbClass();
		$this->conn = $conn;
		$this->email = $email;
		$this->pass = $pass;
		
		$result = $conn->getData("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass' ");
		// var_dump($result);
		if($result !=''){
			// var_dump($result);
			
			$_SESSION['USER_NAME'] = $result['name'];
			$_SESSION['USERS_USER_ID'] = $result['id'];
			$_SESSION['USER_Type'] = "user";
			
			$_SESSION['USERS_USER_IP'] = $_SERVER['REMOTE_ADDR'];
			
			return true; 
		
		} else {
			return false;
		}
	}

	public function vendorLogin($email,$pass) {
	
		$conn = new dbClass();
		$this->conn = $conn;
		$this->email = $email;
		$this->pass = $pass;
		
		$result = $conn->getData("SELECT * FROM `vendor` WHERE `email` = '$email' AND `password` = '$pass' ");
		// var_dump($result);
		if($result !=''){
			// var_dump($result);
			
			$_SESSION['Vendor_NAME'] = $result['name'];
			$_SESSION['Vendor_ID'] = $result['id'];
			$_SESSION['USER_Type'] = "vendor";
			$_SESSION['Vendor_IP'] = $_SERVER['REMOTE_ADDR'];
			
			return true; 
		
		} else {
			return false;
		}
	}

	public function checkSession() {
        if (!isset($_SESSION['USERS_USER_ID']) || $_SESSION['USERS_USER_ID'] == '') {
            header('Location: index.php');
            exit();
        }
    }
	public function checkVendorSession() {
        if (!isset($_SESSION['Vendor_ID']) || $_SESSION['Vendor_ID'] == '') {
            header('Location: login.php');
            exit();
        }
    }
	
	public function SignOut() {
		unset($_SESSION['USERS_USER']);
		unset($_SESSION['USERS_USER_ID']);

		unset($_SESSION['USERS_USER_IP']);
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
			$query = "UPDATE `users` SET `password` = :password WHERE `id` = :id";
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
			$query = "SELECT `password` FROM `users` WHERE `id`= :id";
			$params = array(':id' => $userId);

			$result = $this->db->getDataWithParams($query, $params);

			if ($result && $result['password'] === $enteredPassword) {
				return true; 
			} else {
				return false;
			}
		} catch (PDOException $e) {
			error_log("Error verifying password: " . $e->getMessage());
			return false;
		}
	}
}