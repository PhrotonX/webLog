//Paradigm: Event-driven

import {USER} from '../constants.js';

var birthyear;
var birthmonth;
var birthday;

var country;

var days = 31;

var type;

//document.addEventListener("DOMContentLoaded", (event) => {    
function loadFormContent(){
    return new Promise((resolve) => {
        alert("forms.js: " + USER.EVENT.FORM_LOADED);

        type = document.querySelector('meta[name="route_type"]').content;

        birthyear = document.getElementById(type + '-birthyear');
        birthmonth = document.getElementById(type + '-birthmonth');
        birthday = document.getElementById(type + '-birthday');
        country = document.getElementById(type + '-country');

        var date = new Date();
        for(let i = date.getFullYear(); i > 1840; i--){
            birthyear.innerHTML += '<option value="'+i+'">'+i+'</option>';
        }

        birthyear.addEventListener("input", onBirthdateUpdated);

        birthmonth.addEventListener("input", onBirthdateUpdated);

        onBirthdateUpdated();

        resolve();
    });
}    

window.loadFormContent = loadFormContent;
//});

function onBirthdateUpdated(){
    setBirthDays();
    intercalarate();
}

function setBirthDays(){
    const month = birthmonth.value;

    switch(month){
        case '02':
            days = 28;
            break;
        case '04':
        case '06':
        case '09':
        case '11':
            days = 30;
            break;
        default:
            days = 31;

            //Hide December 31, 1844 if the country is set to Philippines.
            if(birthyear.value == '1844' && birthmonth.value === '12'
            && country.value === 'Philippines'){
                days = 30;
            }
            
            break;
    }

    birthday.innerHTML = '';

    for(let i = 1; i <= days; i++){
        let j = i;
        if(i < 10){
            j = "0" + i;
        }
        birthday.innerHTML += '<option value="'+j+'">'+i+'</option>';
    }
}

function intercalarate(){
    const year = birthyear.value;
    const leapDay = document.getElementById("intercalary");

    if(!leapDay){
        if((year % 4 == 0) && (birthmonth.value === '02')){
            birthday.innerHTML += '<option value="'+29+'" id="intercalary">'+29+'</option>';
        }else{
            birthday.innerHTML = '';
            setBirthDays();
        }
    }
}