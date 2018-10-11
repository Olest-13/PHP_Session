<!DOCTYPE html>
<html>
	<head>
		<title>Формы html</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="form-style-8">
			<form class="my_form" id='login_form' action='index.php'> 
				<p align="center">
					<?php 
						include 'connect.php';
						$action = $_GET['action'];
						if(isset($_GET['id'])) $id = $_GET['id'];

      					switch ($action) {
      					   	case "login":
      					   		login();
      					      	break;
     					  	 case "logout":
     					     	logout();
     					      	 break;
     					   	case "signup":
     					   		signup();
     					       	break;
     					   	case "delete":
     					   		delete();
     					     	  break;
     					   	case "edit":
     					   		edit();
     					     	  break;
     					   	default:
    					        break;
    					}
    				?>
    				<br>
    				<br>
    				<br>
    				<input type="submit" value="Home page">
				</p>
			</form>
		</div>	
    </body>
</html>





<?php

    function login(){
    	global $connection;
   		$login = $_POST['login'];
   		$pass = $_POST['pass'];

   		$sql = "SELECT * FROM users_table WHERE login = '$login' AND pass='$pass'";
		$result = mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			session_start();
        	$_SESSION['login'] = $login;
        	$_SESSION['id'] =  $row['id'];
        	$_SESSION['role'] = $row['role'];
			echo "You are logged in as <b>".$login."</b>";
		}
		else
			echo "Invalid login or password";
	}

	function logout(){
		session_start();
		unset($_SESSION);
		session_unset();
		session_destroy();
		echo "You are logged out";
		//header("location:index.php");
	}

    function signup(){
    	global $connection;
    	$signup_login = $_POST['signup_login'];
		$signup_pass = $_POST['signup_pass'];
		$signup_pass_repeat = $_POST['signup_pass_repeat'];
		$signup_name = $_POST['signup_name'];
		$signup_surname = $_POST['signup_surname'];


		if ($signup_pass != $signup_pass_repeat){
			echo "Passwords are not same";
			return;
		}

		if(strlen($signup_login) < 2){
			echo "Login can't be less than 2 symbols";
			return;
		}

		if(strlen($signup_pass) < 6){
			echo "Password can't be less than 6 symbols";
			return;
		}

		$sql = "SELECT * FROM users_table WHERE login = '$signup_login'";
		$result = mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) == 1){
			echo "Account '".$signup_login."' is already exist";
			return;
		}

		$sql = "INSERT INTO users_table(id, role, login, pass, name, surname) VALUES (NULL, '1', '$signup_login', '$signup_pass', '$signup_name', '$signup_surname')";
		if(mysqli_query($connection, $sql))
			echo "Registration of account '".$signup_login."'' is successful";
		else
			echo "ERROR sql";


		$target_dir = "uploads/";
 		$name       = $_FILES['avatar']['name'];  
 		echo $name."<br>";
   		$temp_name  = $_FILES['avatar']['tmp_name'];  
   		if(isset($name)){
        	if(!empty($name)){      
           		$location = 'uploads/';      
           			if(move_uploaded_file($temp_name, $location.$connection->insert_id.".png")){
               			echo 'File uploaded successfully';
           			}
        	}       
    	}	
    }

	
	

	function delete(){
    	global $connection;
    	global $id;
    	$login = mysqli_fetch_assoc(mysqli_query($connection, "SELECT login FROM users_table WHERE id = '$id'"))['login'];
    	$sql = "DELETE FROM `users_table` WHERE id = '$id'";
    	$result = mysqli_query($connection, $sql);
    	if($result)
			echo "Account <b>".$login."</b> has been deleted";
		else
			echo "ERROR sql";
    }




    function edit(){
    	global $connection;
    	global $id;
    	$edit_login = $_POST['edit_login'];
		$edit_pass = $_POST['edit_pass'];
		$edit_pass_repeat = $_POST['edit_pass_repeat'];
		$edit_name = $_POST['edit_name'];
		$edit_surname = $_POST['edit_surname'];


		if ($edit_pass != $edit_pass_repeat){
			echo "Passwords are not same";
			return;
		}

		if(strlen($edit_login) < 2){
			echo "Login can't be less than 2 symbols";
			return;
		}

		if(strlen($edit_pass) < 6){
			echo "Password can't be less than 6 symbols";
			return;
		}

		session_start();
		if (($edit_login != $_SESSION['login']) && ( $_SESSION['role'] != "0")){
		$sql = "SELECT * FROM users_table WHERE login = '$edit_login'";
		$result = mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) == 1){
			echo "Account '".$edit_login."' is already exist";
			return;
		}
	}

		$sql = "UPDATE users_table SET login='$edit_login', pass='$edit_pass', name='$edit_name', surname='$edit_surname' WHERE id='$id'";
		if(mysqli_query($connection, $sql))
			echo "Edit is successful";
		else
			echo "ERROR sql edit";

		
		$target_dir = "uploads/";
 		$name       = $_FILES['avatar']['name'];  
 		//echo $name."<br>";
   		$temp_name  = $_FILES['avatar']['tmp_name'];  
   		if(isset($name)){
        	if(!empty($name)){      
           		$location = 'uploads/';      
           			if(move_uploaded_file($temp_name, $location.$id.".png")){
               			//echo 'File uploaded successfully';
           			}
        	}       
    	}	
    }



?>