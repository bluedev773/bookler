<?php
 
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="bookmarks";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        //display error
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $url = $_POST['url'];
//TODO: make new table for each unique user
    if($stmt = $conn->prepare('INSERT INTO bookmarks (name,url) VALUES (?,?)')){
        // hash password for security
        $stmt->bind_param('ss', $_POST['name'],$_POST['url']);
        $stmt->execute();
        $stmt->close();
        header('Location: home.php');
    }

    
?>