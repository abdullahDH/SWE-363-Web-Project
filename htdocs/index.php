<?php
include 'include/header.php';

?>


<?php

require_once "meal_db.php";
$meal_obj = new meal_db();
$meals = $meal_obj->getAllMeals();
$mealsAdded = $_COOKIE["cart"] ?? "";
$Meal = new meal_db();
$boughtMeals = isset($_COOKIE["recently-bought"]) ? $_COOKIE["recently-bought"] : "[]";
$boughtMeals = json_decode($boughtMeals);
$picFolder = "projectImages/";
$picFolder_db = "images/";


?>


<html>


<body>


<main>

    <div class="background">
        <a name="Homesection"></a>

        <div class="Home">

            <h1 id="h3h3">Party Time</h1>
            <div class="flexbox-item "><h3><br>Buy any 2 burgers and <br>
                    get 1.5L pepsi free </h3></div>

            <button class="button button3" style="cursor: pointer;">Order Now</button>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <h2 id="mostpop">Recently bought items</h2>
            <?php
            foreach ($boughtMeals as $meal_id) {
                $mealsBought = $meal_obj->getMealById($meal_id);
                $avgRating = $meal_obj->getAverageRating($meal_id);
                $rating = 0.0 + $avgRating["rating"];
                ?>
                <div class="col-xl-3 col-md-4 col-sm-12">
                    <div class="gall">

                        <img src="<?php echo $picFolder_db . $mealsBought["image"] ?>" alt="sandwich">

                        <p>⭐ <?php echo $rating; ?> <br>
                            <?php echo $mealsBought["title"] ?><br>
                            Some Description</p>

                        <form method="post" action="php/cart.php">
                            <input type="hidden" name="id" value=<?php echo $mealsBought["id"] ?>>
                            <button type="submit" class="button button3"><span>Buy again</span>
                            </button>
                        </form>
                        <p><?php echo $mealsBought["price"] ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


    <div class="MenuSection">


        <a name="Menusection"></a>

        <br><a id="h2"
        <h2>Want To Eat</h2></a><br>
        <br><a id="p"
        <p>Try our most delicous food and usually take minutes to deliver</p></a><br>

        <a class="food-item" href="pizza">pizza</a>
        <a class="food-item" href="fast food">fast food</a>
        <a class="food-item" href="cupcake">cupcake</a>
        <a class="food-item" href="sandwich">sandwich</a>
        <a class="food-item" href="spaghetti">spaghetti</a>
        <a class="food-item" href="burger">burger</a>
    </div>
    <div class="deliveryBG" align="right">
        <br><br><br><br><br><br><br><br>
        <div class="RightTriangle"><br><br><br><br>
            <strong>We guarantee 30 minutes <br>delivery</Strong>
        </div>

        <p id="if" class="p2">If you are having a meeting, working late <Br>at night and need an extra push</p>

    </div>

    </div>

    <a name="Gallerysection"></a>
    <div class="Gallery">
        <h2 id="mostpop">Our most popular recipes</h2>
        <div id="Gallerysection">
            <p id="tryourmost"> Try our most delicious food and usually take minutes to deliver</p>

            <div class="containter">

                <div class="row">
                    <?php foreach ($meals as $meal):
                        $avgRating = $meal_obj->getAverageRating($meal["id"]);
                        $rating = 0.0 + $avgRating["rating"];
                        ?>
                        <div class="col-xl-3 col-md-4 col-sm-12">
                            <div class="gall">
                                <a href=<?php echo "detail.php?id=" . $meal["id"] ?> style="cursor: pointer;">
                                <img src="<?php echo $picFolder_db . $meal["image"] ?>" alt="sandwich">
                                <br>
                                <a>⭐ <?php echo $rating; ?> <br></a>
                                <a><?php echo $meal["title"] ?></a><br>
                                <a>Some Description</a><br>
                                </a>
                                <form method="post" action="php/cart.php">
                                    <input type="hidden" name="id" value=<?php echo $meal["id"] ?>>
                                    <button type="submit" class="button button3">
                                        <span>add to cart</span></button>
                                </form>
                                <a><?php echo $meal["price"] ?></a><br>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>

    </div>
    </div>

    <a name="Testimonialsection"></a>
    <div class="testimonials">

        <h2 id="caasc">Clients testimonials</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="projectImages/man-eating-burger.png" class="d-block w-100"
                                     alt="burgereating1">
                            </div>
                            <div class="carousel-item">
                                <img src="projectImages/man-eating-burger.png" class="d-block w-100"
                                     alt="burgereating2">
                            </div>
                            <div class="carousel-item">
                                <img src="projectImages/man-eating-burger.png" class="d-block w-100"
                                     alt="burgereating3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci in sunt hic eaque minima
                        ullam incidunt quis ratione accusamus velit alias, consequuntur voluptatum itaque facere,
                        aliquid explicabo sapiente dolorem fugiat ut obcaecati dicta odio praesentium!</p>
                </div>
            </div>
        </div>
    </div>

</main>

<footer>
    <div class="margi">
        <?php include 'include/footer.php'; ?>
    </div>
</footer>


</body>

</html>
