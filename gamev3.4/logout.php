
<?php
session_start();
include("header.php");
session_destroy();
header("Location: index.php");
echo "You are logged";
include("footer.php");
?>

