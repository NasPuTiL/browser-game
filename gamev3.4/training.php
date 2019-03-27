<?php
session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
    
}else if($stats['stan'] == '-'){
    ?>
    <center><h2>Make Adventure</h2></center>
    <br />
    <form action="train.php" method="POST">
    <table cellpadding="5" cellspaceing="5">
        <tr>
            <td><b>Exp You Gain</b></td>
            <td><b>Gold You Gain</b></td>        
            <td><b>Duration</b></td>
            <td><b>Submit</b></td>
        </tr>
        <hr />
        <tr>
            <td><b>50 exp</b></td>
            <td><b>30 Gold</b></td>        
            <td><b>30:00 min</b></td>
            <td><input type="submit" value="Run" name="trip0"></td>
        </tr>
        <tr>
            <td><b>120 exp</b></td>
            <td><b>60 Gold</b></td>        
            <td><b>60 min</b></td>
            <td><input type="submit" value="Run" name="trip1"></td>
        </tr>
        <tr>
            <td><b>300 exp</b></td>
            <td><b>120 Gold</b></td>        
            <td><b>4h</b></td>
            <td><input type="submit" value="Run" name="trip2"></td>
        </tr>
        <tr>
            <td><b>750 exp</b></td>
            <td><b>250 Gold</b></td>        
            <td><b>8h</b></td>
            <td><input type="submit" value="Run" name="trip3"></td>
        </tr>        
    </table>
    </form> 
    <?php
}else{
    header("Location: train.php");
}
        
    
        //print_r($eq1);

include("footer.php");
?>