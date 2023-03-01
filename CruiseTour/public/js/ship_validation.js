const ship_attributes = new Array(
  getId("ship_name"),
  getId("number_of_rooms"),
  getId("number_of_places")
);
const ship_attributes_errors = new Array(
  getId("ship_name_error"),
  getId("number_of_rooms_error"),
  getId("number_of_places_error")
);

const ship_form = document.getElementById("ship_form");

ship_form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (validateShip(ship_attributes, ship_attributes_errors)) {
    ship_form.submit();
  }
});

function validateShip(ship_attributes, ship_attributes_errors) {
  let submit = true;
  for (let i = 0; i < ship_attributes.length; i++) {
    if (isEmpty(ship_attributes[i])) {
      ship_attributes_errors[i].innerHTML = "This Field can't be empty";
      ship_attributes_errors[i].style.color = "red";
      ship_attributes_errors[i].style.fontSize = "13px";
      ship_attributes[i].classList.add("error");
      ship_attributes[i].classList.remove("success");
      submit = false;
    } else {
      ship_attributes_errors[i].innerHTML = "";
      ship_attributes[i].classList.add("success");
      ship_attributes[i].classList.remove("error");
    }
  }
  if (submit) {
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
