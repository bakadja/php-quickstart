<?php
// Include database connection file
require("config.php");

$name = "";
$age = "";
$email = "";

$nameErr = "";
$ageErr = "";
$emailErr = "";


if (isset($_POST['add'])) {
	// Retrieve record values
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
		// Insert new contact
		$stmt = $conn->prepare("INSERT INTO contacts (name,age,email) VALUES(?, ?, ?)");
		$stmt->bind_param("sis", $name, $age, $email);
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
<html>

<head>
	<title>Add Contact</title>
	<link rel="stylesheet" href="styles.css" />
</head>

<body>
	<form name="form1" method="post" action="add.php">
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
					<input type="submit" name="add" value="Add">
				</td>
			</tr>
		</table>
	</form>
</body>

</html>