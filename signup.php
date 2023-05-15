<!--Handle Summit php-->
<?php


if (isset($_COOKIE['email'])) {
  $loginEmail = $_COOKIE['email'];
  echo "Cookie named '" . $loginEmail . "' is not set!";
  header('Location: profile.php');
  return;
}

if (isset($_POST['submit'])) {


  function alert_success(string $message)
  {
    $alert = "<div class='alert alert-success text-center'>
             $message
            </div>";
    echo $alert;
  }

  function alert_danger(string $message)
  {
    $alert = "<div class='alert alert-danger'>
             $message
            </div>";
    echo $alert;
  }

  function hashPassword(string $password)
  {
    $pass_hash = password_hash($password, PASSWORD_BCRYPT);
    return $pass_hash;
  }

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $subcity = $_POST['subcity'];
  $wereda = $_POST['wereda'];
  $house_number = $_POST['house_number'];
  $payment = $_POST['payment'];
  $valid = false;

  if (isset($first_name) && !empty(trim($first_name)))
    if (isset($last_name) && !empty(trim($last_name)))
      if (isset($email) && !empty(trim($email)))
        if (isset($password) && !empty(trim($password)))
          if (isset($gender) && !empty(trim($gender)))
            if (isset($city) && !empty(trim($city)))
              if (isset($subcity) && !empty(trim($subcity)))
                if (isset($wereda) && !empty(trim($wereda)))
                  if (isset($house_number) && !empty(trim($house_number)))
                    if (isset($payment) && !empty(trim($payment))) {
                      //alert_success("valid");
                      //header("refersh:1 url=register.html");
                      $valid = true;
                    } else alert_danger("Payment invalid");
                  else alert_danger("House number invalid");
                else alert_danger("Wereda invalid");
              else alert_danger("Subcity invalid");
            else alert_danger("City invalid");
          else alert_danger("Gender invalid");
        else alert_danger("Password invalid");
      else alert_danger("Email invalid");
    else alert_danger("Last name invlid");
  else alert_danger("First name invalid");


  if (false) {

    echo "User full name : " . $first_name . " " . $last_name . "<br />";
    echo "User email : " . $email . "<br />";
    echo "User passowrd : " . $password . "<br />";
    echo "User passowrd hash : " . hashPassword($password) . "<br />";
    echo "User phone : " . $phone . "<br />";
    echo "User gender : " . $gender . "<br />";
    echo "User city : " . $city . "<br />";
    echo "User subity : " . $subcity . "<br />";
    echo "User wereda : " . $wereda . "<br />";
    echo "User house number : " . $house_number . "<br />";
    echo "User payment : " . $payment . "<br />";

    echo "<br /> <br /> Verify password hash : " . password_verify($password, hashPassword($password));
  }
  if ($valid) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "super_market";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $sql = "INSERT INTO customer (firstName, lastName, email, password, phone, gender, city, subcity, woreda, house_no, payment_method)
    VALUES ('$first_name', '$last_name', '$email', '" . hashPassword($password) . "', '$phone' , '$gender', '$city', '$subcity', '$wereda', '$house_number', '$payment')";

    if ($conn->query($sql) === TRUE) {

      $cookie_name = "email";
      $cookie_value = $email;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

      alert_success("<div class='h1 justify-content-center z-index-md-3 w-100 text-center''>Signup Success</div>");
      header("Refresh: 2; URL=./");
    } else {
      $error_mess = "Error: " . $sql . "<br>" . $conn->error;
      alert_danger("<div>Failed to signup</div>");
    }

    $conn->close();
  }
}
?>

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
  <title>Signup Page</title>
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
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <a href="index.php" class="navbar-brand">
          <img src="images/logo.jpg" alt="Logo" style="width: 60px; height: 60px; margin-top: 40%" class="rounded-circle float-start" />
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
        <form id="form" class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkValidity()">
          <div class="row mb-3">
            <div class="col">
              <input type="text" class="form-control" name="first_name" placeholder="First name" required />
            </div>
            <div class="col">
              <input type="text" class="form-control" name="last_name" placeholder="Last name" required />
            </div>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required />
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required />
          </div>
          <div class="mb-1">
            <input type="tel" class="form-control" placeholder="Phone" name="phone" required />
          </div>
          <div class="col align-items-center">
            <div class="">
              <label for="genderSelect" class="form-label">Gender</label>
            </div>
            <div class="row ml-3 w-100 text-center">
              <div class="form-check col">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" checked />
                <label class="form-check-label" for="flexRadioDefault1">
                  Male
                </label>
              </div>
              <div class="form-check col">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" />
                <label class="form-check-label" for="flexRadioDefault2">
                  Female
                </label>
              </div>
            </div>
          </div>

          <div class="md-3">
            <label for="citySelect" class="form-label">City</label>
            <select class="form-select" id="citySelect" name="city" required>
              <option value="Addis Ababa" selected>Addis Ababa</option>
            </select>
          </div>
          <div class="md-3">
            <label for="subcitySelect" class="form-label">Subcity</label>
            <select class="form-select" id="subcitySelect" name="subcity" required>
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
              <input type="text" class="form-control" name="wereda" placeholder="Wereda" required />
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="House No." name="house_number" required />
            </div>
          </div>
          <div class="mb-3">
            <label for="paymentSelect" class="form-label">Payment method</label>
            <select class="form-select" id="paymentSelect" name="payment" required>
              <option selected disabled value="">Select a payment method</option>
              <option value="visa card">Visa card</option>
              <option value="master card">Master card</option>
              <option value="telebirr">Telebirr</option>
              <option value="cbe birr">CBE Birr</option>
            </select>
          </div>
          <button type="submit" name="submit" class="btn btn-primary hover-shadow w-100 mt-2">Submit</button>
          <div class="h3 mt-4" style="margin:auto; text-align:center;">
            <p>Already have an account? <strong><a href="signin.php" style="padding: 0; margin:0; color:#0062cc;">Sing in</a></strong></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>