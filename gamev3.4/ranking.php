<?php
session_start();
include("header.php");
include("functions.php");

//wyswietla sie jezeli blednie chce sie dostac do bazy
if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
}else{       
?>
<center><b>Top 10 ranking</b></center>
<form action="ranking-blood.php" method="POST">
<br />
<table>
<tr>
<td> <input type="submit" name="rankingBlood" value="Show Ranking Blood"/></td>
</tr>
</table>
</form>
<br /><br />
<?php 
$maxNumberOfPlayer = ( count($rankingLevel) > 10)? 10 :  count($rankingLevel);
$ii = 0;

for($i = 0 ; $i < $maxNumberOfPlayer; $i++){
    
    $ii = $i +1;
    echo "<tr>";
    echo $ii.". Name ".$rankingLevel[$i]['uid'].", level: ".$rankingLevel[$i]['level'].", expiriance: ".$rankingLevel[$i]['expiriance'].", attack: ".$rankingLevel[$i]['attack'].", defence: ".$rankingLevel[$i]['defence']."<br>";
    echo "</tr>";
}
?>

<?php    
}
include("footer.php");
?>
