function testButton(){
    alert("Sample Script");
}

function navigate(url){
    window.location.href=url;
}

function toggleDialog(dialogName){
    var dialogBox = document.getElementById(dialogName);

    if((dialogBox.style["display"] == "none") || (dialogBox.style["display"] == "")
    || (dialogBox.style["display"] == null)){
        dialogBox.style["display"] = "block";    
    }else{
        dialogBox.style["display"] = "none";
    }

    
}