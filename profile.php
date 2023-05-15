<?php

if (!isset($_COOKIE['email'])) {
    header('Location: profile.php');
    return;
} else {
    $loginEmail = $_COOKIE['email'];
}

if (isset($_GET['action']) && $_GET['action'] === 'signout') {
    // Unset email cookie
    setcookie('email', '', time() - 3600, '/');

    // Redirect to index page
    header('Location: ./');
    exit();
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
    <title>Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-card {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .profile-header {
            background-color: #007bff;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 50px;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 0;
        }

        .profile-info {
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-info h3 {
            font-size: 1.5rem;
            margin-top: 0;
        }

        .profile-info p {
            font-size: 1.2rem;
            color: #6c757d;
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
            <div>
                <a href="profile.php?action=signout"><button class="btn btn-danger position-relative" style="margin-top: 20px; float: right;">
                        <i class="fa-regular fa-right-from-bracket"> <strong> Signout </strong></i>
                    </button></a>
            </div>
        </nav>
    </header>


    <div class="profile-card">

        <?php

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

        $sql = "SELECT * FROM customer WHERE email='$loginEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();

            $first_name = $row['firstName'];
            $last_name = $row['lastName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            $city = $row['city'];
            $subcity = $row['subcity'];
            $woreda = $row['woreda'];
            $house_no = $row['house_no'];
            $payment_method = $row['payment_method'];

        } else {
            header('Location: ./');
        }

        echo "
        
        <div class='profile-header'>
            <div class='profile-avatar'>
                <img src='https://via.placeholder.com/150' alt='Avatar'>
            </div>
            <h1 class='profile-name'>$first_name  $last_name</h1>
        </div>
            
        <div class='profile-info'>
            <h3>Personal Information</h3>
            <p><strong>Email:</strong> $email </p>
            <p><strong>Phone:</strong> $phone </p>
            <p><strong>Gender:</strong> $gender</p>
            <h3>Address</h3>
            <p><strong>City:</strong> $city</p>
            <p><strong>Subcity:</strong> $subcity </p>
            <p><strong>Wereda:</strong> $woreda</p>
            <p><strong>House Number:</strong> $house_no </p>
            <h3>Payment Method</h3>
            <p><strong>Type:</strong> $payment_method</p>
        </div>
            
            
            
            ";
            return;
        $conn->close();
        ?>

        <div class="profile-info">
            <h3>Personal Information</h3>
            <p><strong>Email:</strong> yafet@example.com</p>
            <p><strong>Phone:</strong> +251 911 22 33 44</p>
            <p><strong>Gender:</strong> Male</p>
            <h3>Address</h3>
            <p><strong>City:</strong> Addis Ababa</p>
            <p><strong>Subcity:</strong> Bole </p>
            <p><strong>Wereda:</strong> 123</p>
            <p><strong>House Number:</strong> new </p>
            <h3>Payment Method</h3>
            <p><strong>Type:</strong> Credit Card</p>
        </div>
    </div>
</body>

</html>