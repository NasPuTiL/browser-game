<?php
session_start();
include("header.php");
include("functions.php");

//wyswietla sie jezeli blednie chce sie dostac do bazy
if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
}else{  
?>
<div id="shop_center">
<center><b>You are wearing</b></center>
<form>
<table>
<?php 
for($i = 0 ; $i < count($equipmentUSED);$i++){
    $ii = $i +1;
    echo "<tr>";
     echo "<td>".$ii.". Name: ".$equipmentUSED[$i]['name'].", kind ".$equipmentUSED[$i]['kind']
     .", attack: ".$equipmentUSED[$i]['attack'].", defence: ".$equipmentUSED[$i]['defence'].", dex: ".$equipmentUSED[$i]['dexterity'].", str: ".$equipmentUSED[$i]['strength'].""?> 
     <input type="submit" value="take off" name="trip<?php $i ?> ">
     <?php echo"</td>" ;
      echo "</tr>";
}
?>
</table>
</form>
</div>
<br /><br /><br />
<div id="shop_center">
<center><b>You can set up</b></center>
<form>
<table>
<?php 
for($i = 0 ; $i < count($equipment);$i++){
    $ii = $i +1;
    echo "<tr>";
     echo "<td>".$ii.". Name: ".$equipment[$i]['name'].", kind ".$equipment[$i]['kind']
     .", attack: ".$equipment[$i]['attack'].", defence: ".$equipment[$i]['defence'].", dex: ".$equipment[$i]['dexterity'].", str: ".$equipment[$i]['strength'].""?> 
     <input type="submit" value="Assume" name="trip<?php $i ?> ">
     <?php echo"</td>" ;
      echo "</tr>";
}
?>
</table>
</form>
</div>





<?php    
}
include("footer.php");
?>
