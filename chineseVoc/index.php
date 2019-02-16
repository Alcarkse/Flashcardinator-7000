<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'common/headStuff.html'; ?>
    </head>

    <body>
        <header>
            <a href="index.php"><h1>Flashcardinator-7000</h1></a>
            <h2>Language Selection</h2>
        </header>
        <main>
            <p id="task">Choose a language to study.</p>
    
            <div id="languageSelection">
                <a href="Flashcards.php?lang=zh">
                    <button class="highlightButton" id="zh" lang="zh">中国语</button>    
                </a>
                <a href="Flashcards.php?lang=jp">
                    <button class="highlightButton" id="jp" lang="jp">日本語</button>
                </a>
            </div>
        </main>

    </body>

</html>