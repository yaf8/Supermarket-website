<?php

  $name = $_POST['name'];
  $category = $_POST['category'];
  $subcategory = $_POST['subcategory'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $image_url = $_FILES['image_url'];
  $valid = false;

  if (isset($name) && !empty(trim($name))) 
  if (isset($category) && !empty(trim($category))) 
  if (isset($subcategory) && !empty(trim($subcategory))) 
  if (isset($description) && !empty(trim($description))) 
  if (isset($price) && !empty(trim($price))) 
  if (isset($image_url)) {
      echo "<h1 style='text-align: center; color: green;'> Valid</h1>";
      $valid = true;
  }
  else echo "<h1 style='text-align: center; color: red;'> image is invalid</h1>";
  else echo "<h1 style='text-align: center; color: red;'> price is invalid</h1>";
  else echo "<h1 style='text-align: center; color: red;'> description is invalid</h1>";
  else echo "<h1 style='text-align: center; color: red;'> subcategory is invalid</h1>";
  else echo "<h1 style='text-align: center; color: red;'> category is invalid</h1>";
  else echo "<h1 style='text-align: center; color: red;'> name is invalid</h1>";
      

  if(false){

    $filename = pathinfo($image_url['name'], PATHINFO_FILENAME);
    $extension = pathinfo($image_url['name'], PATHINFO_EXTENSION);

    $image_name = $filename . '.' . $extension;

    echo "Product name : " . $name . "<br />";
    echo "Product category : " . $category . "<br />";
    echo "Product subcategory : " . $subcategory . "<br />";
    echo "Product description : " . $description . "<br />";
    echo "Product price : " . $price . "<br />";
    echo "Product image_url : " . $image_name . "<br />";
  }


  if ($valid){

    
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
    
    $sql = "INSERT INTO product (name, category, subcategory, description, price, image_uri)
    VALUES (''John'', 'Doe', 'john@example.com')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    


  }

  
  

  /*if ($valid){echo "<h1 style='text-align: center; color: green;'> Valid</h1>";
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
  }*/

  /*

  */
  
  
  /*if (isset($_FILES['image_url'])) {
    $file = $_FILES['image_url'];

    // Extract the file name and extension
    $filename = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Echo the file name with extension
    echo "Image Name with Extenion : " . $filename . '.' . $extension;
  }*/
?>
