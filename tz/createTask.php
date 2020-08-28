<?php

$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);

$name = $_POST["nameUser"];
$email = $_POST["emailUser"];
$text = $_POST["userText"];

$query = "INSERT INTO `task`(`name`, `email`, `text`) VALUES ('$name','$email','$text')";
$result1 = mysqli_query($link,$query);
$result = array('answer' => $text);
    echo json_encode($result);?>