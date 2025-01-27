const { Picture } = require("./picture");

function testButton(){
    alert("Sample Script");
}

function navigate(url){
    window.location.href=url;
}

function toggleDialog(dialogName){
    var dialogBox = document.getElementById(dialogName);
    var modal = document.getElementById("modal");

    if((dialogBox.style["display"] == "none") || (dialogBox.style["display"] == "")
    || (dialogBox.style["display"] == null)){
        dialogBox.style["display"] = "block";
        modal.style["display"] = "block";
    }else{
        dialogBox.style["display"] = "none";
        modal.style["display"] = "none";
    }

    
}

/**
 *  @description An object of Picture class.
 */
const picture = new Picture();