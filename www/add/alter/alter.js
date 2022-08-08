/**
 *  (c) redxam llc and affiliates. Confidential and proprietary.
 *
 *  @oncall dev+Luiz Henrique da Mota Couto
 *  @format
 */


$(document).ready(function(){

    places = ["#local", "#credor", "#sector"]
    for (let index = 0; index <= places.lenght; index++) {
        $.ajax({
            type: 'post',
            url: '../../php/fillForm.php',
            data: {item: index, alter: 1},
            success: function(response){
                $(places[index]).html(response)
            }
        })
    }
    /*// local
    $.ajax({
        type: 'post',
        url: '../../php/fillForm.php',
        data: {item: 1, alter: 1},
        success: function(response){
            $("#local").html(response)
        }
    })
    // credor
    $.ajax({
        type: 'post',
        url: '../../php/fillForm.php',
        data: {item: 2, alter: 1},
        success: function(response){
            $("#local").html(response)
        }
    })
    // setor
    $.ajax({
        type: 'post',
        url: '../../php/fillForm.php',
        data: {item: 3, alter: 1},
        success: function(response){
            $("#local").html(response)
        }
    })*/

})
