const form = document.querySelector('form');
const startDate = document.querySelector('#startDate');
const endDate = document.querySelector('#endDate');
 const reason = document.querySelector('#reason');

 const errorMessage = document.createElement('span');
  errorMessage.classList.add('error-message');
 errorMessage.style.color ='red';
 errorMessage.style.fontSize = '13px';

  function validationForm(event){
 event.preventDefault();


const existingErrorMessages = form.querySelectorAll('.error-message');
existingErrorMessages.forEach((errorMsg) => {
errorMsg.remove();
 });

 let isValid = true;

if (startDate.value === '') {
isValid = false;
const error = errorMessage.cloneNode(true);
error.textContent = '* Please enter the Start Date.';
startDate.parentNode.insertBefore(error, startDate);
 startDate.style.border = '1px solid red';
 } else{
  startDate.style.border = '1px solid initial';
 }


 if (endDate.value === '') {
isValid = false;
const error = errorMessage.cloneNode(true);
error.textContent = '* Please enter the End Date.';
endDate.parentNode.insertBefore(error, endDate);
endDate.style.border = '1px solid red';
} else{
  endDate.style.border = '1px solid initial';
 }


if (reason.value === '') {
isValid = false;
const error = errorMessage.cloneNode(true);
error.textContent = '* Please enter the Reason for Day Off.';
reason.parentNode.insertBefore(error, reason);
reason.style.border = '1px solid red';
} else{
  reason.style.border = '1px solid initial';
 }


if (isValid) {
form.submit();
}
}

form.addEventListener('submit',validationForm);
