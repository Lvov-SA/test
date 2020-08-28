<?php

$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);

$lastId = $_POST["lastId"];

$query = "SELECT * FROM `task` where id  '$lastId'";
$result1 = mysqli_query($link,$query);
$answer = "";

$result1->data_seek($result1->num_rows - 1);
$row = $result1->fetch_assoc();
$lastId = $row["id"];
for ($row_no = $result1->num_rows - 1; $row_no >= 0; $row_no--) {
    $result1->data_seek($row_no);
    $row = $result1->fetch_assoc();
    $answer = $answer.'<p id = '.$row["id"].' style="background-color: chocolate">'.$row["name"].'<br>'.$row["email"].'<br>'.$row["text"].'<br></p>';
}
$result = array('answer' => $answer, 'lastId' =>$lastId);
    echo json_encode($result);?>