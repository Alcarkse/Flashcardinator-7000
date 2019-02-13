<?php
    $lang = $_GET["lang"];
    $cookieExists = true;
    $vocab;

    if($cookieExists == false){
        header('location: Login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'common/headStuff.html'; ?>
    </head>
    <body>
        <h1 id="title">Flashcardinator-700</h1>
        <h2>Flashcards</h2>
        
    </body>
</html>
