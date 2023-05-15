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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $valid = false;

    if (isset($email) && !empty(trim($email)))
        if (isset($password) && !empty(trim($password))) {
            //alert_success("valid");
            //header("refersh:1 url=register.html");
            $valid = true;
        } else alert_danger("Password invalid");
    else alert_danger("Email invalid");;


    if (false) {

        echo "User email : " . $email . "<br />";
        echo "User passowrd : " . $password . "<br />";
        echo "User passowrd hash : " . hashPassword($password) . "<br />";

        echo "<br /> <br /> Verify password hash : " . password_verify($password, hashPassword($password));
    }
    if ($valid) {
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "super_market";


        // Create connection
        $conn = new mysqli($servername, $username, $pass, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT firstName, lastName, password, email FROM customer WHERE email='$email';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();

            $fName = $row['firstName'];
            $lName = $row['lastName'];
            $readPass = $row['password'];
            $verifyedPassword = password_verify($password, $readPass);

            if ($verifyedPassword) {

                alert_success("<div class='h1 justify-content-center z-index-md-3 w-100 text-center''>Signin Success</div>");
                header("Refresh: 2; URL=./");

                $cookie_name = "email";
                $cookie_value = $email;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
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
    <title>Signin Page</title>
    <style>
        .animation-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            display: none;
        }

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

        label {
            font-weight: bold;
            font-size: 16px;
        }

        .btn {
            background-color: #0D47A1;
            border-color: #0D47A1;
            color: #fff;
            padding: 10px 20px;
            border-radius: 40px;
            font-size: 17px;
            text-align: center;
            margin-top: 50px;
            width: 100%;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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

        .container {
            max-width: 650px;
            position: relative;
            top: 100px;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-sm z-index-1">
            <div class="container-fluid">
                <a href="./" class="navbar-brand">
                    <img src="images/logo.jpg" alt="Logo" style="width: 60px; height: 60px; margin-top: 40%" class="rounded-circle float-start" />
                </a>
            </div>
        </nav>
    </header>

    <div class="container mb-6 pt-5">
        <p class="h1 justify-content-center mt-5 w-100 text-center">
            Sign in
        </p>
        <div class="row justify-content-center mt-6">
            <div class="col-10">
                <form id="form" class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkValidity()">
                    <div class="center-container">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required />
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary hover-shadow w-100 mt-5">Submit</button>
                        <div class="h4 mt-5" style="margin:auto; text-align:center;">
                            <p>Don't have an account? <strong><a href="signup.php" style="padding: 0; margin:0; color:#0062cc;">Sign up</a></strong></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>