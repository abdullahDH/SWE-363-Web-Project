<?php
$url = $_SERVER['REQUEST_URI'];
$home = str_contains($url, 'index') ? 'active' : '';
$detail = str_contains($url, 'detail') ? 'active' : '';



require_once "php/meals.php";
$meal_obj = new meals();
$meals = $meal_obj->getAllMeals();


$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);
$cart_item = $_COOKIE["cart"] ?? "";
$total = 0;


?>

<head>

    <meta charset="UTF-8">
    <title>Group 4 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<header>

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Cart Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">Item</div>
                            <div class="col-6">Price</div>
                        </div>

                        <?php
                        foreach ($cart as $meal_id) {
                            $modalCart = $meal_obj->getMealById($meal_id)
                            ?>
                            <div class="row">
                                <div class="col"><?php echo $modalCart['title']; ?></div>
                                <div class="col"><?php echo $modalCart['price']; $total += $modalCart['price']; ?></div>
                            </div>
                            <?php
                        }
                        ?>


                        <div class="row">
                            <div class="col-6">Total</div>
                            <div class="col-6"><?php echo $total; ?></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button button5" data-bs-dismiss="modal">Close</button>
                    <form action="php/order.php" method="POST">
                        <input type="hidden" name="id">
                        <button type="submit" class="button">Order Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="navbarde">
        <img src="projectImages/logo-White.svg" alt="logo">
        <NAV>
            <UL id="det">

                <li class=<?php echo '"' . "transperentNav $home" . '"' ?>><a href="index.php">Home </a></li>
                <li class="transperentNav"><a href="#Menusection">Menu </a></li>
                <li class="transperentNav"><a href="#Gallerysection">Gallery </a></li>
                <li class="transperentNav"><a href="#Testimonialsection">Testimonials </a></li>
                <li class="transperentNav"><a href="#Contactsection">Contact Us </a></li>
                <li class="RedNav"><a href="Search">Search </a></li>
                <li class="RedNav"><a href="Profile">Profile </a></li>
                <li class="RedNav">
                <li class="RedNav">
                    <button type="button" class="RedNav" data-bs-toggle="modal"
                            data-bs-target="#cartModal"> cart <?php echo floor(strlen($cart_item) / 4) ?>
                    </button>
                    <span id="NumOfItem"></span></a></li>
            </UL>
        </NAV>
    </div>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="DisaNav">

            <UL id="det">

                <li class="transperentNav active"><a href="index.php">Home </a></li>
                <li class="transperentNav"><a href="#Menusection">Menu </a></li>
                <li class="transperentNav"><a href="#Gallerysection">Gallery </a></li>
                <li class="transperentNav"><a href="#Testimonialsection">Testimonials </a></li>
                <li class="transperentNav"><a href="#Contactsection">Contact Us </a></li>
                <li class="RedNav"><a href="Search">Search </a></li>
                <li class="RedNav"><a href="Profile">Profile </a></li>
                <li class="RedNav">
                    <button type="button" class="RedNav" data-bs-toggle="modal"
                            data-bs-target="#cartModal"> cart <?php echo floor(strlen($cart_item) / 4) ?>
                    </button>
                    <span id="NumOfItem"></span></a></li>
            </UL>
        </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: #281923;">
        <div class="container-fluid" id="button-menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

</header>