<?php
$id = $_POST["id"];


$cart = $_COOKIE["cart"] ?? "[]";
$cart = json_decode($cart);


setcookie("recently-bought", json_encode($cart), time() + 30 * 24 * 60 * 60, "/");

header('Location: http://localhost');


if (isset($_COOKIE['cart'])) {
    unset($_COOKIE['cart']);
    setcookie('cart', null, -1, '/');
}
