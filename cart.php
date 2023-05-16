<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="/images/logo.jpg">
    <link href="styles/fontawesome6/pro/css/all.css" rel="stylesheet" />
    <script src="styles/mdb/js/mdb.min.js"></script>
    <link rel="stylesheet" href="styles/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css" />
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <script src="js/script.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <style>

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

    <!-- cart items -->
    <div class="cart-items mt-5">
        <?php
        // check if the cart is not empty

        function getProductById($productId)
        {
            // make a database connection
            $conn = new mysqli("localhost", "root", "", "super_market");

            // build the query to fetch the product details
            $query = "SELECT * FROM products WHERE id = $productId";

            // execute the query and fetch the result
            $result = $conn->query($query);

            // check if the query returned any rows
            if ($result->num_rows > 0) {
                // create a new Product object and set its properties to the fetched data
                $row = $result->fetch_assoc();

                $product = new Product();
                $product->setId($row['id']);
                $product->setName($row['name']);
                $product->setCategory($row['category']);
                $product->setSubcategory($row['subcategory']);
                $product->setDescription($row['description']);
                $product->setPrice($row['price']);
                $product->setImgUri($row['img_uri']);

                // return the product object
                return $product;
            } else {
                // if no rows were returned, return null
                return null;
            }
        }


        if (!empty($_SESSION['cart'])) {
            // loop through the cart items
            foreach ($_SESSION['cart'] as $productId) {
                // retrieve the product information from the database

                echo "<p class='mt-5 h1'>$productId</p> <br />";




                /*$product = getProductById($productId);

        // display the product information in the cart
        echo '<div class="cart-item">';
        echo '<img src="images/' . $product->getImgUri() . '" alt="' . $product->getName() . '">';
        echo '<div class="cart-item-info">';
        echo '<h6>' . $product->getName() . '</h6>';
        echo '<p class="text-muted">' . $product->getDescription() . '</p>';
        echo '<p class="text-muted">Price: ' . $product->getPrice() . '</p>';
        echo '</div>';
        echo '</div>';*/
            }
        } else {
            // display a message if the cart is empty
            echo '<p>Your cart is empty.</p>';
        }

        //session_unset();
        ?>
    </div>




    <div class="container mt-5">
        <h1>Shopping Cart</h1>
        <hr>
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="media">
                            <img src="https://via.placeholder.com/150" alt="Product Image" class="mr-3">
                            <div class="media-body">
                                <h5 class="mt-0">Product Name</h5>
                                <p>Product description goes here</p>
                            </div>
                        </div>
                    </td>
                    <td>$10.00</td>
                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" value="1">
                        </div>
                    </td>
                    <td>$10.00</td>
                    <td>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <!-- More rows go here -->
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-outline-secondary">Continue Shopping</a>
            </div>
            <div class="col-md-6 text-right">
                <p class="mb-1">Subtotal:</p>
                <h3 class="mb-3">$100.00</h3>
                <a href="#" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</body>

</html>