<?php
$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);

$name = $_POST["login"];
$password = $_POST["password"];
$query = "select * from users where name = '$name' and password = '$password'";
$result1 = mysqli_query($link,$query);
 $result1->data_seek(1);
 $row = $result1->fetch_assoc();
if (isset( $row['name']))
{
    $result = array(
        'answer' => true );
}
else{
    $result = array(
        'answer' => false);
}
    echo json_encode($result);
?>


