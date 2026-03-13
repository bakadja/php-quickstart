<?php
// Include database connection file
require("config.php");
$nameErr = $ageErr = $emailErr = "";
if (isset($_POST['update'])) {
	// Retrieve record values
	$id = $_POST['id'];
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];

	#$nameErr = $ageErr = $emailErr = "";

	// Check for empty fields
	if (empty($name) || empty($age) || empty($email)) {
		if (empty($name)) {
			$nameErr = "* required";
		}
		if (empty($age)) {
			$ageErr = "* required";
		}
		if (empty($email)) {
			$emailErr = "* required";
		}
	} else {
		// Execute UPDATE 
		$stmt = $conn->prepare("UPDATE contacts SET name=?, age=?, email=? WHERE id=?");
		$stmt->bind_param("sisi", $name, $age, $email, $id);
		$stmt->execute();

		// Redirect to home page (index.php)
		header("Location: index.php");
		exit;
	}
} else if (isset($_POST['cancel'])) {
	// Redirect to home page (index.php)
	header("Location: index.php");
	exit;
}
?>
<?php
// Retrieve id value from querystring parameter
$id = $_GET['id'];

// Get contact by id
$query = "SELECT * FROM contacts WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
#$result = $conn->query("SELECT * FROM contacts WHERE id=$id");

if (!$result) {
	die("Get result failed: " . $stmt->error);
}

if ($row = $result->fetch_assoc()) {

	$name = $row['name'];
	$age = $row['age'];
	$email = $row['email'];
} else {
	die("Contact not found.");
}
?>
<html>

<head>
	<title>Edit Contact</title>
	<link rel="stylesheet" href="styles.css" />
</head>

<body>
	<form name="form1" method="post" action="edit.php?id=<?php echo $id ?>">
		<table>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="name" value="<?php echo $name; ?>">
					<span class="error"><?php echo $nameErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Age</td>
				<td>
					<input type="text" name="age" value="<?php echo $age; ?>">
					<span class="error"><?php echo $ageErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" name="email" value="<?php echo $email; ?>">
					<span class="error"><?php echo $emailErr; ?></span>
				</td>
			</tr>
			<tr>
				<td>
					<input class="cancel" type="submit" name="cancel" value="Cancel">
				</td>
				<td>
					<input type="submit" name="update" value="Update">
					<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>