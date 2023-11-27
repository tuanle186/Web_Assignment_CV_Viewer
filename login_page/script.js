function validateLoginForm() {
    let x = document.forms["login_form"]["email"].value;
    let y = document.forms["login_form"]["pswd"].value

    if (x == "" && y == "") {
        alert("Pease fill out the fields.")
        return false;
    } else if (x == "") {
        alert("Please fill out the email field.");
        return false;
    } else if (y == ""){
        alert("Please fill out the password field");
        return false;
    }
}