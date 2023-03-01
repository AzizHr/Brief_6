const port_attributes = new Array(getId("port_name"), getId("country"));
const port_attributes_errors = new Array(
  getId("port_name_error"),
  getId("country_error")
);

const port_form = document.getElementById("port_form");

port_form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (validatePort(port_attributes, port_attributes_errors)) {
    port_form.submit();
  }
});

function validatePort(port_attributes, port_attributes_errors) {
  let submit = true;
  for (let i = 0; i < port_attributes.length; i++) {
    if (isEmpty(port_attributes[i])) {
      port_attributes_errors[i].innerHTML = "This Field can't be empty";
      port_attributes_errors[i].style.color = "red";
      port_attributes_errors[i].style.fontSize = "13px";
      port_attributes[i].classList.add("error");
      port_attributes[i].classList.remove("success");
      submit = false;
    } else {
      port_attributes_errors[i].innerHTML = "";
      port_attributes[i].classList.add("success");
      port_attributes[i].classList.remove("error");
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
