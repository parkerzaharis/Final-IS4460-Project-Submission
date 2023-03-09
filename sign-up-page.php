<html>
	<head>
	<h1> We are excited to have you join us! </h1>
	<h2> Please enter the following information to create your account.</h2> 
	<h2> Click sign up and then try logging in! </h2>
	</head>
	
	<body>

		<form method='post' action='sign-up-page.php'>
		<h3>
			First Name: <input type='text' name='firstname'><br>
			Last Name: <input type='text' name='lastname'><br>
			Username: <input type='text' name='username'><br>
			Password: <input type='password' name='password'><br>
			<br>
			<input type='submit' value='Sign Up'>
			<button>
			<a href="login-page.php">Login</a>
			</button>
		</h3>
		</form>
	</body>

</html>



<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){
	

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//password_hash code here
	$token = password_hash($password, PASSWORD_DEFAULT);
	//code to add user here
	$query = "insert into User (firstname, lastname, username, password) values ('$firstname', '$lastname', '$username', '$token')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
}

$conn->close();


?>


