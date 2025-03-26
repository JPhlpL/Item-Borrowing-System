

// Password Matching 
$('#password, #confirm_password').on('keyup', function () {
    // Not Match
  if ($('#password').val() == $('#confirm_password').val() && $('#password').val() !== "" && $('#confirm_password').val() !== "" ) {
    $('#message').html('Matched').css('color', 'green');
    $("#changebtn").removeAttr("disabled");
  } 
  else if($('#password').val() === "" && $('#confirm_password').val() === "")
  {
    $('#message').html('Empty').css('color', 'red');
    $("#changebtn").attr("disabled",true);
  }
  else{
    $('#message').html('Not Matching').css('color', 'red');
    $("#changebtn").attr("disabled",true);
  }

//Password Strength NOTE: For Future Improvement
if ($('#password').val() == $('#confirm_password').val()) {
    if ($('#password').val().length < 6 && $('#confirm_password').val().length < 6) {
        $('#pass_status').html('Weak').css('color', 'red');
        $("#changebtn").attr("disabled",true);
    } 
    else{
        $('#pass_status').html('Good').css('color', 'green');
        $("#changebtn").removeAttr("disabled");
    }
  }
});

// Validate Password
function validatePassword() {
    const password = document.querySelector('input[name=password]');
    const confirm_password = document.querySelector('input[name=confirm_password]');
    if (confirm_password.value === password.value) {
      confirm_password.setCustomValidity('');
    } else {
      confirm_password.setCustomValidity('Passwords do not match');
    }
  }

// showing Password
const pass_field = document.querySelector('.pass-key');
const showBtn = document.querySelector('.passwordshow');
    showBtn.addEventListener('click', function(){
    if(pass_field.type === "password"){
        pass_field.type = "text";
        document.getElementById("show-pass").classList.add('fa-eye-slash');
    }else{
        pass_field.type = "password";
        document.getElementById("show-pass").classList.remove('fa-eye-slash');
         document.getElementById("show-pass").classList.add('fa-eye');  
    }
    }); 

// showing Confirm Password
const confirm_pass_field = document.querySelector('.confirm-pass-key');
const confirm_showBtn = document.querySelector('.confirm-passwordshow');
confirm_showBtn.addEventListener('click', function(){
    if(confirm_pass_field.type === "password"){
        confirm_pass_field.type = "text";
        document.getElementById("confirm-showpass").classList.add('fa-eye-slash');
    }else{
        confirm_pass_field.type = "password";
        document.getElementById("confirm-showpass").classList.remove('fa-eye-slash');
        document.getElementById("confirm-showpass").classList.add('fa-eye');  
    }
    }); 