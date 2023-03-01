const cruise_attributes = new Array(
  getId("title"),
  getId("cruise_price"),
  getId("number_of_nights"),
  getId("itinerary"),
  getId("starts_at")
);
const cruise_attributes_errors = new Array(
  getId("title_error"),
  getId("cruise_price_error"),
  getId("number_of_nights_error"),
  getId("itinerary_error"),
  getId("starts_at_error")
);

const valideNumber = /[0-9]/;
const price =  getId("cruise_price");
const price_error =  getId("cruise_price_error");
const cruise_form = document.getElementById("cruise_form");

cruise_form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (validateCruise(cruise_attributes, cruise_attributes_errors) & validatePrice(price , price_error)) {
    cruise_form.submit();
  }
});

function validateCruise(cruise_attributes, cruise_attributes_errors) {
  let submit = true;
  for (let i = 0; i < cruise_attributes.length; i++) {
    if (isEmpty(cruise_attributes[i])) {
      cruise_attributes_errors[i].innerHTML = "This Field can't be empty";
      cruise_attributes_errors[i].style.color = "red";
      cruise_attributes_errors[i].style.fontSize = "13px";
      cruise_attributes[i].classList.add("error");
      cruise_attributes[i].classList.remove("success");
      submit = false;
    } else {
      cruise_attributes_errors[i].innerHTML = "";
      cruise_attributes[i].classList.add("success");
      cruise_attributes[i].classList.remove("error");
    }
  }
  if (submit) {
    return true;
  }
}

function validatePrice(price, price_error) {
  if (price.value.trim() === "") {
    price_error.innerHTML = "Price can't be empty";
    price_error.style.color = "red";
    price_error.style.fontSize = "13px";
    price.classList.add("error");
    price.classList.remove("success");
    return false;
  } else if (parseInt(price.value.trim()) <= 0) {
    price_error.innerHTML = "Price must be at least 1";
    price_error.style.color = "red";
    price_error.style.fontSize = "13px";
    price.classList.add("error");
    price.classList.remove("success");
    return false;
  } else if (valideNumber.test(price.value) == false) {
    price_error.innerHTML = "Price must be only numbers";
    price_error.style.color = "red";
    price_error.style.fontSize = "13px";
    price.classList.add("error");
    price.classList.remove("success");
    return false;
  } else {
    price_error.innerHTML = "";
    price.classList.add("success");
    price.classList.remove("error");
    return true;
  }
}

function getId(targetId) {
  return document.getElementById(targetId);
}

function isEmpty(target) {
  if (target.value.trim() === "") {
    return true;
  } else {
    return false;
  }
}
