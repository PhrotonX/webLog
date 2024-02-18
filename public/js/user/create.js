function loadYears(){
    var element = document.getElementById('signup-birthyear');

    for(let i = new Date.getFullYear(); i > 1860; i--){
        element.innerHTML = '<option value="'+i+'">'+i+'</option>';
    }
}