
// showing Password
const pass_field = document.querySelector('.pass-key');
  const showBtn = document.querySelector('.show');
  showBtn.addEventListener('click', function(){
   if(pass_field.type === "password"){
     pass_field.type = "text";
     document.getElementById("show").classList.add('fa-eye-slash');
   }else{
     pass_field.type = "password";
     document.getElementById("show").classList.remove('fa-eye-slash');
     document.getElementById("show").classList.add('fa-eye');        
   }
  });
// showing Confirm Password
const con_pass_field = document.querySelector('.con_pass-key');
  const con_showBtn = document.querySelector('.con_show');
  con_showBtn.addEventListener('click', function(){
   if(con_pass_field.type === "password"){
     con_pass_field.type = "text";
     document.getElementById("con_show").classList.add('fa-eye-slash');
   }else{
     con_pass_field.type = "password";
     document.getElementById("con_show").classList.remove('fa-eye-slash');
     document.getElementById("con_show").classList.add('fa-eye');        
   }
  });

  

// Password Matching 
$('#password, #confirm_password').on('keyup', function () {
  // Not Match
if ($('#password').val() == $('#confirm_password').val() && $('#password').val() !== "" && $('#confirm_password').val() !== "" ) {
  $('#message').html('Matched').css('color', 'green');
  $("#recoverBtn").removeAttr("disabled");
} 
else if($('#password').val() === "" && $('#confirm_password').val() === "")
{
  $('#message').html('Empty').css('color', 'red');
  $("#recoverBtn").attr("disabled",true);
}
else{
  $('#message').html('Not Matching').css('color', 'red');
  $("#recoverBtn").attr("disabled",true);
}

//Password Strength NOTE: For Future Improvement
if ($('#password').val() == $('#confirm_password').val()) {
  if ($('#password').val().length < 6 && $('#confirm_password').val().length < 6) {
      $('#pass_status').html('Weak').css('color', 'red');
      $("#recoverBtn").attr("disabled",true);
  } 
  else{
      $('#pass_status').html('Good').css('color', 'green');
      $("#recoverBtn").removeAttr("disabled");
  }
}
});