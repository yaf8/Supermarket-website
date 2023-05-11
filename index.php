<?php
require_once 'models/Product.php';
require_once 'database/database.php';
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
    .dropdown-item:hover {
      color: black;
      background-color: #333;
    }

    .nav-item:hover {
      color: whitesmoke;
    }

    a {
      display: block;
      color: #f3feff;
      text-align: center;
      padding: 15px;
      text-decoration: none;
      font-size: 14px;
      font-weight: bold;
    }

    a .dropdown-item .dropdown-item {
      padding: 5px;
    }
  </style>
</head>

<body class="bg-light" translate="transition">


  <header class="header">
    <nav class="navbar navbar-expand-sm">
      <div class="container-fluid">
        <a href="#" class="navbar-brand">
          <img src="images/logo.jpg" alt="Logo" style="width: 60px; height: 60px; margin-top: 40%;" class="rounded-circle float-start" />
        </a>
        <div style="display: flex; flex-direction: row; width: 100%; margin: auto; float: right">
          <input type="search" name="searchInput" placeholder="Search" id="search_input" class="form-control" style="width: 100%;">
          <button class="btn btn-primary" type="submit" style="margin-top: 20px; float: left;">
            <i class="fa-solid fa-search"></i>
          </button>
          </input>
        </div>
        <a href="signup.php">

          <button class="btn btn-dark position-relative" style=" margin-left: 10px; margin-right: 10px;  margin-top: 20px; float: right;">
            <i class="fa-user fa-solid"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle invisible">
              <span class="visually-hidden"></span>
            </span>
          </button>
        </a>
        <div>
          <button class="btn btn-dark position-relative" style="margin-top: 20px; float: right;">
            <i class="fa-shopping-cart fa-solid mr-auto"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger" id="badge"></span>
          </button>
        </div>
  </header>
  <nav class="bg-opacity-50">
    <ul class="nav nav-tabs flex-row">
      <li class="nav-item"><a href="#" class="">Home</a></li>
      <li class="navig nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Foods</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <a href="">
              <li class="dropdown-item">Cultural</li>
            </a>
            <a href="category/food-modern.php">
              <li class="dropdown-item">Modern</li>
            </a>
          </ul>
        </div>
      </li>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Beverages</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Soft drink</li>
            <li class="dropdown-item">Alcholic</li>
          </ul>
        </div>
      </li>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Electronic</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Laptop</li>
            <li class="dropdown-item">Cellphone</li>
            <li class="dropdown-item">Watch</li>
          </ul>
        </div>
      </li>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Furniture</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Sofa</li>
            <li class="dropdown-item">Table</li>
          </ul>
        </div>
      </li>
      </li>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Sanitary</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Soap</li>
            <li class="dropdown-item">Detergent</li>
          </ul>
        </div>
      </li>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Stationary</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Pen</li>
            <li class="dropdown-item">Pencil</li>
          </ul>
        </div>
      </li>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Beauty</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Men</li>
            <li class="dropdown-item">Women</li>
          </ul>
        </div>
      <li class="nav-item" data-bs-toggle="dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            Cloth</a>
          <ul type=" none" class="dropdown-menu btn-group-sm">
            <li class="dropdown-item">Cultural</li>
            <li class="dropdown-item">Modern</li>
          </ul>
        </div>
      </li>


      <li class="nav-item"><a href="#">Contact us</a></li>
      <li class="nav-item"><a href="#">About us</a></li>
    </ul>
  </nav>

  <!-- Carousel wrapper -->
  <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="3" aria-label="Slide 4"></button>
    </div>

    <!-- Inner -->
    <div class="carousel-inner " style="height: 20%; max-width: 70%; margin: auto; margin-top: 20px;">
      <!-- Single item -->
      <div class="carousel-item active">
        <img src="images/foodsCrop.jpg" class="d-block w-100" alt="Sunset Over the City" />
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item ">
        <img src="images/vegetablesCrop.jpg" class="d-block w-100" alt="Sunset Over the City" />
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <img src="images/cosmetics-collection-4-crop.jpg" class="d-block w-100" alt="Cliff Above a Stormy Sea" />
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <!-- Inner -->

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Carousel wrapper -->


  <div class=" justify-content-center container-fluid mt-4" style="width: 90%">

    <h3 class="fw-bold w-100">
      Top product <i class="fa-solid fa-solid fa-arrow-right pl-4 pr-2"></i>
    </h3>
    <div class="row">
      <div class="col-16">
        <div class="card-group">
          <div class="card-scroll">



            <!--experment test-->
            <div class="card hover-shadow hover-zoom">
              <img src="images/vegetables2.jpg" class="card-img hover-overlay" alt="Product Image">
              <div class="card-body">
                <h5 class="card-title">Vegitables</h5>
                <p class="card-text">This is the description of the product.</p>
                <div class="d-flex align-items-center justify-content-between">
                  <p class="card-subtitle"><span class="fw-bold">ETB</span> <span class="h5 fw-bold">10.99</span></p>
                  <button class="btn btn-outline-info btn-floating ripple ripple-surface-light"><i class="fa-solid fa-cart-plus m-2"></i></button>
                </div>
              </div>
            </div>



            <?php


            // prepare a statement to select all products
            $stmt = $conn->prepare('SELECT * FROM product LIMIT 10');

            // execute the statement and fetch all results into an array
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



            // loop through the results and output the names
            foreach ($results as $result) {


              $product = new Product();
              $product->setId($result['id']);
              $product->setName($result['name']);
              $product->setCategory($result['category']);
              $product->setSubcategory($result['subcategory']);
              $product->setDescription($result['description']);
              $product->setPrice($result['price']);
              $product->setImgUri($result['img_uri']);

              $card =  "
              <div class='card hover-shadow hover-zoom'>
              <img src='images/" . $product->getImgUri() . "' class='card-img hover-overlay' alt='Product Image'>
              <div class='card-body'>
                <h5 class='card-title'>" . $product->getName() . "</h5>
                <p class='card-text'>" . $product->getDescription() . "</p>
                <div class='d-flex align-items-center justify-content-between'>
                  <p class='card-subtitle'><span class='fw-bold'>ETB</span> <span class='h5 fw-bold'>" . $product->getPrice() . "</span></p>
                  <i class='btn btn-outline-success hover-shadow'><i class='fa-solid fa-cart-plus'></i></i>
                </div>
              </div>
            </div>
            ";
              echo $card;
            }

            // close the connection
            $pdo = null;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <div class="d-flex flex-column flex-lg-row justify-content-between">
      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Family Supermarket
              </h6>
              <p>
                Here you can use rows and columns to organize your footer content. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> Addis Ababa, Gerji Unity university</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 251 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 251 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Section: Social media -->
      <section class="p-4 border-top mt-auto">
        <div class="d-flex justify-content-center justify-content-lg-end">
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </section>
      <!-- Section: Social media -->
    </div>

    <!-- Footer -->
    <div class="d-flex justify-content-between align-items-center p-1" style="background-color: rgba(0, 0, 0, 0.05);">
      <div style="margin-left: 30px;">&copy; All rights reserved.</div>
      <div> 2023 Family Supermarket</div>
      <div style="margin-right: 30px;"><a href="#" style="color: darkslategrey;">Terms and Conditions</a></div>
    </div>
    <!-- Footer -->
  </footer>
  <!-- Footer -->

</body>

</html>