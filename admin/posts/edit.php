<?php include_once "../../path.php" ?>
<?php include_once "../../app/controllers/adminController.php"?>
<?php include_once "../../app/controllers/post.php"; ?>
<!DOCTYPE html>
<html>

<head>
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

    < <div class="container">
        <form class="row justify-content-center" method="post" action="edit.php" enctype="multipart/form-data">
            <div class="mb-3 col-12 col-md-12 p-4">
                <label for="formGroupExampleInput">Название статьи</label>
                <input name="namePost" type="text" class="form-control" value="<?php echo $namePost ?>" placeholder="Название">
                <div class="w-100" style="height:20px;"></div>
                <label for="formGroupExampleInput">Категория статьи</label>
                <select name="idCategori" type="text" class="form-control">
                    <?php foreach ($arrayCategories as $key => $value) : ?>

                        <option <?php if ($value["id"] == $idCategori) echo "selected" ?> value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="w-100" style="height:20px;"></div>
                <label for="formGroupExampleInput">Текст описания</label>
                <textarea name="description" class="form-control" placeholder="описание"><?php echo $description ?></textarea>
                <div class="w-100" style="height:20px;"></div>
                <label for="formGroupExampleInput">Текст статьи</label>
                <?php include_once '../../assets/js/ckeditor/ckeditor.php';
                $ckeditor = new CKEditor();
                $ckeditor->basePath = '../../assets/js/ckeditor/';
                $ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
                $ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
                $ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
                $ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
                $ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
                $ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
                $ckeditor->editor('content', $content);  ?>


                <div class="w-100" style="height:20px;"></div>
                Картинка для статьи <input name="img" type="file" class="form-control" value="<?php echo $img ?>">
                <div class="w-100" style="height:20px;"></div>
                <button name="btn_edit" type="submit" style="margin-right:20px;" class="btn btn-primary"> Обновить статью</button>
                <a href="index.php" class="btn btn-secondary"> Отмена</a>

                <input name="id" type="hidden" class="form-control" value="<?php echo $id ?>">
            </div>

        </form>
        </div>



        <?php include_once "../../app/includes/footer.php" ?>

</body>

</html>