function validatestation(){
    let stationname=document.getElementById('stationname');
    let provincename=document.getElementById('provincename');
    let capacity=document.getElementById('capacity');
    let vstationname=document.getElementById('vstationname');
    let vprovincename=document.getElementById('vprovincename');
    let vcapacity=document.getElementById('vcapacity');
    vstationname.innerHTML='';
    vprovincename.innerHTML='';
    vcapacity.innerHTML='';
    let isvalid=true;
    if (stationname.value === '') {
        vstationname.innerHTML="Please enter the station name.*";
        isvalid=false;
    }
    if (provincename.value === '') {
        vprovincename.innerHTML="Please enter the province name.*";
        isvalid=false;
    }
    if((capacity.value) ==""  || parseInt(capacity.value) > 20){
    
        if(capacity.value ==""){
        vcapacity.innerHTML="Please enter the capacity";
        isvalid=false;
        }
    else if(parseInt(capacity.value) >= 20){
        vcapacity.innerHTML="the max capacity should be 20";
        isvalid=false;
    }
    }
    if(isvalid){
        return true;
    }
    else
    return false;
  
    
    }