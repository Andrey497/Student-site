<?php
include "usersAutorization.php";
if($_SESSION["status"]!=="author"){
    header('location:'. BASE_URL."logIn.php");
}
?>