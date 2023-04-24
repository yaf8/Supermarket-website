<!--Handle Summit php-->
<?php

$submit = "notnull";

if (isset($_POST['submit']) && $submit != null) {

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

    $name = $_POST['name'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_file = $_FILES['image_url'];
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


    if ($valid) {

        $filename = pathinfo($image_file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($image_file['name'], PATHINFO_EXTENSION);

        $image_name = $filename . '.' . $extension;

        /*echo "Product name : " . $name . "<br />";
        echo "Product category : " . $category . "<br />";
        echo "Product subcategory : " . $subcategory . "<br />";
        echo "Product description : " . $description . "<br />";
        echo "Product price : " . $price . "<br />";
        echo "Product image_url : " . $image_name . "<br />";*/
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap JavaScript -->
    <script src="../styles/bootstrap/js/bootstrap.min.js"></script>
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

    <div class="container fadein mt-3">
        <h1>Add Product</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="" selected disabled>-- Select a category --</option>
                    <option value="foods">Foods</option>
                    <option value="beverages">Beverages</option>
                    <option value="electronics">Electronics</option>
                    <option value="furniture">Furniture</option>
                    <option value="sanitary">Sanitary</option>
                    <option value="Stationary">Stationary</option>
                    <option value="beauty">Beauty</option>
                    <option value="cloth">Cloth</option>

                </select>
            </div>
            <div class="form-group">
                <label for="subcategory">Subcategory:</label>
                <select class="form-control" id="subcategory" name="subcategory" required>
                    <option value="" selected disabled>-- Select a subcategory --</option>
                    <option value="cultural">Cultural</option>
                    <option value="modern">Modern</option>
                    <option value="softdrink">Soft Drink</option>
                    <option value="alcholic">Alcholic</option>
                    <option value="laptop">Phone</option>
                    <option value="home">Home</option>
                    <option value="office">Office</option>
                    <option value="soap">Soap</option>
                    <option value="detergents">Detergents</option>
                    <option value="pen">Pen</option>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="image_url">Image:</label>
                <input type="file" class="form-control-file" id="image_url" name="image_url" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100 mb-3 mt-2">Submit</button>
        </form>

    </div>

</body>

</html>



