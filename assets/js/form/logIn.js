function validate() {
    if (document.forms[0].login.value.length == 0) {
        alert('Поле "Логин" не должно оставаться быть пустым');
        return false;
    }
    if (document.forms[0].password.value.length==0) {
        alert('Поле "Пароль" не должно оставаться пустым');
        return false;
    }
   


    return true;
}