function validate() {
    if (document.forms[0].login.value.length == 0) {
        alert('Поле "Логин" не должно оставаться быть пустым');
        return false;
    }
    if (document.forms[0].firstName.value.length == 0) {
        alert('Поле "Имя" не должно оставаться пустым');
        return false;
    }
    if (document.forms[0].lastName.value.length == 0) {
        alert('Поле "Фамилия" не должно оставаться пустым');
        return false;
    }
    if (document.forms[0].password.value.length == 0) {
        alert('Поле "Пароль" не должно оставаться пустым');
        return false;
    }
    if (document.forms[0].password.value!= document.forms[0].password2.value) {
        alert('неправильно введен второй пароль');
        return false;
    }


    return true;
}