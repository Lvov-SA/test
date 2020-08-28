<?php
$host = 'localhost';
$user = 'root';
$password ='root';
$db_name = 'testpoint';
$link = mysqli_connect($host,$user,$password,$db_name);


$query = "SELECT * FROM `task`";
$result1 = mysqli_query($link,$query);
$answer = "";

$result1->data_seek($result1->num_rows - 1);
$row = $result1->fetch_assoc();
$lastId = $row["id"];
for ($row_no = $result1->num_rows - 1; $row_no >= 0; $row_no--) {
    $result1->data_seek($row_no);
    $row = $result1->fetch_assoc();
    $text1 = "'Вы точно хотите удалить эту запись?'";
    $scriptForDelete = 'if(confirm('.$text1.')){
     $.ajax({
            url: \'deleteTask.php\',
            type: \'POST\',
            dataType: \'html\',
            data: $(\'#f'.$row["id"].'\').serialize(),
            success: function (response) {
                result = $.parseJSON(response);
               
            },
            error: function (response) { // Данные не отправлены
                alert(\'Ошибка. Данные не отправлены.\');
            }
        });
        setTimeout(downaldTasks, 500);
}   ';
    $scriptForRedact = '
    
    if(confirm(\'Вы точно хотите сохранить внесенные изменения в запись? Для записи изменений на сервер строки не должны быть пустыми\')){
     $.ajax({
            url: \'redactTask.php\',
            type: \'POST\',
            dataType: \'html\',
            data: $(\'#f'.$row["id"].'\').serialize(),
            success: function (response) {
                result = $.parseJSON(response);
            },
            error: function (response) { // Данные не отправлены
                alert(\'Ошибка. Данные не отправлены.\');
            }
        });
        setTimeout(downaldTasks, 500);
}   ';
    $answer = $answer.'<form id = f'.$row["id"].' style="background-color: chocolate"><input type = "text" value ="'.$row["name"].'" name = "name"><br><input type = "text" value ="'.$row["email"].'" name = "email"><br><textarea name = "text">'.$row["text"].'</textarea><br> <input type="text" hidden name = "id" value="'.$row["id"].'"><input type="button" value = "Удалить запись" id = '.$row["id"].' onclick="'.$scriptForDelete.'"> <input type="button" value = "Сохранить внесенные изменения в запись" id = '.$row["id"].' onclick="'.$scriptForRedact.'"><br></form>';
}
$result = array('answer' => $answer, 'lastId' =>$lastId);
    echo json_encode($result);?>