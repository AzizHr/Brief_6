var first_name = document.getElementById("first_name");
var last_name = document.getElementById("last_name");
var email = document.getElementById("email");
var password = document.getElementById("password");
var first_name_error = document.getElementById("first_name_error");
var last_name_error = document.getElementById("last_name_error");
var email_error = document.getElementById("email_error");
var password_error = document.getElementById("password_error");
var form = document.getElementById("register");

let valideName = /[^0-9]/;
let validEmail =
  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (
    validateEmail(email, email_error) &
    validatePassword(password, password_error) &
    validateFirstName(first_name, first_name_error) &
    validateLastName(last_name, last_name_error)
  ) {
    form.submit();
  }
});

function validateEmail(email, email_error) {
  if (email.value.trim() === "") {
    email_error.innerHTML = "Email can't be empty";
    email_error.style.color = "red";
    email_error.style.fontSize = "13px";
    email.classList.add("error");
    email.classList.remove("success");
    return false;
  } else if (validEmail.test(email.value) == false) {
    email_error.innerHTML = "Please enter a valid email adress";
    email_error.style.color = "red";
    email_error.style.fontSize = "13px";
    email.classList.add("error");
    email.classList.remove("success");
    return false;
  } else {
    email_error.innerHTML = "";
    email.classList.add("success");
    email.classList.remove("error");
    return true;
  }
}

function validatePassword(password, password_error) {
  if (password.value.trim() === "") {
    password_error.innerHTML = "Password can't be empty";
    password_error.style.color = "red";
    password_error.style.fontSize = "13px";
    password.classList.add("error");
    password.classList.remove("success");
    return false;
  } else if (password.value.trim().length > 15) {
    password_error.innerHTML = "Password max caracters is 15";
    password_error.style.color = "red";
    password_error.style.fontSize = "13px";
    password.classList.add("error");
    password.classList.remove("success");
    return false;
  } else {
    password_error.innerHTML = "";
    password.classList.add("success");
    password.classList.remove("error");
    return true;
  }
}

function validateFirstName(first_name, first_name_error) {
  if (first_name.value.trim() === "") {
    first_name_error.innerHTML = "Name can't be empty";
    first_name_error.style.color = "red";
    first_name_error.style.fontSize = "13px";
    first_name.classList.add("error");
    first_name.classList.remove("success");
    return false;
  } else if (valideName.test(first_name.value) == false) {
    first_name_error.innerHTML = "Please enter a valid name";
    first_name_error.style.color = "red";
    first_name_error.style.fontSize = "13px";
    first_name.classList.add("error");
    first_name.classList.remove("success");
    return false;
  } else {
    first_name_error.innerHTML = "";
    first_name.classList.add("success");
    first_name.classList.remove("error");
    return true;
  }
}

function validateLastName(last_name, last_name_error) {
  if (last_name.value.trim() === "") {
    last_name_error.innerHTML = "Name can't be empty";
    last_name_error.style.color = "red";
    last_name_error.style.fontSize = "13px";
    last_name.classList.add("error");
    last_name.classList.remove("success");
    return false;
  } else if (valideName.test(last_name.value) == false) {
    last_name_error.innerHTML = "Please enter a valid name";
    last_name_error.style.color = "red";
    last_name_error.style.fontSize = "13px";
    last_name.classList.add("error");
    last_name.classList.remove("success");
    return false;
  } else {
    last_name_error.innerHTML = "";
    last_name.classList.add("success");
    last_name.classList.remove("error");
    return true;
  }
}
