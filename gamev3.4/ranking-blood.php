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
<form action="ranking.php" method="POST">
<br />
<table>
<tr>
<td> <input type="submit" name="rankingBlood" value="Show Ranking Level"/></td>
</tr>
</table>
</form>
<br /><br />
<?php 
$maxNumberOfPlayer = ( count($rankingBlood) > 10)? 10 :  count($rankingBlood);
$ii = 0;

for($i = 0 ; $i < $maxNumberOfPlayer; $i++){
    
    $ii = $i +1;
    echo "<tr>";
    echo $ii.". Name ".$rankingBlood[$i]['uid'].", Blood: ".$rankingBlood[$i]['blood'].", attack: ".$rankingBlood[$i]['attack'].", defence: ".$rankingBlood[$i]['defence'];
    echo "</tr>";
}
?>

<?php    
}
include("footer.php");
?>
