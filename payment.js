function payValidation(){
    if(document.payForm.cardName.value==""){
        document.getElementById("result1").innerHTML="please enter name on the card";
        return false;
    }
    else if(!document.payForm.cardName.value.match(/^[A-Za-z""]+$/)){
         document.getElementById("result1").innerHTML="Enter the correct name";
        return false;
            }
    else if((document.payForm.cardNumber.value=="")){
        document.getElementById("result2").innerHTML="card number can't be empty";
        return false;
    }
    else if(isNaN(document.payForm.cardNumber.value)){
        document.getElementById("result2").innerHTML="Enter the correct card number";
        return false;
    }
    else if(document.payForm.cardNumber.value.length<12){
        document.getElementById("result2").innerHTML="Enter the correct card number";
        return false;
    }
    else if(isNaN(document.payForm.cvv.value)){
        document.getElementById("result3").innerHTML="Enter the correct cvv";
        return false;
    }
    else if(document.payForm.cvv.value.length<3){
        document.getElementById("result3").innerHTML="Enter the correct cvv";
        return false;
    }
    else if(document.payForm.months.value==""){
        document.getElementById("result4").innerHTML="select expire month";
        return false;
    }
    else if(document.payForm.year.value==""){
        document.getElementById("result4").innerHTML="select expire year";
        return false;
    }
    else{
        popup.classList.add("open-popup");
        return false;
    }

}
var popup=document.getElementById("popup");
