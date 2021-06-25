<?php

class database {
	
	private $dbh;
	public function __construct(){
		try {
			$dsn = "mysql:host=localhost;dbname=examentraining;charset=utf8";
			$this->dbh = new PDO($dsn, 'root', '');
			// echo "Database connectie gemaakt ";
		} catch (\PDOException $exception){
			exit('Database connectie gefaald. Error message: ' . $exception->getMessage());
		}
	}

	public function insert_admin(){

	$hashed_password = password_hash('admin', PASSWORD_DEFAULT);
	$sql = "INSERT IGNORE INTO users VALUES 
	(NULL, :type_id, :email, :username, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	if ($statement->execute([
		'type_id' => '1',
		'email' => 'admin2@gmail.com',
		'username' => 'admin2',
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		])) {
		$last_id = $this->dbh->lastInsertId();
		$insert_hours = "INSERT IGNORE INTO hours VALUES 
		(:id, NULL, NULL, NULL, :created_at, :updated_at)";
		$stmt = $this->dbh->prepare($insert_hours);
		$stmt->execute([
		'id' => $last_id,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	}
}

	public function insert_user(){

	$hashed_password = password_hash('users', PASSWORD_DEFAULT);
	$sql = "INSERT IGNORE INTO users VALUES 
	(NULL, :type_id, :email, :username, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	if ($statement->execute([
		'type_id' => '2',
		'email' => 'user2@hotmail.com',
		'username' => 'user2',
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		])) {
		$last_id = $this->dbh->lastInsertId();
		$insert_hours = "INSERT IGNORE INTO hours VALUES 
		(:id, NULL, NULL, NULL, :created_at, :updated_at)";
		$stmt = $this->dbh->prepare($insert_hours);
		$stmt->execute([
		'id' => $last_id,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	}
}

	public function password_check($password){
	//works is alleen 1 omdat ik kan makkelijker kan inloggen
		if(strlen($password) < 1)

    die('Password must be at least 8 characters');
	}

	//signup form for admin
	public function create_admin( $email, $username, $password){

	
	$this->password_check($password);

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO user VALUES 
	(NULL, :type_id, :email, :username, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	
	if ($statement->execute([
		'type_id' => '1',
		'email' => $email,
		'username' => $username,
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		])) {
		$last_id = $this->dbh->lastInsertId();
		$insert_hours = "INSERT INTO hours VALUES 
		(:id, NULL, NULL, NULL, :created_at, :updated_at)";
		$stmt = $this->dbh->prepare($insert_hours);
		$stmt->execute([
		'id' => $last_id,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);

		echo "<strong>signup succesfull</strong>";
	  header("refresh:3");
	}else{
		echo "<strong>username of email already in use</strong>";
	}
}

	//signup form for admin
	public function create_user($email, $username, $password){

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT IGNORE INTO users VALUES 
	(NULL, :type_id, :email, :username, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
if ($statement->execute([
		'type_id' => '2',
		'email' => $email,
		'username' => $username,
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		])) {
		$last_id = $this->dbh->lastInsertId();
		$insert_hours = "INSERT INTO hours VALUES 
		(:id, NULL, NULL, NULL, :created_at, :updated_at)";
		$stmt = $this->dbh->prepare($insert_hours);
		$stmt->execute([
		'id' => $last_id,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);

		echo "<strong>signup succesfull</strong>";
	  header("refresh:3");
	}else{
		echo "<strong>username of email already in use</strong>";
	}
}
	  
	
	 

	public function update_user($id, $type_id, $email, $username, $password){

		if (empty($password)) {
			$sql = "UPDATE users SET id = :id, type_id = :type_id, email = :email, username = :username, updated_at = :updated_at WHERE id = :id";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'type_id' => $type_id,
			'email' => $email,
			'username' => $username,
			'updated_at' => date('Y-m-d H:i:s')
		]);
			echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1");

		}else{
			$sql = "UPDATE users SET id = :id, type_id = :type_id, email = :email, username = :username, password = :password, updated_at = :updated_at WHERE id = :id";
			$password = password_hash($password, PASSWORD_DEFAULT);
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'type_id' => $type_id,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'updated_at' => date('Y-m-d H:i:s')
			]);
			echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1");
			}	

	}

	public function update_department($id, $name, $postcode){

			$sql = "UPDATE departments SET id = :id, name = :name, postcode = :postcode WHERE id = :id";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'name' => $name,
			'postcode' => $postcode,
			'updated_at' => date('Y-m-d H:i:s')
		]);
			}

	public function add_department($department, $postcode){

	$sql = "INSERT IGNORE INTO departments VALUES 
	(NULL, :name, :postcode, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	// $statement->execute([
	// 	'name' => $department,
	// 	'postcode' => $postcode,
	// 	'created_at' => date('Y-m-d H:i:s'),
	// 	'updated_at' => date('Y-m-d H:i:s')
	// 	]);
	if ($statement->execute([
		'name' => $department,
		'postcode' => $postcode,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		])) { 
				echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1;departments.php");
				} else {
				   echo '<script language="javascript">';
				echo 'alert("Failed to update")';
				echo '</script>';
			header("refresh:1");
				}
		
	}

	public function delete_user($id){
		$sql = "DELETE FROM users WHERE id = :id ";

		$stmt = $this->dbh->prepare($sql);
		if ($stmt->execute($id)) {
			echo '<script language="javascript">';
				echo 'alert("Gegevens deleted")';
				echo '</script>';
			header("refresh:1;users.php");
				} else {
				   echo '<script language="javascript">';
				echo 'alert("Failed to delete")';
				echo '</script>';
			header("refresh:1;users.php");
				}
		}
		
	

	public function delete_department($id){
		$sql = "DELETE FROM departments WHERE id = :id ";

		$stmt = $this->dbh->prepare($sql);
		$stmt->execute($id);
		if(!$stmt->execute()) echo $stmt->error;
	}

	public function login($username, $password){
		$sql = "SELECT id, type_id, username, password FROM users WHERE username = :username";

        $stmt = $this->dbh->prepare($sql);

        $stmt->execute(['username'=>$username]);
     
        $result = $stmt->fetch();
        // var_dump($result);

               $hashed_password = $result['password'];
                // var_dump( password_verify($password, $hashed_password));

        if ($username && password_verify($password, $hashed_password)) {

                    session_start();
                    // userdate opslaan in session variables
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['username'] = $username;
                    $_SESSION['type_id'] = $result['type_id']; 
                    $_SESSION['loggedin'] = true;
                    echo '<strong>Login succesfull</strong>';

                    header("refresh:3;url=welcome.php"); 

                    // if ( $_SESSION['type_id'] == 1) {
                    // 	 header("refresh:3;url=welcome_admin.php");
                    // 	 exit;
                    // }else{
                    // 	header("refresh:3;url=welcome_user.php"); 
                    // exit;
                    // }
                    
        }else{
        	echo '<script language="javascript">';
			echo 'alert("Username and password do not match, please try again")';
			echo '</script>';
        	// echo 'Username and password do not match';
        }
	        
	}

	public function select($statement, $named_placeholder){

        // prepared statement (send statement to server  + checks syntax)
        $statement = $this->dbh->prepare($statement);

        $statement->execute($named_placeholder);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
        var_dump($result);

    }

    public function get_usertypes(){
    	 $sql = "SELECT id, type FROM usertype";
    	 $statement = $this->dbh->prepare($sql);
    	 $statement->execute($sql);
    	 $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    	 return $result;
    }

    public function hour_check($start_at, $end_at){

    	if ($start_at > $end_at) {
    		exit('start at cant be higher than end at ');

    	}
    }

    public function update_user_hour($id, $start_at, $end_at){

    		$this->hour_check($start_at, $end_at);

			$sql = "UPDATE hours SET id = :id, start_at = :start_at, end_at = :end_at,  updated_at = :updated_at WHERE id = :id";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'start_at' => $start_at,
			'end_at' => $end_at,
			'updated_at' => date('Y-m-d H:i:s')
		]);
			echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1");

	}

	public function update_user_hour_id($username, $start_at, $end_at){

    		$this->hour_check($start_at, $end_at);
    		$sql = "SELECT id from users WHERE username = :username";
    		$stmt = $this->dbh->prepare($sql);
    		$stmt->execute(['username'=>$username]);
    		$result = $stmt->fetch(PDO::FETCH_ASSOC);
    		$id = $result['id'];

			$sscl = "UPDATE hours SET start_at = :start_at, end_at = :end_at,  updated_at = :updated_at  WHERE id = :id";
			$statement = $this->dbh->prepare($sscl);
			$statement->execute([
			'id' => $id,
			'start_at' => $start_at,
			'end_at' => $end_at,
			'updated_at' => date('Y-m-d H:i:s')
		]);
			// echo '<script language="javascript">';
			// 	echo 'alert("Gegevens updated")';
			// 	echo '</script>';
			// header("refresh:1");

	}

	

	 public function update_image($id, $filename){

			$sql = "UPDATE image SET Filename = :Filename WHERE id = :id";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'Filename' => $filename
		]);
			echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1");

	}

	public function insert_image($id, $filename){

			// $sql = "UPDATE image SET Filename = :Filename WHERE id = :id";
			$sql = "INSERT IGNORE INTO image VALUES 
	(:id, :filename)";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'Filename' => $filename
		]);
			echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1");

	}


	 public function add_user_hour($id, $start_at, $end_at){

    		$this->hour_check($start_at, $end_at);

    		// $id = $this->select("SELECT id FROM users WHERE username = :username",['username' => $username]);

    // 		$result=$this->select("SELECT hours.id, usertype.type, user.username, departments.name, hours.start_at, hours.end_at, hours.created_at, hours.updated_at FROM HOURS 
    // LEFT JOIN user ON hours.id = user.id
    // LEFT join department_user ON department_user.user_id = user.id
    // LEFT JOIN departments ON department_user.departement_id = departments.id
    // LEFT JOIN usertype ON user.type_id = usertype.id WHERE user.username= :username", [':username' => $username]);
    // 		print_r($result);

    // 		print_r($id);
   
    
			$sql = "UPDATE hours SET id = :id, start_at = :start_at, end_at = :end_at,  updated_at = :updated_at WHERE id = $id";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'start_at' => $start_at,
			'end_at' => $end_at,
			'updated_at' => date('Y-m-d H:i:s')
		]);
			echo '<script language="javascript">';
				echo 'alert("Gegevens updated")';
				echo '</script>';
			header("refresh:1;hours.php");

	}


	// public function insert_user_department($id, $username){

	// 		$sql = "INSERT INTO department_user VALUES department_id = :id, user_id WHERE id = :id";
	// 		$statement = $this->dbh->prepare($sql);
	// 		$statement->execute([
	// 		'id' => $id,
	// 		'start_at' => $start_at,
	// 		'end_at' => $end_at,
	// 		'updated_at' => date('Y-m-d H:i:s')
	// 	]);
	// 		echo '<script language="javascript">';
	// 			echo 'alert("Gegevens updated")';
	// 			echo '</script>';
	// 		header("refresh:1");

	// }



