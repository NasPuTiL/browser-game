<?php
 
 class Database {

    private static $db;
    private $connection;

    function __construct() {
        $this->connection = new MySQLi("localhost","root","","game");
    }

    function __destruct() {
        $this->connection = new MySQLi("localhost","root","","game");
        $this->connection->close();
    }

//pobieranie polaczenia z serwerem
    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
}   


//funkcja zabezpieczajaca prze wprowadzaniem zmmian w linku
function protect($string){
    $conn=mysqli_connect("localhost","root","","game");
    return mysqli_real_escape_string($conn,$string);
}

function setEquipment($kind, $lvl){
    switch ($kind){
        case 'boots': return (["Noname", 0, $lvl* rand(0,0.2), 0, '', "boots", $lvl* rand(3,5), $lvl* rand(9,12) ]);
        case 'weapon': return (["Noname", $lvl*rand(12,15), 0, $lvl*rand(3,5), "", "weapon", 0, 0]);
    }
}

function setTripStan($string, $duration){
    $conn = new MySQLi("localhost","root","","game");
    $trip = 'trip'. $duration;
    
    $sql = "UPDATE stats SET duration= now(), stan='".$trip."' WHERE uid ='".$_SESSION['uid']['username']."' ";
    if(!$conn->query($sql)){
        echo "Error ".$conn->error;
    };
    $sq2 = "update stats set duration =DATE_ADD(duration, INTERVAL ".$duration." MINUTE) where uid ='".$_SESSION['uid']['username']."' ";
    if(!$conn->query($sq2)){
        echo "Error ".$conn->error;
    };
}

function checkLevel($level, $exp, $points){
    $conn = Database::getConnection();
    $expectedExp = 100;
    
    for($i = 0; $i <  $level; $i++){
      
        if($expectedExp <= $exp){
            ++$level;
            $points+=5;
            $exp -= $expectedExp;
        }
        $expectedExp = $expectedExp*1.3;
    }      
    $sql = "UPDATE stats SET level = '".$level."', expiriance = '".$exp."', points = '".$points."' WHERE uid ='".$_SESSION['uid']['username']."' ";
    if(!$stat= $conn->query($sql)){
        echo $sql + ", ". $conn->error;
    }         
}
?>

