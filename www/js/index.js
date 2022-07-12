
document.querySelector("#adicionar").onclick = function(){
    window.location = "../cadastro/cadastro_patrimonio.html"
}
document.querySelector("#voltar").onclick = function(){
    window.location = "../periodo/index.html"
}
/*document.querySelector("#").onclick = function(){
    window.location = ".html"
}
document.querySelector("#").onclick = function(){
    window.location = ".html"
}*/

function clickAlt(){
    //const xhhtp = new XMLHttpRequest();

    fetch('form.html')
    .then(response => response.text())
    .then(text => document.querySelector('body').innerHTML = text)
    //const elements = {div: {class: 'hidden-form'}}

    /*for(var i = 0; i < elements.lenght; i++) {

    }*/
}
var buttons = document.querySelectorAll('.action-alt')

buttons.forEach(function(item){
    item.addEventListener('click', clickAlt)
});