document.addEventListener("DOMContentLoaded", function(){
    var element = document.getElementById('signup-birthyear');

    var date = new Date();
    for(let i = date.getFullYear(); i > 1860; i--){
        element.innerHTML += '<option value="'+i+'">'+i+'</option>';
    }
});