<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('resources/templates/headStuff.html') ; ?>
        <link rel="stylesheet" href="_css/stylesheets/pages/index.css">
    </head>

    <body>
        <header>
            <a href="index.php"><h1>Flashcardinator-7000</h1></a>
        </header>
        <main>
            <p id="task">Choose a list.</p>
    
            <div id="listSelection">
                <h1>Saved Lists</h1>
                <ul>
                    <li>
                        <div class="head">
                            <button class="subtle">></button>        
                            <span>Japanese 1</span>
                            <span>84 flashcards</span>
                            <button class="good">Go</button>
                        </div>
                        <div class="body">
                            <p class="link"><span>Source: </span><span>http://This.is/a/url.link</span></p>
                            <p class="lang"><span>Language: </span><span>Japanese</span></p>
                            <p class="lang"><span>Last refreshed: </span><span>20/02/2019</span></p>
                            <button class="danger">Remove</button>
                        </div>
                    </li>
                </ul>
                <h1>Add New List</h1>
                <div id="addList"><p>Add List</p><input type="text" placeholder="https://drive.google.com/spreadsheet/example.csv"><button>Add</button></div>
            </div>

            <p class="attachLoader"> Loading... (not actually loading, just playing an animation) </p>
        </main>

    </body>

</html>