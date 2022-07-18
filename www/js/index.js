
$(document).ready(function(){

    $.ajax({
        type: "post",
        url: "../php/local.php",
        success: function(response){
            $("#local").html(response)
        }
    })
})