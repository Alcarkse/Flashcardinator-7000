<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Chinese Vocabulary - Jobs</title>
  <link rel="stylesheet" href="style.css">
  <script src="lib.js" charset="utf-8"></script>
  <script src="responsivevoice.js" charset="utf-8"></script>
  <script type="text/javascript">
    /*
     * 1- Pre-initialization
    */
    let voice = false;
    let progressIndex = 0;
    let categories = <?php include 'getCategories.php' ?>;
   
   window.addEventListener('load', function () {
     /*
     * 2- Initialization
     */
    
    /*  PHASE 1  */
    //  Declaring DOM nodes
    const next = document.getElementsByName('next')[0]
    const card = document.getElementById('card')
    const char = document.getElementById('char')
    const pinyin = document.getElementById('pinyin')
    const eng = document.getElementById('eng')
    const settingButtons = Array.from(document.getElementsByName('displayOnly'))
    const total = document.getElementById('total')
    const menu = document.getElementById('menu')
    const menuTrigger = document.getElementById('menuTrigger')
    const start = document.getElementById('start')
    const startBtn = document.getElementById('startButton')
    
    startBtn.addEventListener('transitionend', e => {e.stopPropagation()})

    //  Appending categories to menu
    console.log('Categories', categories)
    categories.forEach( catObj => {setCategoriesInMenu(catObj)})
    const catergoryButtons = Array.from(document.querySelectorAll('#filters button'))


    /*  PHASE 2  */
    startBtn.onclick = e => {
        //  Hide start pane
        start.addEventListener('transitionend', function () {
          start.parentNode.removeChild(start)
        })
        start.classList.add('hidden')

        //  request vocabulary
        let getCategories = () => categories.filter(catObj => catObj.used).map(catObj => catObj.cat)

        requestVocab(getCategories(), response => {

          setVocabulary(response)

          catergoryButtons.forEach(btn => {
            btn.addEventListener('click', () => {
              char.innerHTML = ''
              pinyin.innerHTML = ''
              eng.innerHTML = ''
              loadingStart([char, eng, pinyin])
              requestVocab(getCategories(), setVocabulary)
            })
          })

        })
      }

      function setVocabulary (response) {
        window.Vocab_in_use = shuffle(response)
        dispVocab()
        updateTotal()
      }


      /*
       * 3- Event Listeners 
      */
      
      //Side menu expand/collapse
      menuTrigger.addEventListener('click', () => menu.classList.toggle('hidden'))

      //Next Word
      next.addEventListener('click', nextWord)
      document.addEventListener('keyup', (event) => {
      	if (event.keyCode == 39) nextWord()
      })

      function nextWord () {
	      progressIndex++
	      dispVocab()
      }

      //Display Buttons 
      settingButtons.forEach(button => {
        button.addEventListener('click', () => {
          button.classList.toggle('active')
          document.getElementById(button.dataset.filter).classList.toggle('shown')
        })
      })

      //Categories Buttons
      catergoryButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          btn.classList.toggle('active')
          let cc = categories[categories.findIndex(obj => obj.cat == btn.name)]
          cc.used = cc.used ? false : true
          progressIndex = 0
        })
      })

      //Extra Prefs Buttons
      let audioBtn = document.getElementById('audioBtn')
      audioBtn.addEventListener('click', () => {
      	audioBtn.classList.toggle('active')
      	voice = !voice
      	console.log(voice)
      })

      //Collapsable menu sections
      let collapsables = Array.from(document.getElementsByClassName('collapsable'))
      collapsables.forEach( el => {
        el.addEventListener('click', () => {
          el.classList.toggle('closed')
        })
      })

      //Card Audio ReTrigger
      card.addEventListener('click', chineseTalk)
      
    })
  </script>
</head>

<body>
  <span id="menuTrigger"></span>
  <section id="menu" class="">
    <h2 class="collapsable">Categories</h2>
    <div id="filters" class="loading"></div>
    <h2>Card Display</h2>
    <div class="content">
      <label for="characters" class="chinese" title="Display only chararcters">汉字</label>
      <button type="button" name="displayOnly" data-filter="char"></button>
      <label for="pinyin">Pinyin</label>
      <button class="active" type="button" name="displayOnly" data-filter="pinyin"></button>
      <label for="english">English</label>
      <button type="button" name="displayOnly" data-filter="eng"></button>
    </div>
    <h2>Other Preferences</h2>
    <div class="otherPrefs">
      <label for="audio">Audio</label>
      <button type="button" name="audio" id="audioBtn" class=""></button>
  </section>
  <div id="start">
    <h1>Choose from the categories on the left <br>and you're all set. </h1>
    <button id="startButton">Start</button>
  </div>
  <div id="card">
    <div class="chinese loading" id="char" data-title="Chararcters"></div>
    <div class="shown loading" id="pinyin" data-title="Pinyin"></div>
    <div class="loading" id="eng" data-title="English"></div>
  </div>
  <div class="count">
    <span id="progress">0</span> /
    <span id="total">error</span>
  </div>
  <!-- &#9654; -->
  <button type="button" name="next"></button>
</body>

</html>