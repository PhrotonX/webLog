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

    birthyear.addEventListener("input", intercalarate());

    birthmonth.addEventListener("input", function(){
        const month = birthmonth.value;
        let days;

        switch(month){
            case getMonthWithLeadingZeroStr(Months.February):
                day = 28;
                intercalarate();
                break;
            case getMonthWithLeadingZeroStr(Months.April):
            case getMonthWithLeadingZeroStr(Months.June):
            case getMonthWithLeadingZeroStr(Months.September):
            case getMonthWithLeadingZeroStr(Months.November):
                days = 30;
                break;
            default:
                days = 31;
                break;
        }

        for(let i = 1; i <= days; i++){
            birthmonth.innerHTML += '<option value="'+i+'">'+i+'</option>';
        }
    });
});

function intercalarate(){
    const year = birthyear.value;

    if(year % 4 == 0){
        birthday.innerHTML += '<option value="'+29+'">'+29+'</option>';
    }
}