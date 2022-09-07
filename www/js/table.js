$(document).ready(function(){

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

    $("#select-local").on("change", function(){
        dad = document.querySelector("#table-area")
        son = dad.firstElementChild
        dad.removeChild(son)
        $.ajax({
            type: "post",
            url: "../php/generatetablelocal.php",
            data: {location: $("#select-local").val(), execute: "now"},
            success: function(response){    
                $("#table-area").html(response)
            },
            error: function(){
                alert("Algo deu errado!")
            }
        })
    })

})