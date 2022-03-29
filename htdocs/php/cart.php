<?php

$id = $_POST["id"];

$cart = $_COOKIE["cart"] ?? "[]";
$cart = json_decode($cart);

array_push($cart, $id);
setcookie("cart", json_encode($cart), time() + 30 * 24 * 60 * 60, "/");

header('Location: ' . $_SERVER['HTTP_REFERER']);