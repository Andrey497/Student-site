<?php include_once "path.php"?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once "app/includes/include.php" ?>
    <title>Учебный портал</title>
</head>

<body>
    <script src="assets/js/form/logIn.js"></script>
    <?php include_once "app/controllers/usersAutorization.php";?>
    <?php include_once "app/includes/header.php" ?>
    <div class="container">
        
        <form class="row justify-content-center" method="post" action="logIn.php" onsubmit="validate()">
        <div class="mb-3 col-12 col-md-4">
            <span style="color:red"><?php echo $errMessage ?></span>
        </div>
        <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputEmail1">Логин</label>
                <input name="login" type="email" value="<?php echo $login?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <button type="submit" class="btn btn-secondary  pull-left " name="btn_logIn">Войти</button>
               
                <a href="<?php echo BASE_URL . "authorization.php" ?>" class="mb-3 col-md-4 col-12 link-secondary text-right">Зарегистрироваться</a>
               
            </div>

        </form>
    </div>

    <?php include_once "app/includes/footer.php" ?>

</body>

</html>