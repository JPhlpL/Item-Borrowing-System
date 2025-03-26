// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
window.stepper = new Stepper(document.querySelector('.bs-stepper'),
{
    linear:false,
    animation: true
})
// submitForm();
})
var form = document.querySelector('form');
var validFormFeedback = document.querySelector('#confirmation-part .valid-feedback');
var inValidFormFeedback = document.querySelector('#confirmation-part .invalid-feedback');

form.addEventListener('submit', function(event) {
form.classList.remove('was-validated');
inValidFormFeedback.classList.remove('d-block');
validFormFeedback.classList.remove('d-block');

if (!form.checkValidity()) {
Swal.fire({
  title: 'Error!',
  text: 'Check again your inputs',
  icon: 'error',
  confirmButtonText: 'OK' 
  });
event.preventDefault();
event.stopPropagation();
inValidFormFeedback.classList.add('d-block');
} else {
validFormFeedback.classList.add('d-block');
}
form.classList.add('was-validated');
}, false);

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
  