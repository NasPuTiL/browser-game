<?php
session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['uid'])){
    echo'You must be logged in to view this page';
}else{ 
?>
	<div id="canvas">
	<h1 align="center">Statistics</h1> 
		<div id="myStats">
		<h3>Player</h3>
		Health <span id="player-health"></span> </br>
		power <span id="player-power"></span></br>
		</div>
		<div id="opponentStats">
				<h3>Opponent</h3>
				Health <span id="opponent-health"></span> </br>
				power <span id="opponent-power"></span></br>
		</div>
	
	</div>
	
	<div id="clear">
		<button id="return-To-Menu" onclick="returnToMenu()">Return to menu</button>
	</div>

	</body>
	<script src="showStats.js"> </script>
<?php
}
include("footer.php");
?>




