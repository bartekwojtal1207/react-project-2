<?php
session_start();

$myfile = fopen("newfile.JSON", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";
$nickname = $_SESSION['user'];
$myObj->nickname = $nickname;

$myJSON = json_encode($myObj);

fwrite($myfile,$myJSON);
fclose($myfile);

header("Location: index.php");


?>
