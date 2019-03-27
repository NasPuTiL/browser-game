<?php
session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
}else{ 
//polaczenie
$conn = Database::getConnection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $request = mysqli_query($conn, "SELECT TIMESTAMPDIFF(SECOND,now(), duration) FROM stats WHERE uid = '".$_SESSION['uid']['username']."'");
    $row = mysqli_fetch_row($request);

    if($row[0] <= 0){
        echo "You complished travel. You get: ";
        switch($stats['stan']){
            case 'trip1':
            $bloodStan = $stats['blood'] + 100;
            $gold = $stats['gold'] + 30;
            $exp = $stats['expiriance'] + 50;     
                $sql = "UPDATE stats SET duration = null, stan='-',  expiriance = '".$exp."', gold = '".$gold."',  blood = '".$bloodStan."' WHERE uid ='".$_SESSION['uid']['username']."' ";
                    if(!$conn->query($sql)){
                    echo "Error ".$conn->error;
                };
            checkLevel($stats['level'], $exp, $stats['points']);
            echo "30 gold and 50 exp.";
            break;
            case 'trip60':
            $gold = $stats['gold'] + 60;
            $exp = $stats['expiriance'] + 100;              
                $sql = "UPDATE stats SET duration = null, stan='-', gold = '".$gold."', expiriance = '".$exp."' WHERE uid ='".$_SESSION['uid']['username']."' ";
                    if(!$conn->query($sql)){
                    echo "Error ".$conn->error;
                };   
           checkLevel($stats['level'], $exp, $stats['points']);
              echo "60 golds and 100 exp.";       
            break;
            case 'trip120':
            $gold = $stats['gold'] + 120;
            $exp = $stats['expiriance'] + 300;            
                $sql = "UPDATE stats SET duration = null, stan='-', gold = '".$gold."', expiriance = '".$exp."' WHERE uid ='".$_SESSION['uid']['username']."' ";
                    if(!$conn->query($sql)){
                    echo "Error ".$conn->error;
                }; 
            checkLevel($stats['level'], $exp, $stats['points']);
            echo "120 golds and 300 exp.";           
            break;
            case 'trip240':
            $gold = $stats['gold'] + 250;
            $exp = $stats['expiriance'] + 750;            
                $sql = "UPDATE stats SET duration = null, stan='-', gold = '".$gold."', expiriance = '".$exp."' WHERE uid ='".$_SESSION['uid']['username']."' ";
                    if(!$conn->query($sql)){
                    echo "Error ".$conn->error;
                }; 
            checkLevel($stats['level'], $exp, $stats['points']);
            echo "240 golds and 750 exp.";           
            break;
            
        }
        
    }else{
        $sql = "UPDATE stats SET duration = null, stan='-' WHERE uid ='".$_SESSION['uid']['username']."' ";
        if(!$conn->query($sql)){
            echo "Error ".$conn->error;
        };
        echo " You break travel";
        checkLevel($stats['level'], $stats['expiriance'], $stats['points']);
    }
    ?>
    <form method="post" action="training.php ">
            <button >return</button>       
    </form>
    <?php
  
  
}
include("footer.php");
?>
