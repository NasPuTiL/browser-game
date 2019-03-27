<?php
session_start();
include("header.php");
include("functions.php");

//polaczenie
$conn = Database::getConnection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//po nacisnieciu "logun"
if(isset($_POST['login'])){
    if(isset($_SESSION['uid'])){
        print("You are already logged in");
    }else{
        $username = protect($_POST['username']);
        $password = protect($_POST['password']);
        
        $query = "SELECT username FROM user WHERE username='$username' AND password='$password'";
        if($result = $conn->query($query)){
            if($result->num_rows == 0){
                print("Invalid Username or password!");
            }else if($result->num_rows == 1){
                
                $_SESSION['uid'] = mysqli_fetch_assoc($result);
                header("Location: main.php");
            
            }else{
                echo "Error: ".$query."<br> ";
            }
        }else{
            echo 'Echo: '.$conn->error;
        }
    }
}else{
    echo "You have visited this page incorrecly!";
}

include("footer.php");
?>
