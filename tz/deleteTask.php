<?php

$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);

$id = $_POST["id"];

$query = "DELETE FROM task WHERE id = '$id';";
$result1 = mysqli_query($link,$query);
$result = array('answer' => $id);
    echo json_encode($result);?>