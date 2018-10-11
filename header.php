<!DOCTYPE html>
<html>
	<head>
		<title>LABA #1</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="topnav">
		<?php
			$row = null;
			if(isset($_SESSION['id'])){
				$sql = "SELECT * FROM users_table WHERE id='".$_SESSION['id']."'";
				$result = mysqli_query($connection, $sql);
				$row = mysqli_fetch_array($result);
			}

			echo "<a href='index.php' >Home page</a>";
			if(isset($_SESSION['login'])){
				echo "<a href='edit.php?id=".$_SESSION['id']."'>Edit my profile</a>";
				echo "<a href='action.php?action=logout'>Log out</a>";
			}
			else 
				echo "<a href='login.php'>Log in</a> <a href=\"signup.php\">Create an account</a>";
					
					

			echo "<p>";
			if(isset($_SESSION['login'])){
				echo "Hello, <b>".$row['name']." ".$row['surname']."</b>. Your login is <b>".$_SESSION['login']."</b>";
				if (isset($_SESSION['role']) && $_SESSION['role'] == '0')
					echo " (ADMIN)";
			}
			else 
				echo "You are not authorized";
			echo "</p>";
		?>	
		</div>
	</body>
</html>