public function delete_hours($id){

			$sql = "UPDATE hours SET id = :id, start_at = :start_at, end_at = :end_at,  updated_at = :updated_at WHERE id = :id";
			$statement = $this->dbh->prepare($sql);
			$statement->execute([
			'id' => $id,
			'start_at' => NULL,
			'end_at' =>  NULL,
			'updated_at' => date('Y-m-d H:i:s')
		]);

			// header("refresh:0;");

	}
	public function select_username($username){

			$id = "SELECT id from users where username = :username";
			$statement = $this->dbh->prepare($id);
			$statement->execute([
			'username' => $username
		]);
			$result = $statement->fetch();

			// header("refresh:add_user_hour?echo $sql;");

	}


	public function delete_user_departments($id){

		$this->delete_hours($id);

		$this->select("DELETE FROM department_user WHERE user_id = :id ",[':id' => $id]);

		// $stmt = $this->dbh->prepare($sql);
		// $stmt->execute($id);
		// if(!$stmt->execute()) echo $stmt->error;
	}

	public function insert_hours(){
		$last_id = $dbh->lastInsertId();
		$insert_hours = "INSERT INTO hours VALUES 
		(:id, NULL, NULL, NULL, :created_at, :updated_at)";
		$stmt = $this->dbh->prepare($insert_hours);
		$stmt->execute([
		'id' => $last_id,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	}

	public function add_into_department($compid, $id ){

	$sql = "INSERT IGNORE INTO department_user VALUES 
	(:departement_id, :user_id)";
	$statement = $this->dbh->prepare($sql);
	$statement->execute([
		'departement_id' => $compid,
		'user_id' => $id
		]);
	}

	public function get_user_information($statement, $named_placeholder){
		$statement = $this->dbh->prepare($statement);

        $statement->execute($named_placeholder);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $this->dbh->prepare($sql);

        // check if username is supplied, if so, pass assoc array to execute
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

?>