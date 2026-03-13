<?php
// Include the database connection file
require("config.php");

// Fetch contacts (in descending order)
$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC"); 
?>
<html>
<head>	
	<title>MariaDB Rolodex</title>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>
	<table>
		<tr>
			<td>Name</td>
			<td>Age</td>
			<td>Email</td>
			<td><a class="button" href="add.php">Add Contact</a></td>
		</tr>
		<?php
		// Print contacts 
		while($row = $result->fetch_assoc()) { 		
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['age']."</td>";
			echo "<td>".$row['email']."</td>";	
			echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this contact?')\">Delete</a></td>";		
		}
		?>
	</table>
</body>
</html>
