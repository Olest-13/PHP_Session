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
					<form class="my_form" id='login_form' action='\action.php?action=login' method='post'> 
							<input type="text" name='login' placeholder="Enter your login"> 
							<input  type="password" name='pass' placeholder="Enter your password">
							<input type="submit" value="Log in"></p>
							
							<label>Don't have an account yet? <a href="signup.php">Sign up</a></label>
					</form>
			</div>
	</body>
</html>
