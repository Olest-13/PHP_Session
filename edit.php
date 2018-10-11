<!DOCTYPE html>
<html>
	<head>
		<title>Формы html</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php 
			include 'header.php';
			include 'connect.php';
			$id = $_GET['id'];
			$sql = "SELECT * FROM users_table WHERE id='".$id."'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result);
		?>

			<div class="form-style-8">
			<form id='edit_form' action='\action.php?action=edit&id=<?php echo $id ?>' method='post' enctype="multipart/form-data"> 
				<h1>Edit profile</h1>
				<input type='text' name='edit_login' value='<?php echo $row['login'] ?>'> 
				<input type='text' name='edit_name' value='<?php echo $row['name'] ?>'>
				<input type='text' name='edit_surname' value='<?php echo $row['surname'] ?>'>
				<input type="password" name='edit_pass' placeholder="Enter new password"> 
				<input  type="password" name='edit_pass_repeat' placeholder="Repeat new password">
				<?php
					if (file_exists("uploads/".$row['id'].".png"))
							echo "<img src='uploads/".$row['id'].".png' height=100>";
						else
							echo "<img src='img/none.png' height=100>";
				?><br>
				<input type="file" name="avatar" id="avatar">
				<br><br><input type="submit" value="Save"></p>
			</form>
		</div>
	</body>
</html>

