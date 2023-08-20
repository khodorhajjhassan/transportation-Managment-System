

function validateadmin(){


    let fname=document.getElementById('fname');
    let last=document.getElementById('last');
    let phone=document.getElementById('phone');
    let email=document.getElementById('email');
    let birth=document.getElementById('birth');
    let password=document.getElementById('password');
    let city=document.getElementById('city');
    let address=document.getElementById('address');
    let vfirst=document.getElementById('vfirst');
    let vlast=document.getElementById('vlast');
    let vphone=document.getElementById('vphone');
    let vemail=document.getElementById('vemail');
    let vbirth=document.getElementById('vbirth');
    let vpassword=document.getElementById('vpassword');
    let vcity=document.getElementById('vcity');
    let vaddress=document.getElementById('vaddress');

    

    vfirst.innerHTML='';
    vlast.innerHTML='';
    vphone.innerHTML='';
    vemail.innerHTML='';
    vbirth.innerHTML='';
    vpassword.innerHTML='';
    vcity.innerHTML='';
    vaddress.innerHTML='';
    
    
    let isvalid=true;
    
    if(fname.value === ''){
        vfirst.innerHTML="Please enter the name";
        isvalid=false;
    }
    if(last.value === ''){
        vlast.innerHTML="Please enter the last name";
        isvalid=false;
    }
    if(phone.value === ''){
        vphone.innerHTML="Please enter the phone number";
        isvalid=false;
    }
    if (email.value === '') {
        vemail.innerHTML="Please enter the email address.*";
        isvalid = false;
      } else if (!/\S+@\S+\.\S+/.test(email.value)) {
        vemail.innerHTML="Please enter a valid email address.*";
        isvalid = false;
      }
    if(birth.value === ''){
        vbirth.innerHTML="Please enter the date of birth";
        isvalid=false;
    }
    if(password.value === ''){
        vpassword.innerHTML="Please enter the password";
        isvalid=false;
    }
    if(city.value === ''){
        vcity.innerHTML="Please enter the city";
        isvalid=false;
    }
    if(address.value === ''){
        vaddress.innerHTML="Please enter the address";
        isvalid=false;
    }
    if(isvalid){
        return true;
    }
    else
    return false;

   
    }
