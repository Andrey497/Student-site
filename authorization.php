<?php include_once "Path.php";?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once "app/includes/include.php"?>
    <title>Учебный портал</title>
</head>

<body>
<script src="assets/js/form/autorization.js"></script> 
<?php include_once "app/controllers/usersAutorization.php";?>

    <?php include_once "app/includes/header.php"?>
    <div class="container">
        <form class="row justify-content-center" method="post" action="authorization.php" onsubmit="validate()">
        <div class="mb-3 col-12 col-md-4">
                <p style ="color:red"><?$errMessage?></p>
                
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputEmail1">Логин</label>
                <input  name="login" value="<?php echo $login?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="formGroupExampleInput">Имя</label>
                <input name="firstName" value="<?php echo $firstName?>" type="text" class="form-control" placeholder="First name">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputEmail1">Фамилия</label>
                <input name="lastName" value="<?php echo $lastName?>" type="text" class="form-control" placeholder="Last name">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1">Повторите пароль</label>
                <input name="password2" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <button name="btn_reg" type="submit" class="btn btn-secondary">Зарегистрироваться</button>
                <a href= "<?php echo BASE_URL . "LogIn.php" ?>" class="mb-3 col-md-4 col-12 link-secondary">Авторизироваться</a>
            </div>

        </form>
    </div>

    <?php include_once "app/includes/footer.php"?>

</body>

</html>