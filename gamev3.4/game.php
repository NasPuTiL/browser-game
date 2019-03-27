let player = {
	health: 100,
	power: 30
}

let opponent = {
	health: 100,
	power: 60
}

	const attack = () => {
		let attackButton = document.getElementById('AttackButton');
		let gameMessage = document.getElementById('game-message');
		let gameOver = document.getElementById('GameOver');


		opponent.health -= determineAttack(player);
		printToScreen()

		if(isGameOver(opponent)){
			attackButton.disabled = true;
			gameMessage.innerText = "Game Over. Player Won!";
			gameOver.disabled = false;
		}else{
		
		attackButton.disabled = true;
		gameMessage.innerText = "Opponent is about to strike!";
		
		setTimeout( () => {
			player.health -= determineAttack(opponent);
			printToScreen();
			if(isGameOver(player)){
				attackButton.disabled = true;
				gameMessage.innerText = "Game Over. Opponent Won!";
				gameOver.disabled = false;
				incremenseStat();
			}else{	
				gameMessage.innerText = "";
				attackButton.disabled = false;
			}
		}, 800);
		}
	}
	
	const showStats = () => {
		window.open("showStats.php","_self")
	}
	
	const determineAttack = (person) =>{
		return Math.floor(Math.random() * person.power);
	}
	
	const isGameOver = (person) =>{
		return person.health <= 0;
	}

	const printToScreen = () => {
		document.getElementById('opponent-health').innerText = opponent.health;
		document.getElementById('player-health').innerText = player.health;
	}
	printToScreen();
	