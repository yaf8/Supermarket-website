<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "image_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the image data from the form
    $name = $_POST['name'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_type = $_FILES['image']['type'];

    // Insert the image data into the database
    $sql = "INSERT INTO images (name, image) VALUES ('$name', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading image: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image to MySQL Database</title>
</head>
<body>
    <h1>Upload Image to MySQL Database</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br><br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image"><br><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>
</html>
