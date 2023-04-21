// Get the form element
const form = document.querySelector("#form");

// Get the input elements
const nameInput = document.querySelector("#nameInput");
const emailInput = document.querySelector("#emailInput");
const passwordInput = document.querySelector("#passwordInput");
const genderInputs = document.querySelectorAll('input[name="gender"]');
const subcitySelect = document.querySelector("#subcitySelect");

// Add event listener to the form submit event
form.addEventListener("submit", (event) => {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Validate the name input
  if (nameInput.value.trim() === "") {
    showError(nameInput, "Name is required");
  } else {
    showSuccess(nameInput);
  }

  // Validate the email input
  if (emailInput.value.trim() === "") {
    showError(emailInput, "Email is required");
  } else if (!isValidEmail(emailInput.value.trim())) {
    showError(emailInput, "Email is invalid");
  } else {
    showSuccess(emailInput);
  }

  // Validate the password input
  if (passwordInput.value.trim() === "") {
    showError(passwordInput, "Password is required");
  } else {
    showSuccess(passwordInput);
  }

  // Validate the gender input
  let genderSelected = false;
  genderInputs.forEach((input) => {
    if (input.checked) {
      genderSelected = true;
    }
  });
  if (!genderSelected) {
    showError(genderInputs[0], "Please select a gender");
  } else {
    showSuccess(genderInputs[0]);
  }

  // Validate the subcity select
  if (subcitySelect.value === "") {
    showError(subcitySelect, "Please select a subcity");
  } else {
    showSuccess(subcitySelect);
  }

  // If all inputs are valid, submit the form
  if (isFormValid()) {
    form.submit();
  }
});

// Function to show error message
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.classList.remove("success");
  formControl.classList.add("error");
  const errorMessage = formControl.querySelector(".error-message");
  errorMessage.textContent = message;
}

// Function to show success message
function showSuccess(input) {
  const formControl = input.parentElement;
  formControl.classList.remove("error");
  formControl.classList.add("success");
  const errorMessage = formControl.querySelector(".error-message");
  errorMessage.textContent = "";
}

// Function to check if form is valid
function isFormValid() {
  let valid = true;
  form.querySelectorAll(".form-control").forEach((input) => {
    if (!input.parentElement.classList.contains("success")) {
      valid = false;
    }
  });
  return valid;
}

// Function to validate email
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function submitForm() {
  if (validateForm()) {
    // form is valid, submit it
    alert("Form submitted successfully!");
  } else {
    // form is invalid, display error message
    const errorElement = document.createElement("div");
    errorElement.classList.add("error-message");
    errorElement.innerText = "Please fill out all required fields.";
    form.appendChild(errorElement);
  }
}

form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Check if the form is valid
  if (!form.checkValidity()) {
    form.classList.add('form-invalid');
  } else {
    form.classList.remove('form-invalid');
    // Submit the form
    form.submit();
  }
});

