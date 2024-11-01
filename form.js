
function validation(){
   
    if(document.formfill.userName.value==""){
        document.getElementById("result1").innerHTML="Enter Username";
        return false;
    }
    else if(document.formfill.userName.value.length<5){
        document.getElementById("result1").innerHTML="Atleast five characters ";
        return false;
    }
    else if(document.formfill.email.value==""){
        document.getElementById("result2").innerHTML="Enter your Email";
        return false;
    }
    else if(!document.formfill.email.value.match(/^\w+(\.-?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
        document.getElementById("result2").innerHTML="Enter your valid email ";
        return false;
    }
 
    else if(document.formfill.phoneNum.value==""){
        document.getElementById("result3").innerHTML="Enter your contact number";
        return false;
    }
    else if(isNaN(document.formfill.phoneNum.value)){
        document.getElementById("result3").innerHTML="Enter only numeric values";
        return false;
    }
    else if(document.formfill.phoneNum.value.length!=10){
        document.getElementById("result3").innerHTML="Enter 10 numerical values";
        return false;
    }
    else if(document.formfill.password.value==""){
        document.getElementById("result4").innerHTML="Enter stronge password";
        return false;
    }
    /*else if(!document.formfill.password.value.match(/[A-Z]/g || /[a-z]/g || /[0-9]/g)){
        document.getElementById("result4").innerHTML="Must contain capital, simple letters & digitis";
        return false;
    }
    else if(document.formfill.password.value.length<8){
        document.getElementById("result4").innerHTML="Must contain 8 Characters";
        return false;
    }*/
    else if(document.formfill.password.value!==document.formfill.cpassword.value){
        document.getElementById("result5").innerHTML="didn't match";
        return false;
    }/*
    else if(document.formfill.password.value==document.formfill.cpassword.value){
    
        popup.classList.add("open-popup");
        return false;
    }*/
    


}
var popup=document.getElementById("popup");

function closePopup(){
    popup.classList.remove("open-popup");
}

function loginValidation(){
   
        if(document.formfill.userName.value==""){
            document.getElementById("result6").innerHTML="Enter Username";
            return false;
        }
        
        else if(document.formfill.password.value==""){
            document.getElementById("result7").innerHTML="Enter your Password";
            return false;
        }
}

