<html>

<head>
    <title>"задачник"</title>
    <link href="style.css" rel="stylesheet">
    <script src="js/jQuery.js"></script>
    <script src="back.js"></script>
</head>

<ul>
    <li><a style="color: aliceblue">Задачник</a></li>
    <li><input type="button" id = "showForm" value="показать окно авторизации" onclick="$('#formAuto').show(); $('#showForm').hide(); $('#closeForm').show()">
        <input type="button" hidden id = "closeForm" value="скрыть окно авторизации" onclick="$('#formAuto').hide(); $('#closeForm').hide() ; $('#showForm').show()"></li>
</ul>
<body>

<div id="formAuto"  hidden>
    <form method="post" id="autoForm"  action="">
        <div style=" width: 400px; margin: 0 auto; ">
            <p>Имя:</p>
            <input type="text" id ="login" name="login"> <br>
            <p>Пароль:</p>
            <input type="password" id = "password" name="password"><br>
            <input type="button" value="Отправить" id="autorisation">
            <input type="button" value="Зарегестрироваться" id="registrationShow" onclick=" $('#autoForm').hide(); $('#registrationForm').show()">
        </div>
    </form>
    <form method="post" id="registrationForm" action="" hidden>
        <div style=" width: 400px; margin: 0 auto">
            <p>Имя:</p>
            <input type="text" id = "regLogin" name="login"> <br>
            <p>Пароль:</p>
            <input type="text" id = "regPassword" name="password"><br>
            <p>Повторите пароль:</p>
            <input type="password" id = "resetPassword" name="password"><br>
            <input type="button" value="Отправить"  id="registration" >
            <input type="button" value="Авторизироваться" id="autoShow" onclick=" $('#autoForm').show();
                $('#registrationForm').hide()">
        </div>
    </form>
</div>
<form method="post" id = "helpForm" action = "" hidden>
    <p id = "lastId" name = "lastId"></p>
</form>
<form method="post" id = "createTask" action="">
    <input type="text" placeholder="Имя" id="nameUser" name="nameUser"><br>
    <input type="text" placeholder="Эмэйл" id="emailUser" name="emailUser"><br>
    <textarea id = "userText" name = "userText" placeholder="Текст задачи"></textarea> <br>
    <input type="button" value="Загрузить задачу" onclick="addTask()" id="sendTask"><br>
</form>
<div id="result"></div>
</body>

</html>

