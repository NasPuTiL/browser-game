<html>
<head>
<title>Game RPG</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" scr="jquery.js"></script>
</head>
<body>
<div id="header">Game RPG</div>
<div id="container">
<div id="navigationLeft"><div id="nav_div">
<?php
if(isset($_SESSION['uid'])){
    //caly blad jest jezeli odkomentujesz include("safe.php"");
    include("safe.php");
    echo "Welcome";
    echo '<br>';
    echo $_SESSION['uid']['username'];
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    
    ?>
    &raquo  <a href="main.php">Main Stats</a><br /><br />
    &raquo  <a href="ranking.php">Battle Ranking</a><br /><br />
    &raquo  <a href="training.php">Train Yourself</a><br /><br />
    &raquo  <a href="shop.php">Eq manage</a><br /><br />
    &raquo  <a href="fight.php">Let's Fight</a><br /><br />
    &raquo  <a href="logout.php">Logout</a>
    
    <?php
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    
}else{
    ?>
    <form action="login.php" method="POST">
    Username: <input type="text" name="username"/><br />
    Password: <input type="password" name="password"/><br />
    <input type="submit" name="login" value="login"/>
    
    </form>
    
    <?php
}
?>
</div></div>
<div id="contetnt"><div id="con_div">