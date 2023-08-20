new WOW().init();

let origin = document.getElementById('origin');
let destination = document.getElementById('destination');
let form = document.querySelector('.form1');
let validateform = document.querySelector('#validateform');
let valid = true;

const IndexSearch = document.querySelector(".IndexSearch");


function SearchInMain() {

  let tripdate = document.getElementById('tripdate').value;
  let triptime = document.getElementById('triptime').value;

  let url ;
  // Construct the URL with the values as query parameters
   url = '/Transportation/main/mainsearch.php?origin=' + encodeURIComponent(origin.value) + '&destination=' + encodeURIComponent(destination.value);
  
   if(tripdate && triptime)
   {
    url+='&tripdate=' + encodeURIComponent(tripdate) + '&triptime=' + encodeURIComponent(triptime);
   }
   else if(tripdate)
   {
    url+='&tripdate=' + encodeURIComponent(tripdate)
   }
   else if(triptime)
   {
    url+='&triptime=' + encodeURIComponent(triptime)
   }
  // Redirect to the other page
  window.location.href = url;
}


IndexSearch.addEventListener('click',(event)=>{
  event.preventDefault();
  if(origin.value == '' || destination.value == '' ){
    validateform.style.border='3px solid red';
    valid = false;
  }
  else{
    SearchInMain();
    validateform.style.border='';
    
  }
  

});


function toggleLocation(event){

  event.preventDefault();

  let swtich= origin.value;
  origin.value=destination.value;
  destination.value=swtich;
  filterOptions(origin, swtich);
  filterOptions(destination, origin.value);
  }



  
  origin.addEventListener('input', function() {
  let selectedValue = origin.value;
  filterOptions(destination, selectedValue);
});

destination.addEventListener('input', function() {
  let selectedValue = destination.value;
  filterOptions(origin, selectedValue);
});

  function filterOptions(dropdown, selectedValue) {
    // Get all the options within the dropdown
    let options = dropdown.options;
  
    for (let i = 0; i < options.length; i++) {
      let option = options[i];
  
      // Check if the option's value matches the selected value
      if (option.value === selectedValue) {
        option.style.display = 'none'; // Hide the option
      } else {
        option.style.display = 'block'; // Show the option
      }
    }
  }
  