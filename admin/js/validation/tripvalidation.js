function validateTrip() {
  let startLocation = document.getElementById('startLocation');
  let destinationLocation = document.getElementById('destinationLocation');
  let date = document.getElementById('date');
  let time = document.getElementById('time');
  let busNumber = document.getElementById('busNumber');
  let arrivetime = document.getElementById('arrivetime');
  let ticketprice = document.getElementById('ticketprice');
  let details = document.getElementById('details');
  let vStartLocation = document.getElementById('vStartLocation');
  let vDestinationLocation = document.getElementById('vDestinationLocation');
  let vDate = document.getElementById('vDate');
  let vTime = document.getElementById('vTime');
  let vBusNumber = document.getElementById('vBusNumber');
  let vArriveTime = document.getElementById('vArriveTime');
  let vTicketprice = document.getElementById('vTicketprice');
  let vDetails = document.getElementById('vDetails');
  var selectedDate = new Date(date.value);
  var currentDate = new Date();
  currentDate.setHours(0, 0, 0, 0);
  vStartLocation.innerHTML = '';
  vDestinationLocation.innerHTML = '';
  vDate.innerHTML = '';
  vTime.innerHTML = '';
  vBusNumber.innerHTML = '';
  vArriveTime.innerHTML = '';
  vTicketprice.innerHTML = '';
  vDetails.innerHTML = '';
  let isValid = true;

  if (selectedDate < currentDate) {
    vDate.textContent = 'Error:Selected date is less than the current date.';
  } else {
    vDate.textContent = '';
  }
  if (startLocation.value === 'Start Location') {
    vStartLocation.innerHTML = 'Please select the origin .*';
    isValid = false;
  }

  if (destinationLocation.value === 'Select Location') {
    vDestinationLocation.innerHTML = 'Please select the destination location.*';
    isValid = false;
  } else if (startLocation.value === destinationLocation.value) {
    vDestinationLocation.innerHTML = 'Please select a valid location.*';
    isValid = false;
  }

  if (date.value === '') {
    vDate.innerHTML = 'Please enter the date.*';
    isValid = false;
  }

  if (time.value === '') {
    vTime.innerHTML = 'Please enter the time.*';
    isValid = false;
  }

  if (busNumber.value === 'Bus Number') {
    vBusNumber.innerHTML = 'Please select the bus number.*';
    isValid = false;
  }

  if (arrivetime.value === '') {
    vArriveTime.innerHTML = 'Please select the Arrive Time.*';
    isValid = false;
  }
  if(arrivetime.value < time.value){
    vArriveTime.innerHTML = 'the arrive time should be greater than the start time*';
    isValid = false;
  }
  if (ticketprice.value === '') {
  vTicketprice.innerHTML = 'Please add Ticket Price.*';
    isValid = false;
  }
  if (details.value === '') {
    vDetails.innerHTML = 'Please add details.*';
    isValid = false;
  }

  if (isValid) {
    return true;
  }
  else 
  return false;
}
