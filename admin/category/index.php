<?php include_once "../../path.php" ?>
<?php include_once "../../app/controllers/adminController.php"?>
<?php include_once "../../app/controllers/categori.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "../../app/includes/include.php"; ?>
    <title>Учебный портал</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Style-->
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--Icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!-- CSS-->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <?php include_once "../../app/includes/header.php" ?>
    <div class="container-fluid">
    <p></p>
    <p></p>
        <div class=" content row">
        <?php include "../sidebar.php" ?>
            <div class=" col-sm-12 col-md-10 col-lg-10 ">
                <h2 class="content-name"> Управление категориями </h2>

                <div class="row content-heading">
                    <div class=" col-md-1 col-sm-1 text-left ">Id</div>
                    <div class=" col-md-3 col-sm-4  text-left ">Название</div >
                    <div class="col-md-2 col-sm-2  text-left ">Управление</div>
                </div>
                <?php foreach($arrayCategories as $key => $value):?>
                <div class="row content-elem ">
                    <div class=" col-md-1 col-sm-1 text-left "><?php echo $key+1?></div>
                    <div class=" col-md-3 col-sm-4  text-left "><?php echo $value['name']?></div>
                    <div class="col-md-1 col-sm-1  text-left "><a  class ="change" href="edit.php?id=<?php echo $value['id']?>">Изменить</a></div>
                    <div class="col-md-1 col-sm-1  text-left "><a class ="del" href="delite.php?delite_id=<?php echo $value['id']?>">Удалить</a></div>
                </div>
                <?php endforeach?>
                <div class="row">
                    <div class="  p-4 "> <a class="btn btn-info"  href="create.php"> Добавить категорию</a></div>

                  
                </div>
            </div>

        </div>
    </div>




    <?php include_once "../../app/includes/footer.php" ?>

</body>

</html>