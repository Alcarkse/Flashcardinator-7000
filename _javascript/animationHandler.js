$( () => {

    $("#listSelection .head button.subtle").each( (i, btn) => {

        $(btn).on("click", () => {
            $(btn).parent().parent().toggleClass("opened")
        })

    } )
    
})