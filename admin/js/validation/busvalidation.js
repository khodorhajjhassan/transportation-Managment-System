function validatebus(){

let selectstation=document.getElementById('selectstation');
let selectdriver=document.getElementById('selectdriver');
let capacity=document.getElementById('capacity');
let platenumber=document.getElementById('platenumber');
let Mechanic=document.getElementById('Mechanic');
let Insurance=document.getElementById('Insurance');
let submit=document.getElementById('submit');
let vcapacity=document.getElementById('vcapacity');
let vplate=document.getElementById('vplate');
let vmechanic=document.getElementById('vmechanic');
let vinsurance=document.getElementById('vinsurance');
let vselectstation=document.getElementById('vselectstation');
let vselectdriver=document.getElementById('vselectdriver');
let input=document.getElementById('platenumber').value;
let input1=document.getElementById('Insurance').value;
vselectstation.innerHTML='';
vselectdriver.innerHTML='';
vcapacity.innerHTML='';
vplate.innerHTML='';
vmechanic.innerHTML='';
vinsurance.innerHTML='';


let isvalid=true;

if(selectstation.value === 'Base Location'){
    vselectstation.innerHTML="Please select the station";
    isvalid=false;
}
if(selectdriver.value === 'Driver Name'){
    vselectdriver.innerHTML="Please select the driver";
    isvalid=false;
}
if((capacity.value) ==""  || parseInt(capacity.value) > 30){

    if(capacity.value ==""){
    vcapacity.innerHTML="Please enter the capacity";
    isvalid=false;
    }
else if(parseInt(capacity.value) >= 30){
    vcapacity.innerHTML="the max capacity should be 30";
    isvalid=false;
}

}
if(platenumber.value === ''){
    vplate.innerHTML="Please enter the platenumber";
    isvalid=false;
}
if(input.length > 20){
    vplate.innerHTML="The maximum number should be 20 integer and characters. ";
    isvalid=false;
}
if(Insurance.value === ''){
    vinsurance.innerHTML="Please enter the insurance number";
    isvalid=false;
}
if(input1.length > 20 ){
    vinsurance.innerHTML="The maximum number should be 20 integer";
    isvalid=false;
}
if(Mechanic.value === ''){
    vmechanic.innerHTML="Please enter the mechanic due";
    isvalid=false;
}
if(isvalid){
    return true;
}
return false;
}