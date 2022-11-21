<!DOCTYPE html>
<html>
	 <head>
		<title>My first PHP website</title>
	 </head>
	 <style>
		table, th, td {
		border:1px solid black;
		text-align:center;
		}
		table { width:100%;}
	</style>
	 <?php

	 session_start(); //starts the session
	 if($_SESSION['user']){ // checks if the user is logged in
	 }
	 else{
	 	header("location: index.php"); // redirects if user is not logged in
	 }
	 $user = $_SESSION['user']; //assigns user value
	 $id_exists = false;
	 ?>
	 <body>
		 <h2>Home Page</h2>
		 <p> Hello <?php Print "$user"?>!</p> <!--Display's user name-->
		 <a href="logout.php">Click here to logout</a><br/><br/>
		 <form action="add.php" method="POST">
			 Add more to list: <input type="text" name="details" /> <br/>
			 Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
			 <input type="submit" value="Add to list"/>
		 </form>
		 <h2 align="center">My list</h2>
		 <table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Public Post</th>
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
				$query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
				while($row = mysqli_fetch_array($query)) //Display all the rows from query
				{
					Print "<tr>";
						Print "<td>".$row['id']."</td>";
						Print "<td>".$row['details']."</td>";
						Print "<td>".$row['date_posted']. "-". $row['time_posted']."</td>";
						Print "<td>".$row['date_edited']. "-". $row['time_edited']."</td>";
						Print '<td><a href="edit.php?id='.$row['id'].'">edit</a></td>';
						Print "<td><a href='#' onclick='myFunction(".$row['id'].")'>delete</a></td>";
						Print "<td>".$row['public']."</td>";
					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(id)
			{
				var r = confirm("Are you sure you want to delete this record?");
				if(r == true)
				{
					window.location.assign("delete.php?id=" + id);
				}
			}

		</script>
	 </body>
</html>