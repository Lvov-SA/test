<?php

$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);

$login = $_POST["login"];
$password = $_POST["password"];
$text = $_POST["userText"];

$query = "INSERT INTO `users`(`name`, `password`) VALUES ('$login','$password')";
$result1 = mysqli_query($link,$query);
$result = array('answer' => $text);
    echo json_encode($result);?>