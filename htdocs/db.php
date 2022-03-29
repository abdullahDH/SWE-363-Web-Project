<?php
$link = mysqli_connect('localhost', 'root', '', 'meals');
if ($link === false)
    die("Error Connecting " . mysqli_connect_error());

/*$sql="create database Meals";*/

/*$sql= "create table meal(id int not null primary key auto_increment,
title varchar(50),
price decimal(10,4) unsigned,
image varchar(500),
description varchar(700)
 )";*/

$sql = "CREATE table reviews(id int not null primary key auto_increment,
reviewer_name varchar(80),
 city varchar(80), 
 date datetime, 
 rating tinyint(3) unsigned ,
image varchar(500),
review varchar(500), 
meal_id int,
foreign key (meal_id) references meal(id)
                    )";




if (mysqli_query($link, $sql))
    echo 'welcome reviews';
else
    echo 'error' . mysqli_error($link);
?>
