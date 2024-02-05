let view = {

}

function displayDescription(id){
    const parent = document.getElementById(id);

    parent.style.visibility = "visible";

    var description = document.createElement("p");
    description.id = id + "-description";
    var text = document.createTextNode("Sample text");

    description.appendChild(text);

    parent.appendChild(description);
}