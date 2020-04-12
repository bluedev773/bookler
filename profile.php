<?php
session_start();

//if not logged in redirect to login page
if(!isset($_SESSION['loggedin'])){
    header('Location: login.html');
    exit;
}

//connect to database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
//check for connection error
if(mysqli_connect_errno()){
    exit('Could not connect MYSQL: ' . mysqli_connect_errno());
}

$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
//Using account ID to get info
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password,$email);
$stmt->fetch();
$stmt->close();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="styles/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>

    <body class = "loggedin">
        <nav class = "navtop">
            <div>
				<a href="home.php"  id="logo">
                    <img src="images/logo.png" alt="Bookler! an intuitive bookmark manager." height='75' width='75'>
                </a>
                <h1>Bookler</h1>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
			<hr>
        </nav>
        <div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>