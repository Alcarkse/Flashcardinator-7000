//  Definitions


function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function dispVocab() {
  if (progressIndex < Vocab_in_use.length) {

    loadingEnd([char, eng, pinyin])
    
    //switch to next vocabulary word
    char.innerHTML = Vocab_in_use[progressIndex].character
    pinyin.innerHTML = Vocab_in_use[progressIndex].pinyin
    eng.innerHTML = Vocab_in_use[progressIndex].english

    chineseTalk()
    updateProgress()

  } else {

    alert('You\'re done!')

  }
}


//  WIP
function setCategoriesInMenu(catObj) {
  let container = document.getElementById('filters')
  loadingEnd(container)

  let label = document.createElement('label')
  label.setAttribute('for', catObj.cat)
  label.setAttribute('count', catObj.count)
  let labelTxt = document.createTextNode(catObj.cat)
  label.appendChild(labelTxt)
  
  let btn = document.createElement('button')
  btn.setAttribute('name', catObj.cat)
  btn.classList.add('active')

  container.appendChild(label)
  container.appendChild(btn)
}
function updateTotal() {
  total.innerHTML = Vocab_in_use.length - 1
}

function updateProgress() {
  let progress = document.getElementById('progress')

  progress.innerHTML = progressIndex
  document.documentElement.style.filter = "hue-rotate(" + (100 * progressIndex) / (Vocab_in_use.length - 1) + "deg)"
}

function chineseTalk() {
  if (voice) {
    let chars = document.getElementById('char').innerHTML
    responsiveVoice.speak(chars, "Chinese Female")
  }
}

function loadingStart(el) {
  let arr
  if (!Array.isArray(el)) {arr = [el]}
  else {arr = el}
  arr.forEach(node => node.classList.add('loading'))
}
function loadingEnd(el) {
  let arr
  if (!Array.isArray(el)) {arr = [el]}
  else {arr = el}
  arr.forEach(node => node.classList.remove('loading'))
}

//  AJAX Requests

function requestVocab(categories, callback) {
  let param = categories.reduce((str, cat) => str + '&cat[]=' + cat,'').substring(1)

  //  Request
  let xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = () => {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        callback(JSON.parse(xhttp.responseText))
      }
    }
  xhttp.open("POST", "getVocab.php", true)
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhttp.send(param)
}

function getCategories(callback) {
  //  Request
  let xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = () => {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        callback(JSON.parse(xhttp.responseText))
      }
    }
  xhttp.open("POST", "getCategories.php", true)
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhttp.send()

}

