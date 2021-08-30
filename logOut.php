<?php
include_once "path.php";
session_start();
if (ini_get('register_globals'))
{
    foreach ($_SESSION as $key=>$value)
    {
        if (isset($GLOBALS[$key]))
            unset($GLOBALS[$key]);
    }
}
session_destroy ();
header( 'location:'. BASE_URL."/index.php");
?>