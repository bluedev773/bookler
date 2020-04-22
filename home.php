<?php

session_start();
//redirect to login if user is not logged in
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
		<script src="scripts/add.js"></script>
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


		<!--add bookmarks form-->
		<div class="content" id="add">
			<h2>Add Bookmarks</h2>
			<form id = "addForm" action="database.php" method="post" onsubmit='return saveBookmark()'>
				
				<div class = "form-group">
						<label class= "formLabel">Name</label>
						<input type="text" name="name" class = "form-control" id = "siteName" placeholder = "Website Name">
					</div>
					<div class = "form-group">
						<label class = "formLabel">URL</label>
						<input type="text" name="url" class = "form-control" id = "siteUrl" placeholder = "Website URL">
					</div>
					<button id = "addbtn"  type = "submit">Add</button>
			</form>
		</div>

		<!--All bookmarks section-->
		<div class="content" >
			<h2>All Bookmarks</h2>
		</div>
		<!--placeholder div, content added from add.js-->
		<div class = "wrapper" id="bookmarksResults">	
		</div>
	
	</body>
</html>