<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/StudentsSite/app/database/dbFunction.php";
//Создание статьи

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_reg_p"]) && isset($_SESSION["id"])) {
    if(isset($_FILES["img"]["name"])){
        $imgName = time()."__".$_FILES["img"]["name"];
        $imgtempName = $_FILES["img"]["tmp_name"];
        $filePath = ROOT_Path."\assets\img\posts\\".$imgName;
        $result = move_uploaded_file($imgtempName,$filePath);
    }
    $namePost = trim($_POST["namePost"]);
    $idCategori = ($_POST["idCategori"]);
    $description = trim($_POST["description"]);
    $content = ($_POST["content"]);
    $autorId = (int)($_SESSION['id']);
    if ($namePost  == "" || $autorId == "" || $content == "" || $idCategori == "" || $description == "") {
    } else {

        //Создаем параметры для того чтобы закинуть их в таблицу 
        $parametrsInBd =
            [

                'titel' => $namePost,
                'category_id' => $idCategori,
                'author_id' => $autorId,
                'description' => $description,
                'img' => $imgName,
                'content' => $content
            ];

        $id = Insert('articles', $parametrsInBd); //Функция записи в бд и запоминаем id
        header("location:" . BASE_URL . "admin/posts");
    }
} else {
    $namePost = '';
    $idCategori = '';
    $content = "";
    $description = '';
    $img = "";
    $id = "";
}
//Значение при обновлении статьи
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]) && isset($_SESSION["id"])) {

    $id = $_GET["id"];
    $post = SelectOne('articles', ['id' => $id]);
    $namePost = $post[0]['titel'];
    $id = $post[0]['id'];
    $idCategori = $post[0]["category_id"];
    $description = $post[0]["description"];
    $content = $post[0]["content"];
    $img = $post[0]["img"];
    $autorId = (int)($_SESSION['id']);
}

// обновлении статьи
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_edit"]) && isset($_SESSION["id"])) {
   $imgName = trim($_POST["img"]);
    if(isset($_FILES["img"]["name"])){
        $imgName = time()."__".$_FILES["img"]["name"];
        $imgtempName = $_FILES["img"]["tmp_name"];
        $filePath = ROOT_Path."\assets\img\posts\\".$imgName;
        $result = move_uploaded_file($imgtempName,$filePath);
    }
    $id = $_POST["id"];
    $namePost = trim($_POST["namePost"]);
    $idCategori = ($_POST["idCategori"]);
    $description = trim($_POST["description"]);
    $content = ($_POST["content"]);
  
    $autorId = (int)($_SESSION['id']);
    if ($namePost  == "" || $autorId == "" || $content == "" || $idCategori == "" || $description == "") {
    } else {

        //Создаем параметры для того чтобы закинуть их в таблицу 
        $parametrsInBd =
            [

                'titel' => $namePost,
                'category_id' => $idCategori,
                'author_id' => $autorId,
                'description' => $description,
                'img' => $imgName,
                'content' => $content
            ];

        Update('articles', $id, $parametrsInBd); //Функция записи в бд и запоминаем id
        header("location:" .  "http://".$_SERVER['HTTP_HOST']);
    }
}

//Удаление статьи
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["delite_id"]) && isset($_SESSION["id"])) {



    //Создаем параметры для того чтобы закинуть их в таблицу 
    $id = $_GET["delite_id"];

    Delete('articles', $id); //Функция записи в бд и запоминаем id
    header("location:" . BASE_URL . "admin/posts");
}
//Массивы для вывода
$arrayCategories = SelectAll('category');
if( isset($_SESSION["id"])){
$parametrs = ['a.author_id' => $_SESSION['id']];
$values = [
    'id' => 'a',
    'titel' => 'a',
    'name' => 'c',
    'CreatedTime' => 'a'
];

$arrayArticlesbyAdmin = SelectAllPost('articles', $parametrs, $values);
}

$values = [
    'id' => 'a',
    'titel' => 'a',
    'name' => 'c',
    'CreatedTime' => 'a',
    'description'=>'a',
    'img'=>'a',
    'Firstname'=>'u',
    'Lastname'=>'u',
    'category_id'=>'a',
    'Views'=>'a'
];
$arrayArticlesbyPosts = SelectAllPost('articles', $parametrs=[], $values);
if($_SERVER["REQUEST_METHOD"] === "GET" &&isset($_GET["categori_id"]))//ВыводСтатей по категориям
{
    $parametrs =[
        'a.category_id'=>$_GET["categori_id"]
    ];
    $values = [
    'id' => 'a',
    'titel' => 'a',
    'name' => 'c',
    'CreatedTime' => 'a',
    'description'=>'a',
    'img'=>'a',
    'Firstname'=>'u',
    'Lastname'=>'u',
    'category_id'=>'a',
    'Views'=>'a'

];
$arrayArticlesbyPosts = SelectAllPost('articles', $parametrs, $values);



}
if($_SERVER["REQUEST_METHOD"] === "GET" &&isset($_GET["id_article"]))//ВыводСтатей по категориям
{
    $values = [
    'id' => 'a',
    'titel' => 'a',
    'content'=>'a',
    'views'=>'a'


];
$parametrs =[
    'a.id'=>$_GET["id_article"]
];
$arrayArticlesbyPosts = SelectAllPost('articles', $parametrs, $values);
$parametrsInBd =
            [

                
                'views' => ((int)$arrayArticlesbyPosts[0]['views']+1)
            ];

       Update('articles',$_GET["id_article"], $parametrsInBd); //Функция записи в бд и запоминаем id
}

$arrayNewPost = SelectOrderPost('articles','a.CreatedTime DESC', $parametrs=[], $values);
$arrayBestPost = SelectOrderPost('articles','a.Views DESC', $parametrs=[], $values);
