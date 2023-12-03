// function validateLoginForm() {
//     let x = document.forms["login_form"]["email"].value;
//     let y = document.forms["login_form"]["pswd"].value

//     if (x == "" && y == "") {
//         alert("Pease fill out the fields.")
//         return false;
//     } else if (x == "") {
//         alert("Please fill out the email field.");
//         return false;
//     } else if (y == ""){
//         alert("Please fill out the password field");
//         return false;
//     }
// }

let count = 0;

$('#login_form').on('submit', function (e) {
  e.preventDefault();
  var email = $('#email').val();
  var pswd = $('#pswd').val();

  // Check if the form validation
  if (email == "" && pswd == "") {
    alert("Please fill out the fields.");
    return false;
  } else if (email == "") {
    alert("Please fill out the email field.");
    return false;
  } else if (pswd == "") {
    alert("Please fill out the password field");
    return false;
  }

  $(this)[0].submit();
});

// Remove the document ready check as it is not needed in this context
