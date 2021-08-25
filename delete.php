  <?php
    //connect to db  
    $servername='localhost';
    $username='root';
    $password='GwKz3CiBKVmX';
    $dbname="phplogin";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        //display error
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }

    //delete bookmark according to id
    $id = $_GET['id'];
    $del = mysqli_query($conn,"DELETE from bookmarks WHERE bookmarkId = '$id'");

    
    if($del){
        mysqli_close($conn);
        header("location:home.php");
        exit;
    }else{
        echo "error deleting";
    }
    ?>
