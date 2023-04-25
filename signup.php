<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/x-icon" href="/images/logo.jpg" />
    <link href="styles/fontawesome6/pro/css/all.css" rel="stylesheet" />
    <script src="styles/mdb/js/mdb.min.js"></script>
    <link rel="stylesheet" href="styles/mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css" />
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/styles.css" />
    <script src="js/script.js"></script>
    <script src="validForm.js"></script>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <style>
      form {
        max-width: 100%;
        margin: auto;
        animation: fadein 0.5s ease-in-out;
      }

      .form-invalid {
        border: 2px solid red;
      }

      @keyframes fadein {
        from {
          opacity: .1;
        }

        to {
          opacity: 1;
        }
      }

      .fadein {
        animation-name: fadein;
        animation-duration: 1s;
        animation-fill-mode: forwards;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"],
      select {
        transition: border-color 0.2s ease-in-out;
      }

      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="password"]:focus,
      select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }

      .form-label {
        margin-top: 1rem;
      }

      /* Style for form inputs and labels */
      .form-control:focus {
        border-color: #17a2b8;
        box-shadow: none;
      }

      .form-select:focus {
        border-color: #17a2b8;
        box-shadow: none;
      }

      .form-label {
        font-weight: bold;
      }

      /* Style for form button */
      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.2s ease-in-out,
          border-color 0.2s ease-in-out;
      }

      .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
      }

      /* Style for form header */
      .h1 {
        color: #17a2b8;
        font-weight: bold;
      }

      @media (min-width: 992px) {
        .container {
          max-width: 60%;
        }
      }

      select option:hover {
        color: black;
      }
    </style>
  </head>

  <body>
    <header class="header">
      <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container-fluid">
          <a href="index.php" class="navbar-brand">
            <img
              src="images/logo.jpg"
              alt="Logo"
              style="width: 60px; height: 60px; margin-top: 40%"
              class="rounded-circle float-start"
            />
          </a>
        </div>
      </nav>
    </header>
    <div class="container mb-6 pt-5">
      <p class="h1 justify-content-center mt-5 w-100 text-center">
        Create Account
      </p>
      <div class="row justify-content-center">
        <div class="col-10">
          <form
            id="form"
            class="was-validated"
            action="signup.html"
            method="post"
            onsubmit="return validateForm()"
          >
            <div class="row mb-3">
              <div class="col">
                <input
                  type="text"
                  class="form-control"
                  placeholder="First name"
                  required
                />
              </div>
              <div class="col">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Last name"
                  required
                />
              </div>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Email" required/>
            </div>
            <div class="mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                required
              />
            </div>
            <div class="mb-1">
              <input
                type="number"
                class="form-control"
                placeholder="Phone"
                required
              />
            </div>
            <div class="col align-items-center">
              <div class="">
                <label for="genderSelect" class="form-label">Gender</label>
              </div>
              <div class="row ml-3 w-100 text-center">
                <div class="form-check col">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                    value="male"
                    checked
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                </div>
                <div class="form-check col">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault2"
                    value="female"
                  />
                  <label class="form-check-label" for="flexRadioDefault2">
                    Female
                  </label>
                </div>
              </div>
            </div>

            <div class="md-3">
              <label for="citySelect" class="form-label">City</label>
              <select class="form-select" id="citySelect" required>
                <option value="Addis Ababa" selected>Addis Ababa</option>
              </select>
            </div>
            <div class="md-3">
              <label for="subcitySelect" class="form-label">Subcity</label>
              <select class="form-select" id="subcitySelect" required>
                <option value="" selected disabled>Select a subcity</option>
                <option value="Arada">Arada</option>
                <option value="Bole">Bole</option>
                <option value="Gullele">Gullele</option>
                <option value="Kirkos">Kirkos</option>
                <option value="Kolfe Keraniyo">Kolfe Keraniyo</option>
                <option value="Lideta">Lideta</option>
                <option value="Nifas Silk-Lafto">Nifas Silk-Lafto</option>
                <option value="Yeka">Yeka</option>
                <option value="Leki kura">Lemi kura</option>
              </select>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="Wereda" required/>
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Kebele" required/>
              </div>
              <div class="col">
                <input
                  type="text"
                  class="form-control"
                  placeholder="House No."
                  required
                />
              </div>
            </div>
            <div class="mb-3">
              <label for="paymentSelect" class="form-label"
                >Payment method</label
              >
              <select class="form-select" id="paymentSelect" required>
                <option selected disabled value="">Select a payment method</option>
                <option value="visa card">Visa card</option>
                <option value="master cart">Master card</option>
                <option value="telebirr">Telebirr</option>
                <option value="cbe birr">CBE Birr</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
