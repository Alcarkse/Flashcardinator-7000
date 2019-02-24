$( () => {

    ListManager
        .Initialize()
        .RefreshListDisplay()
    
    SetListSelectionEvent()

    
})

function SetListSelectionEvent() {
    $( "#listSelection .head button.good" ).on( "click", FlashcardStart )
    $( "#listSelection .body button.danger" ).on( "click", ProcessListRemoval )
    $( "#addList button" ).on( "click", ProcessListAddition )

    $( "#listSelection .head button.subtle" ).on( "click", event => {
    
        let button = event.target
        $( button ).parent().parent().toggleClass( "opened" )
        
    })
}

function ProcessListAddition( event ) {
    
    let button = event.target

    $( button ).addClass( "attachLoaderIcon" )
    
    let lang = $( event.target ).siblings( "[name=\"lang\"]" )
    let link = $( event.target ).siblings( "[name=\"link\"]" )
    let name = $( event.target ).siblings( "[name=\"listName\"]" )
    
    if ( !ValidLinkParameters( lang.val(), link.val() || name.val() == '' ) ){
        DisplayError( "Error: Please check the link and make sure you have selected a language." )
        $( button ).parent().addClass( "invalid" )
        return false
    }
    
    ListManager
        .AddList( lang.val() , name.val(), link.val() )
        .RefreshListDisplay()

    
    $( button ).removeClass( "attachLoaderIcon" )
    $( button ).parent().removeClass( "invalid" )
    lang.val( "0" )
    link.val( "" )
    name.val( "" )

}

function ProcessListRemoval( event ) {

    let button = event.target
    let listId = $( button ).parent().parent().attr( "name" )

    ListManager
        .RemoveList( parseInt( listId ) )
        .RefreshListDisplay()

}

function FlashcardStart( event ) {

    let button = event.target
    $( button ).addClass( "attachLoaderIcon" )
    console.log( button )

    //  1. Find reference in localStorage
    //  2. Load flashcards

    return false
}

function ValidLinkParameters( languageValue, link ) {

    if ( languageValue === "0" ) return false

    if ( link.slice(-3) !== "csv" ) return false

    return true

}

function DisplayError( message ) {
    alert( message )
}