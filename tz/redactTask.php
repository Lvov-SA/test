<?php

$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];

if ($name !="" && $email !="" && $text !="") {
    $query = "UPDATE task SET name='$name', email='$email', text ='$text' WHERE id = '$id';";
    $result1 = mysqli_query($link, $query);
    $result = array('answer' => $id);
    echo json_encode($result);
}?>