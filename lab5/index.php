<?php
	session_start();

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$name=$_POST['firstName'];
		$_SESSION['firstName']=$name;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<form action="index.php" method="post">
		<input type="text" value='<?= isset($_SESSION['firstName'])?$_SESSION['firstName']:"none";?>' name="firstName">
		<input type="submit" name="submit">
	</form>
	<button><a href="admin.php">Admin.php</a></button>
</body>
</html>