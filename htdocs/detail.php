<?php

include 'include/header.php';
?>
<?php
if (isset($_GET["id"])):
?>
<?php
$id = $_GET["id"];
$items_array = $_SESSION["cart"] ?? [];
$item = in_array($id, $items_array) ? "remove from cart" : 'add to cart';
require_once "meal_db.php";
require_once "php/meals.php";

$Meal = new meals();
$Meal_db = new meal_db();
$meal = $Meal->getMealById($id);
$meal_db = $Meal_db->getMealById($id);
$picFolder = "projectImages/";
$cart_item = $_COOKIE["cart"] ?? "";
$picFolder_db = "images/";
$mealReview = $Meal_db ->getMealReviewBy($id);
$avgRating = $Meal_db ->getAverageRating($id);
$rating = 0.0 + $avgRating["rating"];

?>

<html>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<body>

<main>

    <div class="space">
    </div>
    <div id="menusec">
        <img src=<?php echo $picFolder . $meal_db["image"] ?> alt="sandwich">
        <div id="menuBody">
            <h1 id="h2de"><?php echo $meal_db["title"] ?></h1>
            <p><?php echo $meal_db["price"] ?></p>
            <p>⭐<?php echo $rating ?></p>

            <p class="PageText">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum recusandae aspernatur
                sequi natus exercitationem consectetur ut itaque quaerat praesentium, quos odit libero amet iste ex
                nobis repudiandae a velit minima!</p>


            <button onclick="sub()" style="cursor: pointer;" class="button button1">-</button>
            <button class="button button1"><span id="NumberOfBurgers">1</span></button>
            <button onclick="add()" style="cursor: pointer;" class="button button1">+</button>
            <form method="post" action="php/cart.php">
                <input type="hidden" name="id" value=<?php echo $meal_db["id"] ?>>
                <button class="button button2" type="submit">
                    <?php echo $item ?></button>
            </form>

        </div>
    </div>
    <div class="margi">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">description
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" onclick="showReview(<?php  echo $id; ?>)" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews
                </button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="descSec">

                    <p class="PageText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores quo excepturi
                        quibusdam nulla necessitatibus! Consectetur obcaecati quod saepe pariatur culpa, iusto
                        reprehenderit dolor eveniet id impedit eius, placeat ipsa. Illo.</p>

                    <h4 class="PageText">nutriton facts</h4>

                    <table border="3">

                        <tr>
                            <td colspan="3"><B>Supplement Facts</B></td>
                        </tr>
                        <tr>
                            <td colspan="3"><B>Serving Size:</b> <?php echo $meal["nutrition"]["serving_size"] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><B>Serving Per
                                    Container:</B> <?php echo $meal["nutrition"]["serving_per_container"] ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><B>Amount Per Serving</B></td>
                            <td><B>%Daily value*</B></td>
                        </tr>
                        <tr>
                            <td>Calories</td>
                            <td><?php echo $meal["nutrition"]["facts"][0]["amount_per_serving"] ?> cal</td>
                            <td><?php echo $meal["nutrition"]["facts"][0]["daily_value"] ?></td>
                        </tr>
                        <tr>
                            <td>Calories from fat</td>
                            <td><?php echo $meal["nutrition"]["facts"][1]["amount_per_serving"] ?> cal</td>
                            <td><?php echo $meal["nutrition"]["facts"][1]["daily_value"] ?></td>
                        </tr>
                        <tr>
                            <td>Total Fat</td>
                            <td><?php echo $meal["nutrition"]["facts"][2]["amount_per_serving"] ?> g</td>
                            <td><?php echo $meal["nutrition"]["facts"][2]["daily_value"] ?></td>
                        </tr>
                        <tr>
                            <td>Saturated Fat</td>
                            <td><?php echo $meal["nutrition"]["facts"][3]["amount_per_serving"] ?> g</td>
                            <td><?php echo $meal["nutrition"]["facts"][3]["daily_value"] ?></td>
                        </tr>

                        <tr>
                            <td>Cholesterol</td>
                            <td><?php echo $meal["nutrition"]["facts"][4]["amount_per_serving"] ?> mg</td>
                            <td><?php echo $meal["nutrition"]["facts"][4]["daily_value"] ?></td>
                        </tr>
                        <tr>
                            <td>Sodium</td>
                            <td><?php echo $meal["nutrition"]["facts"][5]["amount_per_serving"] ?> mg</td>
                            <td><?php echo $meal["nutrition"]["facts"][5]["daily_value"] ?></td>
                        </tr>
                        <tr>
                            <td>Total Carb</td>
                            <td><?php echo $meal["nutrition"]["facts"][6]["amount_per_serving"] ?> g</td>
                            <td><?php echo $meal["nutrition"]["facts"][6]["daily_value"] ?></td>
                        </tr>

                        <tr>
                            <td>Vitamin A</td>
                            <td><?php echo $meal["nutrition"]["facts"][7]["amount_per_serving"] ?> mg</td>
                            <td><?php echo $meal["nutrition"]["facts"][7]["daily_value"] ?></td>
                        </tr>

                        <tr>
                            <td>Calcium</td>
                            <td><?php echo $meal["nutrition"]["facts"][8]["amount_per_serving"] ?> mg</td>
                            <td><?php echo $meal["nutrition"]["facts"][8]["daily_value"] ?></td>
                        </tr>

                        <tr>
                            <td colspan="3">*Percent Daily Values are based on a 2,000 calorie diet.. Your daily values
                                may be higher or lower depending on your calorie needs
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div id="rev"></div>

                <div id="for">
                    <button onclick="showRev()" style="cursor: pointer;" class="button button4">Add Your Review</button>
                    <div id="revHide">
                        <form action= "Review.php" method="post" enctype="multipart/form-data">
                            <div>
                                <label class="PageText">Image</label>
                                <input required type="file" name="image"; id="img"  accept="image/*">

                                <input hidden name="id" value="<?php echo $id; ?>">
                            </div>
                            <div>
                                <datalist id="tickmarks" >
                                    <option value="0"></option>
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="4"></option>
                                    <option value="5"></option>
                                </datalist>
                                <label class="PageText">Rate the food</label>
                                <input type="range" name="rating" min="0" max="5" step="1" list="tickemarks" required>
                            </div>
                            <div>
                                <label class="PageText">Name<br>
                                    <input required class="TextInput" id="cusname" type="text" placeholder="First and Last name"
                                           name="reviewer_name">
                                </label>
                            </div>
                            <div>
                                <label class="PageText">City<br>
                                    <input required class="TextInput" id="cusname" type="text" placeholder="City Eg.Dhahran"
                                           name="city">
                                </label>
                            </div>
                            <div>
                                <label class="PageText">Reviews </label>
                                <div id="err">Please type your review</div>
                            </div>
                            <div>
                                <textarea id="Review" class="TextInput" name="review"
                                          placeholder="Type your review here, max 500 characters" maxlength="500"
                                          required></textarea>
                            </div>
                            <div id="result">0/500</div>


                            <button onclick="valida()" style="cursor: pointer;" type="submit" class="button button3">
                                Submit
                            </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</main>

<?php endif; ?>

<footer>
    <?php
    include 'include/footer.php';
    ?>

</footer>
</body>

</html>
