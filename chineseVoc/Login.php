<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'common/headStuff.html'; ?>
        <link rel="stylesheet" href="_css/forms.css">
        <script src="Scripts/forms.js"></script>
    </head>
    <body>
        <header>
            <a href="index.php"><h1>Flashcardinator-7000</h1></a>
            <h2>Language Selection</h2>
            <h2>Login</h2>
        </header>
        <main>
            <form action="" id="loginForm">
                <h2>Login</h2>
                <label for="driveLocation">
                    Vocabulary Sheet Location
                    <i class="labelInfoToggle"></i>
                </label>
                
                <div class="moreInfo" for="driveLocation">
                    A link to your vocabulary sheet hosted online. Your vocabolary sheet contains a list of words that you want to revise, along with a coressponding frequency that is automatically calculated depending on your accuracy. If you don't have a vocabulary sheet yet, you can use the template provided below to get started.
                    <a href="ressources/vocab_sheet_template.csv" class="lowFocusButton"><button><span id="downloadIcon"></span>Download Template</button></a>
                </div>
                <input required type="text" name="driveLocation" placeholder="e.g. https://docs.google.com/spreadsheets/example..."/>
                <input class="highlightButton" type="submit" value="Submit"/>
            </form>
        </main>
    </body>
</html>
