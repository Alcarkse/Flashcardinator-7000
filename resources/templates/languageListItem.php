<?php

    if ( !isset( $_GET["listInfo"]) ) {
        echo 'error';
        exit();
    }

    $listInfo = json_decode( $_GET["listInfo"] );

    //var_dump( isset($listInfo->bla) );


?>


<li name="<?php echo isset($listInfo->id) ? $listInfo->id : 'NotFound" class="invalid"'; ?>">
    <div class="head">
        <button class="subtle">></button>        
        <span><?php echo isset($listInfo->name) ? $listInfo->name : 'NotFound'; ?></span>
        <span><?php echo isset($listInfo->count) ? $listInfo->count : '?'; ?> flashcards</span>
        <button class="good">Go</button>
    </div>
    <div class="body">
        <p class="link"><span>Source: </span><span><?php echo isset($listInfo->link) ? $listInfo->link : 'NotFound'; ?></span></p>
        <p class="lang"><span>Language: </span><span><?php echo isset($listInfo->lang) ? $listInfo->lang : 'NotFound'; ?></span></p>
        <p class="lang"><span>Last refreshed: </span><span><?php echo isset($listInfo->date) ? $listInfo->date : 'NotFound'; ?></span></p>
        <button class="danger">Remove</button>
    </div>
</li>