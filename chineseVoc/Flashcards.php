<?php
include 'vocabulary.php';

$cookieName = "driveLocation";
$lang = $_GET["lang"];

$vocabSheetURL = '';
$gotVocabFromLogin = isset($_POST[$cookieName]);
$cookieSet = isset($_COOKIE[$cookieName]);

if ( $gotVocabFromLogin ) {
    $vocabSheetURL = $_POST[$cookieName];
    setcookie($cookieName, $vocabSheetURL, strtotime( '+1 day' ), '/');
    $_COOKIE[$cookieName] = $vocabSheetURL;
} else {
    if ( !$cookieSet ) {
        header('location: Login.php');
        exit;
    }

    $vocabSheetURL = $_COOKIE[$cookieName];
}

// Index page does not need a language selection screen:
// Behavior of the flashcards is the same for all languages

$userVocab = new Vocabulary($vocabSheetURL, $lang);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'common/headStuff.html'; ?>
    </head>
    <body>
        <header>
            <a href="index.php"><h1>Flashcardinator-7000</h1></a>
            <h2><?php 
            switch ($lang) {
                case 'zh':
                    echo 'Chinese';
                    break;
                
                case 'jp':
                    echo 'Japanese';
                    break;
                
                default:
                    echo "No Selected Language";
                    break;
            }
            ?></h2>
            <h2>Flashcards</h2>
        </header>

        <?php $userVocab->display(); ?>
        
    </body>
</html>
