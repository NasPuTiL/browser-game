<?php
include("header2.php");
include("functions.php");
?>
Register
<?php

//polaczenie
$conn = Database::getConnection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//po nacisnieciu rejestruj!
if(isset($_POST['register'])){
    $username = protect($_POST['username']);
    $password = protect($_POST['password']);
   	$cos = protect($_POST['email']);

   if ($result = $conn->query("SELECT username FROM user WHERE username='$username'")) {
        $row_cnt = $result->num_rows;
        
        if($row_cnt > 0){
            print("Username is used!");
        }else if($username=="" || $password =="" || $email=""){
            print("Please supply all fields");
        }else{
        $insert1 = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$cos')";
        $insert2 = "INSERT INTO stats (gold, blood, defence, attack, HP, manna, strength, dexitery, uid, expiriance,level, stan, points) VALUES (300, 0, 10, 10, 100, 50, 7, 7,'$username',0,1, '-', 10)";
        
        if (!$conn->query($insert1) == TRUE){
            echo "Error: " . $insert1 . "<br>" . $conn->error;
        }
        
        if (!$conn->query($insert2) == TRUE){
            echo "Error: " . $insert2 . "<br>" . $conn->error;
        }  
        print("Congratulation, You are registered! ");
        
        //EQ
        $eq1 = setEquipment('boots',1);
        $eq2 = setEquipment('weapon',1);
        
        $insert3 = "INSERT INTO equipment (name, attack, HP, strength, uid, kind, dexterity, defence, isUsedValue) VALUES ('$eq1[0]', '$eq1[1]', '$eq1[2]', '$eq1[3]', '$username', '$eq1[5]', '$eq1[6]', '$eq1[7]', 1)";
        $insert4 = "INSERT INTO equipment (name, attack, HP, strength, uid, kind, dexterity, defence, isUsedValue) VALUES ('$eq2[0]', '$eq2[1]', '$eq2[2]', '$eq2[3]', '$username', '$eq2[5]', '$eq2[6]', '$eq2[7]', 0)";
        if (!$conn->query($insert3) == TRUE){
            echo $insert3. ", Error: <br>" . $conn->error;
        }  
        
        if (!$conn->query($insert4) == TRUE){
            echo $insert4. ", Error: <br>" . $conn->error;
        }  
   }
}
else{
    echo "Error SELECT Code, Name FROM Country ORDER BY Name " . $conn->error;
}
};
?>
<br /><br />

<form action="register.php" method="POST">
Username: <input type="text" name="username"/><br />
Password: <input type="password" name="password"/><br />
E-mail: <input type="text" name="email"/><br />
<input type="submit" name="register" value="Register"/>
</form>
<br />

<?php
include("footer.php");
?>
