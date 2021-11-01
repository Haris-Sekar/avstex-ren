function passwordValidation(){
    var pass=document.getElementById('pass').value;
    var con_pass=document.getElementById('cpass').value;
    if(pass!=con_pass){
        document.getElementById('a1').style.visibility="visible";
        document.getElementById('btn_submit').disabled ="true";
    }else{
        document.getElementById('a1').style.visibility="hidden";
        document.getElementById('btn_submit').disabled ="false";
    }
}