$(document).ready(function(){

    $.ajax({
        type: "post",
        url: "../php/table.php", 
        data: {location: $("#location").val()},
        success: function(response){
            $("#table-area").html(response)
        }
    })

})