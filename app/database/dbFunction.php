<?php
include_once 'connect.php'; //Подключение к бд
session_start();

function params($params){
    $query = '';
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i == 0) {
                $query = $query . " Where $key=$value ";
            } else {
                $query = $query . " AND $key=$value ";
            }
            
        }
    }
    return $query;
}
//--------------------------------------------------Select-----------------------------------------
function BAseSelect($table, $params = [])
{ //Базовый запрос
   
    $query = "SELECT * FROM  $table ";
    
    $query = $query.params($params);
    return $query;
}

function BAseSelectJoinPost($table, $params = [],$values=[]){
if($values==[]){
    $query = "SELECT * FROM  $table  ";
}
else{
    $query = "SELECT ";
    foreach($values as $key => $value){
        $query=$query." $value.$key, ";
    }}
    $query = substr($query, 0, -2);
    $query = $query." FROM  $table AS a ";
    $query=$query." JOIN category AS c  ON a.category_id = c.id ";
    $query=$query." JOIN users AS u   ON a.author_id = u.id ";
    $query = $query.params($params);
    return $query;
}
function Selectone($table, $params = []) //Функция возвращения всех значений
{

    return  SelectLimit($table, 1, $params);
}


function SelectOrderPost($table, $parametrOrder, $params = [],$values=[]) //Функция возвращения всех значений
{
    global $link;
    $query = BAseSelectJoinPost($table, $params,$values);
    $query = $query . " Order By $parametrOrder LIMIT 3";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = [];
    if ($result) {
        for ($data; $row = mysqli_fetch_assoc($result); $data[] = $row);
    }
    return $data;
}
function SelectAll($table, $params = []) //Функция возвращения всех значений
{
    global $link;
    $query = BAseSelect($table, $params);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = [];
    if ($result) {
        for ($data; $row = mysqli_fetch_assoc($result); $data[] = $row);
    }
    return $data;
}


function SelectAllPost($table, $params = [],$value=[]) //Функция возвращения всех значений Постов
{
    global $link;
    $query = BAseSelectJoinPost($table, $params,$value);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = [];
    if ($result) {
        for ($data; $row = mysqli_fetch_assoc($result); $data[] = $row);
    }
    return $data;
}
function SelectLimit($table, $Limit, $params = []) //Функция возвращения всех значений
{
    global $link;
    $query = BAseSelect($table, $params);
    $query = $query . " Limit $Limit";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = [];
    if ($result) {
        for ($data; $row = mysqli_fetch_assoc($result); $data[] = $row);
    }
    return $data;
}

//-------------------------------------------END_SELECT-----------------------------------------

//--------------------------------------------Insert--------------------------------------------
function Insert($table, $params = [])
{
    global $link;
    $query = "Insert INTO $table";
    $values = "";
    $keys = "";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            $values = $values . "$value, ";
            $keys = $keys . "$key, ";
            $i++;
        }

        $values = substr($values, 0, -2); //Удаление последней запетой
        $keys = substr($keys, 0, -2); //Удаление последней запетой
        $query = $query . "($keys) VALUES ($values)";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        return mysqli_insert_id($link);
    }
}
//--------------------------------------------END_Insert--------------------------------------------

//------------------------------------------Update---------------------

function Update($table, $id, $params = [])
{
    global $link;

    $parametrs = "";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            $parametrs = $parametrs . " $key = '$value', ";
            $i++;
        }

        $parametrs = substr($parametrs, 0, -2); //Удаление последней запетой

        $query = "UPDATE  $table SET $parametrs WHERE id = $id";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        return true;
    }
}
//------------------------------------------ END_Update---------------------

//------------------------------------------DELETE---------------------
function Delete($table, $id)
{
    global $link;
    $query = "DELETE  from $table WHERE id=$id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    return true;
}
