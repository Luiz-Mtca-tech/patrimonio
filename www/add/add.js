/**
 *  (c) redxam llc and affiliates. Confidential and proprietary.
 *
 *  @oncall dev+Luiz_HEnrique da Mota Couto
 *  @format
 */

'use strict';

$(document).ready(function(){

    $.ajax({
        type: "post",
        url: "../php/fill_form.php",
        data: {item: 1},
        success: function(response){
            $("#local").html(response)
        }
        
    })
    $.ajax({
        type: "post",
        url: "../php/fill_form.php",
        data: {item: 2},
        success: function(response){
            $("#credor").html(response)
        }
        
    })
    $.ajax({
        type: "post",
        url: "../php/fill_form.php",
        data: {item: 3},
        success: function(response){
            $("#sector").html(response)
        }
        
    })

})
