<?php

$mysql_query = $conn->query("SELECT * FROM stats WHERE uid = '".$_SESSION['uid']['username']."'");                          
$stats = mysqli_fetch_assoc($mysql_query);
$data = array();

while($stats){
    $data[] = $stats;
}

echo json_encode($data);

