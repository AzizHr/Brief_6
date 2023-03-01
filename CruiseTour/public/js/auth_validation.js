var email = document.getElementById("email");
var password = document.getElementById("password");
var email_error = document.getElementById("email_error");
var password_error = document.getElementById("password_error");
var form = document.getElementById("login");

let validEmail =
  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (
    validateEmail(email, email_error) &
    validatePassword(password, password_error)
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
