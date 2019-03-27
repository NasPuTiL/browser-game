<?php
session_start();
include("header.php");
include("functions.php");

//wyswietla sie jezeli blednie chce sie dostac do bazy
if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
}else{  
    
    if(isset($_POST['SubmitPoints'])){
     $attack = protect($_POST['attack']);   
     $defence = protect($_POST['defence']);
     $strength = protect($_POST['strength']);
     $dexitery = protect($_POST['dexitery']);
    
    $sum = $attack + $defence + $strength + $dexitery;
    if($attack < 0 || $defence < 0 || $strength < 0 || $dexitery < 0){
        
    }else if($sum < $stats['points']){
        $newAttack = $stats['attack']+$attack;
        $newDefence = $stats['defence']+$defence;
        $newStrength = $stats['strength']+$strength;
        $newDexitery = $stats['dexitery']+$dexitery;
        
        $sq = "UPDATE stats SET attack = '".$newAttack."', defence = '".$newDefence."', strength = '".$newStrength."', dexitery = '".$newDexitery."' WHERE uid ='".$_SESSION['uid']['username']."' ";
        if(!$conn->query($sq)){
            echo "Error ".$conn->error;
        };
       
       $newSum = $stats['points'] - $sum;
        $sq_request = "UPDATE stats SET points = '".$newSum."' WHERE uid ='".$_SESSION['uid']['username']."' ";
        if(!$conn->query($sq_request)){
            echo "Error ".$conn->error;
        };
        
        header("Location: main.php");
        
    }     
   
    }
    ?>
    <center><h2>Your Stats</h2></center>

    <form action="main.php" method="POST" autocomplete="off">
    <table cellpadding="3" cellspacing="5">
    <hr />
    <tr>
        <td><?php echo "Your nick: ".$_SESSION['uid']['username']; ?></td>
    </tr>
    <tr>
        <td><?php echo "Your gold: ".$stats['gold']; ?></td>
    </tr>
    <tr>
        <td><?php echo "lvl: ".$stats['level']; ?></td> 
    </tr>
    <tr>
        <td><?php echo "exp: ".$stats['expiriance']; ?></td>
        <td>      
            <?php
                $lvl = $stats['level'];
                $expectedExp = 100;
       
                for($i = 1; $i < $lvl; $i++){
                    $expectedExp+= $expectedExp*1.5;
                }
                echo "Exp to next lvl: ".$expectedExp;
        ?>
            
        </td>
           
    </tr>
    <tr></tr>
    <td></td>
    <tr></tr>
    <tr></tr>
    <tr>
        <td>Add <?php echo $stats['points']; ?> points</td>
    </tr>
    <tr>
        <td><?php echo "Attack: ".$stats['attack']; ?></td>
        <td><input type="text" name="attack"/></td>
    </tr>
    <tr>
        <td><?php echo "Your defence: ".$stats['defence']; ?></td>
        <td><input type="text" name="defence"/></td>
    </tr>
    <tr>
        <td><?php echo "Your strength: ".$stats['strength']; ?></td>
        <td><input type="text" name="strength"/></td>
    </tr>
    <tr>
        <td><?php echo "Your dexitery: ".$stats['dexitery']; ?></td>
        <td><input type="text" name="dexitery"/></td>
    </tr>
    <tr>
        <td><td><input type="submit" name="SubmitPoints" value="Submit"/></td></td>
    </tr>
    </table>
    </form>
    
    <?php
}
include("footer.php");
?>
