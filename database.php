<?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.html');
        exit;
    } 

    $servername='localhost';
    $username='root';
    $password='';
    $dbname="phplogin";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        //display error
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
    
    if($stmt = $conn->prepare('INSERT INTO bookmarks (name,url,id) VALUES (?,?,?)')){
        // hash password for security
        $stmt->bind_param('sss', $_POST['name'],$_POST['url'],$_SESSION['id']);
        $stmt->execute();
        $stmt->close();
        header('Location: home.php');
    }

    // $sql = "SELECT * FROM bookmarks;";
    // $result = mysqli_query($conn,$sql);
    // $resultCheck = mysqli_num_rows($result);
    // if($resultCheck > 0){
    //     while($row = mysqli_fetch_assoc($result)){
    //          return $row;
            
    //     }
    // }

     
?>