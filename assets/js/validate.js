let registerFormData = {
  name: false,
  email: false,
  password: false,
  rePassword: false
};

const validateForm = () => {
  return true;
};

const showErrorMessage = msg => {
  document.getElementById("errorContainerIdForCheck").style.display = "block";
  span = document.getElementsByClassName(
    "errorMessageForCheck"
  )[0].innerHTML = msg;
};
const validateSignupForm = () => {
  const name = document.getElementById("userName");
  const email = document.getElementById("userEmail");
  const password = document.getElementById("userPassword");
  const rePassword = document.getElementById("userRePassword");

  if (name.value.length >= 5) {
    if (password.value === rePassword.value) {
      return true;
    } else {
      showErrorMessage("Passwords are not matching");
    }
  } else {
    showErrorMessage("Name must be at least 5 char");
  }

  return false;
};

const checkInput = event => {
  // check if value is by email type
  const re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim;
  const id = event.target.id;
  const type = event.target.type;
  const value = event.target.value;
  const name = event.target.name;
  const element = document.getElementById(id);
  const label = element.labels[0];
  const passwordMatch = false;
  var errorColor;

  if (type == "email") {
    if (value.length >= 5 && re.test(value) === true) {
      errorColor = "green";
    } else {
      errorColor = "red";
    }
  } else {
    errorColor = value.length >= 5 ? "green" : "red";
  }

  if (type === "password") {
    if (id === "userPassword") {
      const rePass = document.getElementById("userRePassword");
      errorColor =
        value.length >= 5
          ? value === rePass.value
            ? "green"
            : "rgb(170, 196, 5)"
          : "red";
      if (value === rePass.value) {
        rePass.labels[0].style.color = "green";
        rePass.style.outlineColor = "green";
        registerFormData["rePassword"] = true;
      }
    } else if (id === "userRePassword") {
      const pass = document.getElementById("userPassword");
      console.log("in repass:", value === pass.value);
      errorColor =
        value.length >= 5
          ? value === pass.value
            ? "green"
            : "rgb(170, 196, 5)"
          : "red";
      if (value === pass.value) {
        pass.labels[0].style.color = "green";
        pass.style.outlineColor = "green";
        registerFormData["password"] = true;
      }
    }
  }

  label.style.color = errorColor;
  element.style.outlineColor = errorColor;

  registerFormData[name] = errorColor === "green" ? true : false;
};

document.getElementById("closeErrorMessage") &&
  document.getElementById("closeErrorMessage").addEventListener("click", () => {
    document.getElementById("errorContainerId").style.display = "none";
  });

document.getElementById("closeSuccessMessage") &&
  document
    .getElementById("closeSuccessMessage")
    .addEventListener("click", () => {
      document.getElementById("successContainerId").style.display = "none";
    });
document.getElementById("closeErrorMessageForCheck") &&
  document
    .getElementById("closeErrorMessageForCheck")
    .addEventListener("click", () => {
      document.getElementById("errorContainerIdForCheck").style.display =
        "none";
    });
