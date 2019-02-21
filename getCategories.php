<?php
include 'vocabulary.php';


$chineseCategories = new Vocabulary();

$categories = array_values(array_unique(array_map(function ($el) {
    return $el['category'];
}, $chineseCategories->data)));

sort($categories, 2);

$categories = array_map(function ($el) use ($chineseCategories) {
    $newEl = [
        'cat' => strtolower($el),
        'count' => count($chineseCategories->filter([$el])),
        'used' => true
    ];
    return $newEl;
}, $categories);

echo json_encode($categories);