<?php

session_start();

include "../constants/ItemTypes.php";

include "../helpers/GeneratorHelper.php";

include "../helpers/RedirectHelper.php";

$id = $_POST["item_id"];

$deleted_from = $_POST["delete_from"];

if($deleted_from==ItemTypes::COMPLETED)
{
    $Item =$_SESSION["items"]["completed"][$id];
    unset($_SESSION["items"]["completed"][$id]);

}
else
{
    $Item = $_SESSION["items"]["todo"][$id];
    $Item["completed_at"] = null;
    unset($_SESSION["items"]["todo"][$id]);
}

$_SESSION["items"]["deleted"][$id]=$Item;

$_SESSION["items"]["deleted"][$id]["deleted_at"] = GeneratorHelper::generateCurrentDate();

$_SESSION["items"]["deleted"][$id]["deleted_from"] = $deleted_from;

$_SESSION["message"] = "The '{$Item["title"]}' is deleted now";

RedirectHelper::redirectToPreviousPage("../views/deleted.php");
