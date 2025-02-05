let view = {

}

function displayDescription(id){
    const parent = document.getElementById(id);
    const newId = id + "-description";

    if(parent.getElementById(newId) == null){
        var description = document.createElement("p");
        description.id = id + "-description";
    }
    parent.style.visibility = "visible";
    var child = parent.getElementById(newId);
    child.innerText = "Sample text";
}