
//----------------------------------INITIALIZATION
const addSalaryDefaultButton = document.querySelector('#addSalaryDefaultButton');
const cancelSalaryDefaultButton = document.querySelector('#cancelSalaryDefaultButton');
const defaultexpenseBalance = document.querySelector('#defaultexpenseBalance');
const defaultdesireBudget = document.querySelector('#defaultdesireBudget');
const defaultsavingsTotals = document.querySelector('#defaultsavingsTotal');
const defaulttithesAmount = document.querySelector('#defaulttithesAmount');
const allowDebtDeductions = document.querySelector('#allowDebtDeductions');
const defaulttotalPercent = document.querySelector('#defaulttotalPercent');
const alertDefaultWrongPercent = document.querySelector('#alertDefaultWrongPercent');
const alertDefaultSuccessPercent = document.querySelector('#alertDefaultSuccessPercent');


//F---------------------------------FETCHING THE LOCAL STORAGE
let defaultValueExpense = localStorage.getItem('defaultValueExpense');
let defaultValueDesire = localStorage.getItem('defaultValueDesire');
let defaultValueSavings = localStorage.getItem('defaultValueSavings');
let defaultValueTithes = localStorage.getItem('defaultValueTithes');
let allowdebtDeduction = localStorage.getItem('allowdebtDeduction');




//-----------------------------------SETTING THE VARIABLES 
if(defaultValueExpense == null && 
    defaultValueDesire == null &&
    defaultValueSavings == null &&
    defaultValueTithes == null ){
        defaultexpenseBalance.value = 50;
        defaultdesireBudget.value = 20;
        defaultsavingsTotals.value = 20;
        defaulttithesAmount.value = 10;
}else{
    defaultexpenseBalance.value = defaultValueExpense;
    defaultdesireBudget.value = defaultValueDesire;
    defaultsavingsTotals.value = defaultValueSavings;
    defaulttithesAmount.value = defaultValueTithes;
}



//--------------------------------------------ENABLE/DISANLE DEBT DEDUCTION
const enableDebtDeduction = () => {
    localStorage.setItem('allowdebtDeduction', "true");
}

const disableDebtDeduction = () => {
    localStorage.setItem('allowdebtDeduction', "false");
}

//toggle pill
if (allowdebtDeduction === "true") {
    allowDebtDeductions.checked = true;
    enableDebtDeduction();
} else {
    allowDebtDeductions.checked = false;
}

//---------------------------------------CHECK IF THE TOTAL PERCENT IS 100%
var sumdefaulttotalPercent = Number(defaultexpenseBalance.value) + Number(defaultdesireBudget.value) + Number(defaultsavingsTotals.value) + Number(defaulttithesAmount.value);
if (sumdefaulttotalPercent != 100) {
    var classdefaultpercent = "danger"
} else {
    var classdefaultpercent = "success"
}
//APPENDING THE HTML
defaulttotalPercent.innerHTML = '<span class="text-' + classdefaultpercent + '">(' + sumdefaulttotalPercent + '%/100%)</span> ';

//----------------------------------------FUNCTION ONCCHANGE OF THE INPUTS
function defaultchange() {
    addSalaryDefaultButton.style.display = "block";
    cancelSalaryDefaultButton.style.display = "block";



    sumdefaulttotalPercent = Number(defaultexpenseBalance.value) + Number(defaultdesireBudget.value) + Number(defaultsavingsTotals.value) + Number(defaulttithesAmount.value);
    if (sumdefaulttotalPercent != 100) {
        var classdefaultpercent = "danger"
    } else {
        var classdefaultpercent = "success"
    }
    defaulttotalPercent.innerHTML = '<span class="text-' + classdefaultpercent + '">(' + sumdefaulttotalPercent + '%/100%)</span> ';

}

//----------------------------------------SAVING THE VALUE TO LOCAL STORAGE
addSalaryDefaultButton.addEventListener('click', () => {

    //CHECK IF THE PERCENT IS !100
    if (sumdefaulttotalPercent != 100) {
        //IF NO, SHOW ERROR
        customFadeIn(alertDefaultWrongPercent, 200)
        setTimeout(() => {
            customFadeOut(alertDefaultWrongPercent, 200)
        }, "2000")
    } else {
        //IF YES, SHOW SUCCESS
        customFadeIn(alertDefaultSuccessPercent, 200)
        setTimeout(() => {
            customFadeOut(alertDefaultSuccessPercent, 200)
        }, "2000")

        //SAVING
        localStorage.setItem('defaultValueExpense', defaultexpenseBalance.value);
        localStorage.setItem('defaultValueDesire', defaultdesireBudget.value);
        localStorage.setItem('defaultValueSavings', defaultsavingsTotals.value);
        localStorage.setItem('defaultValueTithes', defaulttithesAmount.value);
        addSalaryDefaultButton.style.display = "none";
        cancelSalaryDefaultButton.style.display = "none";
    }

    //CHECK THE STATUS OF THE TOGGLE PILL
    let allowdebtDeduction = localStorage.getItem('allowdebtDeduction');
    if (allowdebtDeduction !== "true") {
        enableDebtDeduction(); //ENABLE THE DEBT DEDUCTION

    } else {
        disableDebtDeduction(); // DISABLE THE DEBT DEDUCTION
    }
});


//----------------------------------------CANCEL THE NEW SALARY DEFAULT VALUE
cancelSalaryDefaultButton.addEventListener('click', () => {

    defaultexpenseBalance.value = defaultValueExpense;
    defaultdesireBudget.value = defaultValueDesire;
    defaultsavingsTotals.value = defaultValueSavings;
    defaulttithesAmount.value = defaultValueTithes;
    addSalaryDefaultButton.style.display = "none";
    cancelSalaryDefaultButton.style.display = "none";

    defaulttotalPercent.innerHTML = '<span class="text-success">(100%/100%)</span> ';

    //CHECK THE STATUS OF THE TOGGLE PILL
    let allowdebtDeduction = localStorage.getItem('allowdebtDeduction');
    if (allowdebtDeduction !== "true") {
        allowDebtDeductions.checked = false; //DISABLE THE DEBT DEDUCTION

    } else {
        allowDebtDeductions.checked = true; //ENABLE THE DEBT DEDUCTION
    }
})
