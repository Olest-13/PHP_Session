<!DOCTYPE html>
<html>
	<head>
		<title>LABA #1</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php

			include 'connect.php';
			session_start();
			include 'header.php';
			$sql = "SELECT * FROM users_table";
					$result = mysqli_query($connection, $sql);
		?>
		<br>
		<table class="users-table">
			<caption>Users</caption>
				<tr>
					<th>id</th>
					<th>Login</th>
					<th>Name</th>
					<th>Surname</th>
					<th>Avatar</th>
					<?php if(isset($_SESSION['role']) && $_SESSION['role'] == '0') echo "<th>Edit</th><th>Delete</th>"?>
					<?php

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr>';
						echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['login'].'</td>';
						echo '<td>'.$row['name'].'</td>';
						echo '<td>'.$row['surname'].'</td>';
						echo "<td>";
						if (file_exists("uploads/".$row['id'].".png"))
							echo "<img src='uploads/".$row['id'].".png' height=100>";
						else
							echo "<img src='img/none.png' height=100>";
						echo "</td>";
						if(isset($_SESSION['role']) && $_SESSION['role'] == '0'){
							echo "<td><form id='login_form' action=edit.php?id=".$row['id']." method='post'>
								<button type='submit'>Edit</button>
								</form></td>";
							echo "<td><form id='login_form' action=action.php?id=".$row['id']."&action=delete method='post'>
								<button type='submit'>Delete</button>
								</form></td>";
						}
						echo '</tr>';
					}
					?>
		</table>
		
	</body>
</html>