<!DOCTYPE html>
<html>
	<head>
		<title>Формы html</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php include 'header.php'; ?>
			<div class="form-style-8">
			<form id='signup_form' action='\action.php?action=signup' method='post' enctype="multipart/form-data"> 
				<h1>Sign up</h1>
				<input type='text' name='signup_login' placeholder="Enter your login"> 
				<input type='password' name='signup_pass' placeholder="Enter your password"> 
				<input type='password' name='signup_pass_repeat' placeholder="Repeat your password">
				<input type='text' name='signup_name' placeholder="Enter your name">
				<input type='text' name='signup_surname' placeholder="Enter your surname">
				<input type="file" name="avatar" id="avatar">
				<br><br><input type="submit" value="Sign up"></p>
				<p>Already have an account? <a href="login.php">Log in</a> </p>
			</form>
		</div>
	</body>
</html>

