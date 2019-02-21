var moreInfoPanels
var infoPanelsToggle

window.addEventListener('load', () => {

    moreInfoPanels = document.getElementsByClassName("moreInfo")
    infoPanelsToggle = document.getElementsByClassName("labelInfoToggle")
    
    Array.from(infoPanelsToggle).forEach( button => {
        button.addEventListener( 'click', openInfoPanel)
    })

})

openInfoPanel = ( event ) => {
    let sourceButton = event.target
    let keyAttribute = sourceButton.parentNode.attributes["for"].value
    let matchingPanel = Array.from(moreInfoPanels)
        .filter( panel => panel.attributes["for"].value === keyAttribute)[0]

    matchingPanel.classList.toggle("active")
    sourceButton.classList.toggle("active")
}