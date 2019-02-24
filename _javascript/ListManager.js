const ListManager = {

    storageKey : 'VocabLists',

    Initialize : function () {
        
        if ( !localStorage ) {
            DisplayError( "Error: your browser does not support localStorage" )
            return this
        }
        
        
        if ( !localStorage[ this.storageKey ] ) {
            localStorage.setItem( this.storageKey, JSON.stringify( [] ) )
        }
        
        return this

    },

    GetAllLists : function () {
        return JSON.parse( localStorage.getItem( this.storageKey ) )
        
    },

    GetList : function ( id ) {
        let allLists = this.GetAllLists()
        return allLists[ allLists.indexOf( id ) ]
    },
    
    AddList : function ( lang, name, link ) {
        let newList = new VocabList(name, lang, link)
        let allLists = this.GetAllLists()
        allLists.push( newList )
        localStorage[ this.storageKey ] = JSON.stringify( allLists )

        return this
    },
    
    RemoveList : function ( id ) {

        let allLists = this.GetAllLists()
        localStorage[ this.storageKey ] = JSON.stringify( allLists.filter( list => list.id !== id) )

        return this

    },
    
    RefreshListDisplay : function () {
        let displayList = $( "#listSelection ul" )
        let allLists = this.GetAllLists()

        displayList.empty()
        if ( allLists.length === 0 ) {
            displayList.append("<p>No list found.</p>")
            return this
        }

        displayList.addClass('attachLoaderIcon')

        allLists.forEach( list => {
            this.FetchList( list, res => {

                displayList
                    .append( res )
                    .parent().find("*").off()
                SetListSelectionEvent()

            })
            
        })

        displayList.removeClass("attachLoaderIcon")
        return this

    },

    FetchList : function ( listInfo, callback ) {

        let xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                callback( xhttp.responseText )
            }
          }
        xhttp.open("GET", "resources/templates/languageListItem.php?listInfo=" + JSON.stringify( listInfo ), true)
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhttp.send()

        return this

    }

    

}

function VocabList( name, lang, link) {

    this.name = name
    this.lang = lang
    this.link = link
    this.id = Math.trunc( Math.random() * Math.pow(10, 6) )
    // this.count = 0

    let creationDate = new Date()

    this.date =
        creationDate.getDate() + '-' +
        creationDate.getMonth() + '-' +
        creationDate.getFullYear()

}