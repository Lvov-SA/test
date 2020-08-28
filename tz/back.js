var root = false; //переменная прав пользователя
$(document).ready(function () {
    $('#registration').click(function () {
        registration();
    })
    $('#autorisation').click(function () {
        autorisation();
    })
    downaldTasks();
    let timerId = setInterval(downaldTasks, 60000);
});

//фукция добавления записи
function addTask() {
    if ($("#nameUser").val() != "" && $("#emailUser").val() != "" && $("#userText").val() != "") {
        $.ajax({
            url: 'createTask.php',
            type: 'POST',
            dataType: 'html',
            data: $('#createTask').serialize(),
            success: function (response) {
                result = $.parseJSON(response);
            },
            error: function (response) { // Данные не отправлены
                alert('Ошибка. Данные не отправлены.');
            }
        });
    } else {
        alert("Укажите свое имя, почту и текст комментария");
    }
    setTimeout(downaldTasks, 500);
    $('#nameUser').val('');
    $('#emailUser').val('');
    $('#userText').val('');
}

//функция загрузки всех записей (происходит при входе в страницу)
function downaldTasks() {
    if (!root) {
        $.ajax({
            url: 'downaldTasksSimple.php',
            type: 'POST',
            dataType: 'html',
            data: null,
            success: function (response) {
                result = $.parseJSON(response);
                $('#result').html(result.answer);
                $('#lastId').html(result.lastId);
            },
            error: function (response) { // Данные не отправлены
                alert('Ошибка. Данные не отправлены.');
            }
        });
    } else {
        $.ajax({
            url: 'downaldTasks.php',
            type: 'POST',
            dataType: 'html',
            data: null,
            success: function (response) {
                result = $.parseJSON(response);
                $('#result').html(result.answer);
                $('#lastId').html(result.lastId);
            },
            error: function (response) { // Данные не отправлены
                alert('Ошибка. Данные не отправлены.');
            }
        });

    }
}

//функция авторизации
function autorisation() {
    if ($("#login").val() != "" && $("#password").val() != "") {

        $.ajax({
            url: 'autorisation.php',
            type: 'POST',
            dataType: 'html',
            data: $('#autoForm').serialize(),
            success: function (response) {
                result = $.parseJSON(response);
                if (result.answer) {
                    alert("Вы вошли в систему");
                    $("#login").val('');
                    $("#password").val('');
                    root = true;
                    downaldTasks();
                    $('#formAuto').hide(); $('#closeForm').hide() ; $('#showForm').show();
                } else {
                    alert("проверьте логин и пароль");
                }
            },
            error: function (response) { // Данные не отправлены
                alert('Ошибка. Данные не отправлены.');
            }
        });

    } else {
        alert("Все поля не должны быть пустыми");
    }
}

//функция регистрации
function registration() {
    if ($("#regLogin").val() != "" && $("#regPassword").val() != "") {
        if ($("#regPassword").val() == $('#resetPassword').val()) {
            $.ajax({
                url: 'registration.php',
                type: 'POST',
                dataType: 'html',
                data: $('#registrationForm').serialize(),
                success: function (response) {
                    result = $.parseJSON(response);
                },
                error: function (response) { // Данные не отправлены
                    alert('Ошибка. Данные не отправлены.');
                }
            });
            alert("Вы успешно зарегестрировались");
            $("#regLogin").val('');
            $("#regPassword").val('');
            $('#resetPassword').val('');
        } else {
            alert("Проверьте поле проверки пароля");
        }

    } else {
        alert("Все поля не должны быть пустыми");
    }
}


