<?php
include_once  $_SERVER['DOCUMENT_ROOT']."/StudentsSite/app/database/dbFunction.php"?>
<?php
$errMessage = "";
function session($id,$user)//Создание сессии
{
    $_SESSION['id'] = $id;
    $_SESSION['user'] = $user;
    $_SESSION["firstName"] = $user["firstName"];
    $_SESSION['lastName'] = $user["lastName"];
    $status = SelectOne('status', ['id' => $user['Status']]);
    $_SESSION['status'] = $status[0]["name"];
    header('location:'. BASE_URL."admin/posts"); //Скинем на главную страницу
}
//Регистрация
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_reg"])) {

    $login = mb_strtolower(trim($_POST["login"]));
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $password1 = trim($_POST["password"]); 
    $password2 = trim($_POST["password2"]); 
    if ($login === '' || $firstName == '' || $lastName === '' || $password1 === ''|| $password1 !==$password2 ) {
    } elseif (mb_strlen($login) < 2) {
    } else {
        $check = SelectOne('users', ['login' => $login]);
        if (!empty($check)) {
            $errMessage  = "Такой логин уже используется";
        } else {

            $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
            //Создаем параметры для того чтобы закинуть их в таблицу 
            $parametrsInBd =
                [
                    'login' => $login,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'password' => $password,
                ];

            $id = Insert('users', $parametrsInBd); //Функция записи в бд и запоминаем id
            $check = SelectOne('users', ['login' => $login]);
            session($id,$check[0]);
        }
    }
} else {
    $login = '';
    $firstName = '';
    $lastName = '';
}
//Вход
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_logIn"])) {
    $login = mb_strtolower(trim($_POST["login"]));
    $password = trim($_POST["password"]); //Шифруем пароль 
    if ($login === '' || $password === '') {
    } elseif (mb_strlen($login) < 2) {
    } else {
        $check = SelectOne('users', ['login' => $login]);
        if (empty($check)) {
            $errMessage  = "Неверный логин";
        } else {
            if (!password_verify($password, $check[0]["password"])) {
                $errMessage  = "неверный пароль";
            } else {
                session($check[0]["id"],$check[0]);
            }
        }
    }
}


?>