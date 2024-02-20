//Paradigm: Event-driven

var birthyear = document.getElementById('signup-birthyear');
var birthmonth = document.getElementById('signup-birthyear');
var birthday = document.getElementById('signup-birthday');

document.addEventListener("DOMContentLoaded", (event) => {    
    var date = new Date();
    for(let i = date.getFullYear(); i > 1860; i--){
        birthyear.innerHTML += '<option value="'+i+'">'+i+'</option>';
    }

    /*for(let i = 1; i <= 12; i++){
        birthmonth.innerHTML += '<'
    }*/
});

birthyear.addEventListener("input", function(){
    const year = birthyear.value;

    if(year % 4 == 0){
        element.innerHTML += '<option value="'+29+'">'+29+'</option>';
    }
});