<?php
  // Form validation code goes here

  // Insert data into the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "supermarket";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else
    echo "connected";

  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO products (product_name, brand_id, category_id, subcategory_id, description, price, image_url, in_stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("siisdsbs", $product_name, $brand_id, $category_id, $subcategory_id, $description, $price, $image_url, $in_stock);

  // Set the values of the parameters and execute the statement
  $product_name = $_POST['product_name'];
  $brand_id = $_POST['brand_id'];
  $category_id = $_POST['category_id'];
  $subcategory_id = $_POST['subcategory_id'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : null;
  $in_stock = isset($_POST['in_stock']) ? 1 : 0;
  //$stmt->execute();

  echo "\n\n\n\n Image Name : ". $image_url . "\n\n\n\n";

        $conn = mysqli_connect("localhost", "root", "", "supermarket");


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "connected";
        }

        $sql = "INSERT INTO products (product_name, brand_id, category_id, subcategory_id, description, price, image_url, in_stock)
VALUES ('$product_name', '$brand_id', '$category_id', '$subcategory_id', '$description', '$price', '$image_url', '$in_stock')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

  // Close the statement and the connection
  $stmt->close();
  $conn->close();
?>
