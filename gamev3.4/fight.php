<?php
session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
}else{ 
    ?>
   	<script src="game.js"> </script>
    <h2>Opponent's Health <span id="opponent-health"></span></h2>
	<h2>Player-Health <span id="player-health"></span></h2>
	<button id="AttackButton" onclick="attack()">Hit em'</button>
	
	<h2 id="game-message"></h2>
	</br>

	<button id="GameOver" onclick="showStats()" disabled=true>Return to menu</button>
	</div>
    
    <?php
}
include("footer.php");
?>
    