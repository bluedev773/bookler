<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="styles/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		
	</head>
	<body class="loggedin" onload="fetchBookmarks()">
		<nav class="navtop">
			<div>
				<a href="home.php" id="logo">
                    <img src="images/logo.png" alt="Bookler! an intuitive bookmark manager." height='75' width='75'>
                </a>
				<h1>Bookler</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
			<hr>
		</nav>
		<div class="content" id="topTen">
			<h2>My Top Ten</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
<!-- TODO: link inputs to database -->
		<div class="content" id="add">
			<h2>Add Bookmarks</h2>
			<form id = "addForm">
				<div class = "form-group">
					<label>Site Name</label>
					<input type="text" class = "form-control" id = "siteName" placeholder = "Website Name">
				</div>
				<div class = "form-group">
					<label>Site URL</label>
					<input type="text" class = "form-control" id = "siteUrl" placeholder = "Website URL">
				</div>
				<button type = "submit">Submit</button>
			</form>
		</div>
		<div class="content" >
			<h2>All Bookmarks</h2>
			<div id="bookmarksResults">
			</div>		
		</div>

		<script src="scripts/add.js"></script>
	</body>
</html>