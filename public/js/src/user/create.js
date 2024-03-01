//Paradigm: Event-driven

var birthyear = document.getElementById('signup-birthyear');
var birthmonth = document.getElementById('signup-birthmonth');
var birthday = document.getElementById('signup-birthday');

var country = document.getElementById('signup-country');

var days = 31;

document.addEventListener("DOMContentLoaded", (event) => {    
    var date = new Date();
    for(let i = date.getFullYear(); i > 1840; i--){
        birthyear.innerHTML += '<option value="'+i+'">'+i+'</option>';
    }

    birthyear.addEventListener("input", onBirthdateUpdated);

    birthmonth.addEventListener("input", onBirthdateUpdated);
    
});

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

            if(birthyear.value == '1844' && birthmonth.value === '12'
            && country.value === 'Philippines'){
                days = 30;
            }
            break;
    }

    birthday.innerHTML = '';

    for(let i = 1; i <= days; i++){
        birthday.innerHTML += '<option value="'+i+'">'+i+'</option>';
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