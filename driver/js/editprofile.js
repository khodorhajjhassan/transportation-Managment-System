function validation(event) {
    event.preventDefault();
  
    let password = document.getElementById("password");
    let cpassword = document.getElementById("cpassword");
    let vpassword = document.getElementById("vpassword");
    let vcpassword = document.getElementById("vcpassword");
  
    vpassword.innerHTML = "";
    vcpassword.innerHTML = "";
  
    let isValid = true;
    
    
    if (password.value === "") {
      vpassword.innerHTML = "Please Enter a Password";
      isValid = false;
    } else if (!validatePassword(password.value)) {
      vpassword.innerHTML = "Password should be at least 8 characters long and contain at least one digit, one lowercase letter, and one uppercase letter";
      isValid = false;
    }
    if (cpassword.value === "") {
      vcpassword.innerHTML = "Please Confirm Your Password";
      isValid = false;
    } else if (cpassword.value !== password.value) {
      vcpassword.innerHTML = "Password does not match";
      isValid = false;
    }
  
    if (isValid) {
      document.getElementById("editform").submit();
    }
  }
  function validatePassword(password) {
    // Password validation criteria
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return passwordRegex.test(password);
  }
  function showpassword (event){
    event.preventDefault();

    let showpass = document.getElementsByClassName('fa-eye');
    let password = document.getElementById("password");
    let icon = document.querySelector("i");
    let cpassword = document.getElementById("cpassword");

    if (password.type==="password"){
        password.type='text';
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
    else {
        password.type='password';
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }


  }
  function showcpassword (event){
    event.preventDefault();

    let icon2 = document.querySelector(".confirmpass");
    let cpassword = document.getElementById("cpassword");

    if (cpassword.type==="password"){
        cpassword.type='text';
        icon2.classList.remove("fa-eye");
        icon2.classList.add("fa-eye-slash");
    }
    else {
        cpassword.type='password';
        icon2.classList.remove("fa-eye-slash");
        icon2.classList.add("fa-eye");
    }


  }
