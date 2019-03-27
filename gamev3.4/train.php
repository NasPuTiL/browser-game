<?php
session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
    
//polaczenie
$conn = Database::getConnection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

}else{ 
    ?>
    <script>
    function setBenefit(str) {
        alert(str)
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "js_php.php?operation=" + str, true);
        xmlhttp.send();
    }
}
</script>
    <br /><br /><br />
    <center> <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Your character is on trip. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b></center>
    <br />
    <center> <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Time remaning: <?php 
         
     if(isset($_POST['trip0'])){
        setTripStan('trip', 1);
     }else if(isset($_POST['trip1'])){
        setTripStan('trip', 60);
     }else if(isset($_POST['trip2'])){
        setTripStan('trip', 120);
     }else if(isset($_POST['trip3'])){
        setTripStan('trip', 240);
     }
   
    $request = mysqli_query($conn, "SELECT TIMESTAMPDIFF(SECOND,now(), duration) FROM stats WHERE uid = '".$_SESSION['uid']['username']."'");
    $row = mysqli_fetch_row($request);
    
    if($row[0] < 0){
        echo 0;
        echo "<br>";
        ?>
        <form method="post" action="js_php.php ">
            <button >ok</button>       
        </form>
        <?php
     }else{
        echo $row[0];
        echo "<br>";
        ?>
        <form method="post" action="js_php.php ">
            <button >cancel</button>       
        </form>
        <?php
     
     
     }
 
   // }else{
     //   header("Location: main.php");
   // }
       ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b></center>
    <br />
<?php
}
include("footer.php");
?>