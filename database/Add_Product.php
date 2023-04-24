<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h1>Add Product</h1>
        <form action="insert_data.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="brand_id">Brand:</label>
                <select class="form-control" id="brand_id" name="brand_id" required>
                    <option value="">-- Select a brand --</option>
                    <option value="1">Samsung</option>
                    <option value="2">iPhone</option>
                    <?php
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "supermarket";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // Get the list of brands from the database
                    $sql = "SELECT brand_id, brand_name FROM brands";
                    $result = $conn->query($sql);
                    // Generate the select options for the brands
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["brand_id"] . '">' . $row["brand_name"] . '</option>';
                    }
                    // Close the database connection
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">-- Select a category --</option>
                    <option value="1">Electronics</option>
                    <?php
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "supermarket";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // Get the list of categories from the database
                    $sql = "SELECT category_id, category_name FROM categories";
                    $result = $conn->query($sql);
                    // Generate the select options for the categories
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] . '</option>';
                    }
                    // Close the database connection
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory_id">Subcategory:</label>
                <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                    <option value="">-- Select a subcategory --</option>
                    <option value="1">Phone</option>
                    <?php
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "supermarket";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch subcategories from the database
                    $sql = "SELECT subcategory_id, subcategory_name FROM subcategories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output each subcategory as an option in the select dropdown
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["subcategory_id"] . "'>" . $row["subcategory_name"] . "</option>";
                        }
                    } else {
                        echo "No subcategories found.";
                    }

                    // Close database connection
                    $conn->close();
                    ?>
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
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image_url" name="image_url" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3 mt-2">Submit</button>
        </form>

    </div>

</body>

</html>