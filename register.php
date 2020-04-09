<?php
//connect to database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//make sure all form data is there
if(!isset($_POST['username'],$_POST['password'],$_POST['email'])){
    exit('Please complete the form');
}

//make sure form data is not empty
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	
	exit('Please complete the registration form');
}

//make sure the email is valid
// if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
// 	exit('Email is not valid!');
// }

//check if the account already exists
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
        // Insert a new account
        if($stmt = $con->prepare('INSERT INTO accounts (username,password,email) VALUES (?,?,?)')){
            // hash password for security
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'],$password,$_POST['email']);
            $stmt->execute();
            echo 'Success! You are now registered. Redirecting to Login page!';
            
            header('Location: login.html');
            
        } else {
            //issue with sql statement
            echo "SQL statement error";
        }
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement
	echo 'Could not prepare statement!';
}
$con->close();
?>