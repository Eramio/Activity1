<!DOCTYPE html>
	<html>
	<head>
		<title>My first PHP Website</title>
		<style>
			table, th, td {
			border:1px solid black;
			text-align:center;
			}
			table { width:100%;}
		</style>
	</head>
	<body>
		<?php
			echo "<h2>My First PHP Website</h2>";
		?>
		<a href="login.php"> Click here to login </a><br>
		<a href="register.php"> Click here to register </a>
		<h2 align="center">My list</h2>
		<table>
		<tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Edit Time</th>
		</tr>
		<?php
			$servername = "localhost";
			$username_db = "root";
			$password_db = "";
			$db_name = "first_db";
			// Create connection
			$conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$query = mysqli_query($conn, "Select * from list_tbl where public ='yes'"); //SQLQueryfrom query
			while($row = mysqli_fetch_array($query)) 
			{
				Print "<tr>";
					Print "<td>".$row['id']."</td>";
					Print "<td>".$row['details']."</td>";
					Print "<td>".$row['date_posted']. "-". $row['time_posted']."</td>";
					Print "<td>".$row['date_edited']. "-". $row['time_edited']."</td>";
				Print "</tr>";
			}
		?>
		</table>
	</body>
</html>
