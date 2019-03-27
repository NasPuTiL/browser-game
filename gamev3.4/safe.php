<?php
$conn = new MySQLi("localhost","root","","game");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$mysql_query = $conn->query("SELECT * FROM stats WHERE uid = '".$_SESSION['uid']['username']."'");                          
$stats = mysqli_fetch_assoc($mysql_query);

if(!$conn->query("SELECT * FROM equipment WHERE uid = '".$_SESSION['uid']['username']."' AND attack = 1")){
    echo "Error: ".$conn->error;
}else{
    
$result = mysqli_query($conn,"SELECT * FROM equipment WHERE uid = '".$_SESSION['uid']['username']."' AND isUsedValue = 1");//$conn->query("SELECT * FROM equipment WHERE uid = '".$_SESSION['uid']['username']."' AND isUsedValue = 1");                        

$index = 0;
$equipmentUSED = array();
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
     $equipmentUSED[$index] = $row;
     $index++;
}

}

if(!$conn->query("SELECT * FROM equipment WHERE uid = '".$_SESSION['uid']['username']."' AND isUsedValue = 0")){
    echo "Error: ".$conn->error;
}else{
    
$result2 = mysqli_query($conn,"SELECT * FROM equipment WHERE uid = '".$_SESSION['uid']['username']."' AND isUsedValue = 0");//$conn->query("SELECT * FROM equipment WHERE uid = '".$_SESSION['uid']['username']."' AND isUsedValue = 1");                        

$index = 0;
$equipment = array();
while($row = mysqli_fetch_assoc($result2)){ // loop to store the data in an associative array.
     $equipment[$index] = $row;
     $index++;
}

if(!$conn->query("SELECT * FROM stats ORDER BY level, expiriance")){
    echo "Error: ".$conn->error;
}else{
    
$result3 = mysqli_query($conn,"SELECT * FROM stats ORDER BY level, expiriance");            

$index = 0;
$rankingLevel = array();
while($row = mysqli_fetch_assoc($result3)){ // loop to store the data in an associative array.
     $rankingLevel[$index] = $row;
     $index++;
}
}

if(!$conn->query("SELECT * FROM stats ORDER BY blood")){
    echo "Error: ".$conn->error;
}else{
    
$result4 = mysqli_query($conn,"SELECT * FROM stats ORDER BY blood");                    

$index = 0;
$rankingBlood = array();
while($row = mysqli_fetch_assoc($result4)){ // loop to store the data in an associative array.
     $rankingBlood[$index] = $row;
     $index++;
}
}


}
?>