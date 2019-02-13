<?php
$lang = $_GET["lang"];
$cookieExists = true;

if($cookieExists == false){
    header('location: Login.php');
}

?>

<h2>Flashcards</h2>