<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//get the bookmark info from database
$sql = "SELECT name,url u FROM bookmarks GROUP BY name ORDER BY u asc limit 10;";
$result = $conn->query($sql);

?>
<script>
function addhttp(url) {
  if (!/^(?:f|ht)tps?\:\/\//.test(url)) {
      url = "http://" + url;
  }
  return url;
}
</script>

<html>
    <head>
        <meta charset="utf-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="styles/style.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body class = "index">
        <nav class = "navtop">
            <div>

                <a href="index.php"  id="logo">
                    <img src="images/logo.png" alt="Bookler! an intuitive bookmark manager." height='75' width='75'>
                </a>
                <h1>Bookler</h1>
                <a href="login.html"><i class="fas fa-sign-in-alt"></i>Login</a>
				<a href="register.html"><i class="fas fa-user-plus"></i></i>Register</a>
            </div>
            <hr>
        </nav>
        <div class="content">
            <h1>Welcome to Bookler, an intuitive bookmark manager!</h1>
        </div>
        <!--display top ten bookmarks across all users-->
		<div class="content">
			<h2>Top Bookmarked Webpages!</h2>
        </div>
       
        <div class = "wrapper" id="topTen">	
			 <?php 
				// 
				while($row = $result->fetch_assoc()){
					echo '<div class = "box" onclick="window.open(addhttp(\''.$row["u"].'\'))">'.
	                                        '<h3>'.$row["name"].'</h3>'.
	                                        '</div>';
				};
			 ?> 

		</div>
    </body>
</html>
