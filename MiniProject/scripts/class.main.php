<?php

require_once('dbconfig.php');

class MAIN
{	

	private $conn;
	
	public function hello()
	{
		echo "hello";
		exit;
	}
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass,$sex)
	{
		try
		{
			// $new_password = password_hash($upass, PASSWORD_DEFAULT);
			if($this->doLogin($uname,$upass) OR $this->doLogin($umail,$upass)){
				return false;
			}
			$stmt = $this->conn->prepare("INSERT INTO users(name,email,password,sex) 
		                                               VALUES(:uname, :umail, :upass,:sex)");
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $upass);
			$stmt->bindparam(":sex", $sex);
			
			$stmt->execute();	
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	
	
	public function doLogin($uname,$upass)
	{
		try
		{
			
			$stmt = $this->conn->prepare("SELECT * FROM users WHERE name=:uname OR email=:uname");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				$_SESSION['user_session'] = $userRow['id'];
				return true;
			}
			else{
				return false;
			}

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			exit;
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}


	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

	public function getDetails($id)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id,name,email,sex FROM users WHERE id=:id");
			$stmt->execute(array(':id'=>$id));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $userRow;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
	}

	public function getPic($details){
		if($details['sex']){
			return 'build/images/man.png';
		}
		else{
			return 'build/images/woman.png';
		}
	}

	public function getStatus($pin)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM leds WHERE pin=:pin");
			$stmt->execute(array(':pin'=>$pin));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $userRow['status'];
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
	}
	
	public function updateStatus($pin,$status)
	{
		try
		{
			$stmt = $this->conn->prepare("UPDATE leds SET status = :status WHERE pin=:pin");
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":pin",$pin);
			$stmt->execute();
			return ";";
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}


		
}

?>