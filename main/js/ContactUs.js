$(document).ready(function(){
  $('#submit-btn').click(function(event){
    event.preventDefault();

    $('.error').remove();

    let name = $('#fullName').val();
    let email = $('#email').val();
    let phone = $('#phoneNumber').val();
    let message = $('#message').val();

    let isValid = true;

    if (name.trim() === '') {
      isValid = false;
      $('#fullName').after('<h6 class="error text-danger mb-2">Please enter your name</h6>');
    } else if (!isValidName(name)){
      isValid = false;
      $('#fullName').after('<h6 class="error text-danger mb-2">Please enter a valid name</h6>');
    }

    if (email.trim() === '') {
      isValid = false;
      $('#email').after('<h6 class="error text-danger mb-2">Please enter your email</h6>');
    } else if (!isValidEmail(email)) {
      isValid = false;
      $('#email').after('<h6 class="error text-danger mb-2">Please enter a valid email</h6>');
    }

    if (phone.trim() === '') {
      isValid = false;
      $('#phoneNumber').after('<h6 class="error text-danger mb-2">Please enter your phone number</h6>');
    } else if (!isValidPhone(phone)) {
      isValid = false;
      $('#phoneNumber').after('<h6 class="error text-danger mb-2">Please enter a valid phone number</h6>');
    }

    if (message.trim() === '') {
      isValid = false;
      $('#message').after('<h6 class="error text-danger mb-2">Please enter your message</h6>');
    }

    if (isValid) {
      $.ajax({
        url: "../api/contactApi.php",
        type: "POST",
        data: $('#contact').serialize(),
        beforeSend: function(xhr) {
          $('#submit-btn').html('SENDING...');
        },
        success: function(response) {
          if (response) {
            $('#success').html('<h5 class="text-success text-center">Thank you For Contacting Us</h5>');
          } else {
            $('#success').html('<h5 class="text-warning">' + response + '</h5>');
          }

          $('#contact')[0].reset();
        },
        error: function() {
          $('#success').html('<h5 class="text-danger">Error occurs. Please try again later</h5>');
        },
        complete: function() {
          $('#submit-btn').html('Submit');
        }
      });
    }
  });
});

function isValidEmail(email) {
  let emailRegex = /\S+@\S+\.\S+/;
  return emailRegex.test(email);
}

function isValidPhone(phone) {
  let phoneRegex = /^[0-9]{8}$/;
  return phoneRegex.test(phone);
}

function isValidName(name) {
  let nameRegex = /^[a-zA-Z\s]+$/;
  return nameRegex.test(name);
}