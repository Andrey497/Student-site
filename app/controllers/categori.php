<?php
 include_once $_SERVER['DOCUMENT_ROOT']."/StudentsSite/app/database/dbFunction.php";
 //Создание категории
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_reg"])&&isset($_SESSION["id"])) {
    $name = trim($_POST["name"]);
    if ($name =="") {
    
    }  
     else {
        
            //Создаем параметры для того чтобы закинуть их в таблицу 
            $parametrsInBd =
                [
                    'name' => $name
                ];

            $id = Insert('category', $parametrsInBd); //Функция записи в бд и запоминаем id
            header("location:" . "http://".$_SERVER['HTTP_HOST']."index.php?cat_id="."WEQEW");
            }
        
    
} else {
    $login = '';
    $firstName = '';
    $lastName = '';
}
 //Значение при обновлении категории
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])&&isset($_SESSION["id"])){
  
    $id = $_GET["id"];
    $category = SelectOne('category',['id'=>$id]);
    $name = $category[0]['name'];
    $id =$category[0]['id'];

}else{
    $name='';
}
//Обновление категории
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_edit"])&&isset($_SESSION["id"])) {
    $name = trim($_POST["name"]);
    if ($name =="") {
    
    }  
     else {
         $id = $_POST["id"];
        
            //Создаем параметры для того чтобы закинуть их в таблицу 
            $parametrsInBd =
                [
                    'name' => $name
                ];

            Update('category',$id, $parametrsInBd); //Функция записи в бд и запоминаем id
            header("location:" .BASE_URL."admin/category");
            }
        
    
}
//Удаление категории
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["delite_id"])&&isset($_SESSION["id"])) {
    
    
        
            //Создаем параметры для того чтобы закинуть их в таблицу 
           $id =$_GET["delite_id"];

            Delete('category',$id); //Функция записи в бд и запоминаем id
            header("location:" .BASE_URL."admin/category");
            
        
    
}
$arrayCategories=SelectAll('category');
