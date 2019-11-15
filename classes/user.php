<?php
class User{

    private $_db;

    function __construct($db){
    	$this->_db = $db;
    }

	function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	function isValidUsername($username){
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}

	function login($username,$password){
        if (!$this->isValidUsername($username)) return false;
        if (strlen($password) < 3) return false;
		$row = $this->get_user_hash($username);
        
        if(password_verify($password,$row['password']) == 1){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['memberID'] = $row['memberID'];
            return true;
        }
    }

	function logout(){
		session_destroy();
	}

	function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
