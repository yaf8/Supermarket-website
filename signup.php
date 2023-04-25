<!--Handle Summit php-->
<?php

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

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    //$gender = $_POST['gender'];
    $city = $_POST['city'];
    $subcity = $_POST['subcity'];
    $wereda = $_POST['wereda'];
    $kebele = $_POST['kebele'];
    $house_number = $_POST['house_number'];
    $payment = $_POST['payment'];
    $valid = false;

    if (isset($name) && !empty(trim($name)))
        if (isset($category) && !empty(trim($category)))
            if (isset($subcategory) && !empty(trim($subcategory)))
                if (isset($description) && !empty(trim($description)))
                    if (isset($price) && !empty(trim($price)))
                        if (isset($image_file)) {
                            //alert_success("valid");
                            $valid = true;
                        } else alert_danger("image invalid");
                    else alert_danger("price invalid");
                else alert_danger("decritpion invalid");
            else alert_danger("subcategory invalid");
        else alert_danger("category invlid");
    else alert_danger("name invalid");


    if (true) {

        $filename = pathinfo($image_file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($image_file['name'], PATHINFO_EXTENSION);

        $image_name = $filename . '.' . $extension;

        echo "User full name : " . $first_name . " " . $last_name . "<br />";
        echo "User email : " . $email . "<br />";
        echo "User passowrd : " . $password . "<br />";
        echo "User phone : " . $phone . "<br />";
        //echo "User gender : " . $gender . "<br />";
        echo "User city : " . $city . "<br />";
        echo "User subity : " . $subcity . "<br />";
        echo "User wereda : " . $wereda . "<br />";
        echo "User kebele : " . $kebele . "<br />";
        echo "User house number : " . $house_number . "<br />";
        echo "User payment : " . $payment . "<br />";
    }


    if (false) {


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

        $sql = "INSERT INTO product (name, category, subcategory, description, price, img_uri)
    VALUES ('$name', '$category', '$subcategory', '$description', '$price', '$image_name')";

        if ($conn->query($sql) === TRUE) {
            echo alert_success("<strong>$name</strong>" . " inserted successfully");
        } else {
            $error_mess = "Error: " . $sql . "<br>" . $conn->error;
            alert_danger($error_mess);
        }

        $conn->close();
    }

    $submit = null;
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
            class="needs-validation"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data"
          >
            <div class="row mb-3">
              <div class="col">
                <input
                  type="text"
                  class="form-control"
                  name="first_name"
                  placeholder="First name"
                  required
                />
              </div>
              <div class="col">
                <input
                  type="text"
                  class="form-control"
                  name="last_name"
                  placeholder="Last name"
                  required
                />
              </div>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" required/>
            </div>
            <div class="mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                name="password"
                required
              />
            </div>
            <div class="mb-1">
              <input
                type="number"
                class="form-control"
                placeholder="Phone"
                name="phone"
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
                <input type="text" class="form-control" name="wereda" placeholder="Wereda" required/>
              </div>
              <div class="col">
                <input type="text" class="form-control" name="kebele" placeholder="Kebele" required/>
              </div>
              <div class="col">
                <input
                  type="text"
                  class="form-control"
                  placeholder="House No."
                  name="house_number"
                  required
                />
              </div>
            </div>
            <div class="mb-3">
              <label for="paymentSelect" class="form-label"
                >Payment method</label
              >
              <select class="form-select" id="paymentSelect" name="payment" required>
                <option selected disabled value="">Select a payment method</option>
                <option value="visa card">Visa card</option>
                <option value="master cart">Master card</option>
                <option value="telebirr">Telebirr</option>
                <option value="cbe birr">CBE Birr</option>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100 mt-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
