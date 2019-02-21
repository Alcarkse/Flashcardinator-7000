<?php
include 'vocabulary.php';

if (isset($_POST['cat'])) {
    $categories = $_POST['cat'];
}

$chineseVocab = new Vocabulary();

$words = $chineseVocab->filter($categories);
$JSON_words = json_encode($words);

echo $JSON_words;