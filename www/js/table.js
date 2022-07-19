$(document).ready(function(){

    /* $.ajax({
        type: "post",
        url: "../php/table.php", 
        data: {location: $("#location").val()},
        success: function(response){
            $("#table-area").html(response)
        }
    }) */

    $("#send-search").on("click", function(){
        //alert("click    ")
        dad = document.querySelector("#table-area")
        son = dad.firstElementChild
        dad.removeChild(son)
        $.ajax({
            type: "post",
            url: "../php/search.php",
            data: {number: $("#into-search-input").val()},
            success: function(response){
                $("#table-area").html(response)
            },
            error: function(){
                $("#table-area").html("something went wrong")
            }
        })
    })

})