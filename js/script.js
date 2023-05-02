const passwordInput = document.querySelector("#password");
const repeatpasswordInput = document.querySelector("#repeat_password");

const eye = document.querySelector("#eye");
const reapeatEye = document.querySelector("#repeat-eye");

eye.addEventListener("click", function () {
  this.classList.toggle("fa-eye-slash");
  const type =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
});
reapeatEye.addEventListener("click", function () {
  this.classList.toggle("fa-eye-slash");
  const type =
    repeatpasswordInput.getAttribute("type") === "repeat_password"
      ? "text"
      : "repeat_password";
  repeatpasswordInput.setAttribute("type", type);
});


function getImagePreview(event)
{
  document.getElementById("uploadSub").style.display = "block";

  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="100";
  imagediv.appendChild(newimg);
}

const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const repeatPassword = document.getElementById("repeat_password");
const errorElement = document.getElementById("firstname-error");
const errorLastname = document.getElementById("lastname-error");

const form = document.getElementById("signup");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  validateFirstname();
});

firstname.addEventListener("blur", (e) => {
  validateFirstname();
});

 function validateFirstname(){
  let msg = [];
  if (firstname.value === "" || firstname.value === null) {
    msg.push("Firstname is required and can`t be ");
  }
  if (msg.length > 0) {
    errorElement.innerText = 'Firstname is required and can`t be js';
  }

}

/* 
  $(document).ready(function(){
 $('#email').bind('change', function() {
 
($('#email').val(), function(exists) {
      if (exists)
          $('#email-error').text('Email exists').show();
  });
});
})
 */


/*  $(document).ready(function(){

  $('#email').blur(function(){
    var email = $(this).val();
    if(email == ""){
      $("#email-error").fadeOut();
  
      }else{
        $.ajax({
          url:"../actions/checkEmail.php",
          method: "GET",
          data:{
            email:email
          },
          success: function(data){
            $("#email-error").fadeIn().html(data);
          }
        });
      }
  });
})    
 */

function checkEmail(email){
  $.ajax({
   method:"POST",
   url: "../actions/checkEmail.php",
   data:{email:email},
   success: function(data){
     $('#email-error').html(data);
   }
   
 });
} 
