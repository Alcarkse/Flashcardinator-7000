<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'common/headStuff.html'; ?>
        <link rel="stylesheet" href="_css/listSelection.css">
    </head>

    <body>
        <header>
            <a href="index.php"><h1>Flashcardinator-7000</h1></a>
            <h2>Language Selection</h2>
        </header>
        <main>
            <p id="task">Choose a list.</p>
    
            <div id="listSelection">
                <h1>Saved Lists</h1>
                <ul>
                    <li>Japanese 1</li>
                    <li>Japanese 2</li>
                    <li>Chinese 1</li>
                </ul>
                <div id="addList"><p>Add List</p><input type="text" placeholder="https://drive.google.com/spreadsheet/example.csv"><button>Add</button></div>
            </div>
        </main>

    </body>

</html>