<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('resources/templates/headStuff.html') ; ?>
        <link rel="stylesheet" href="_css/stylesheets/pages/index.css">
        <script src="_javascript/ListManager.js"></script>
        <script src="_javascript/main.js"></script>
    </head>

    <body>
        <header>
            <a href="index.php"><h1>Flashcardinator-7000</h1></a>
        </header>
        <main>
    
            <div id="listSelection">
                <h1>Choose a List</h1>
                <h2>Saved Lists</h2>
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
                <h2>Add New List</h2>
                <div id="addList">
                    <select name="lang">
                        <option value="0">Language...</option>
                        <option value="jp">Japanese</option>
                        <option value="zh">Chinese</option>
                    </select>
                    <input name="listName" type="text" placeholder="List Name">
                    <input name="link" type="url" placeholder="List URL">
                    <button>Add</button>
                </div>
                <div class="devInfo"><b>Sample Link for debugging:</b><br>https://docs.google.com/spreadsheets/d/e/2PACX-1vSu_2sKcQHbib9-wubE7Yw2RRo8Dm0d8IVjJDvt-fnrB21FEgNHYvpopWwtBLhfE5_TTCXk38gjtOiE/pub?output=csv</div>
            </div>

            <!-- <p class="attachLoaderIcon"> Loading... (not actually loading, just playing an animation) </p> -->
        </main>

    </body>

</html>