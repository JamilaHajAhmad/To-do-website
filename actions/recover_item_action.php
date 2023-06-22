<?php

session_start();

include "../helpers/RedirectHelper.php";

include "../constants/ItemTypes.php";

$id = $_POST["item_id"];

$recover_to = $_POST["recover_to"];

$Item = $_SESSION["items"]["deleted"][$id];

$_SESSION["message"] = "The '{$Item["title"]}' is recovered now :)";

unset($Item["deleted_at"]);

unset($Item["deleted_from"]);

unset($_SESSION["items"]["deleted"][$id]);

$targetKey = "completed";
$page = "../views/completed.php";

if($recover_to ==  ItemTypes::TODO )
{
    $targetKey = "todo";
    unset($Item["completed_at"]);
    $page = "../views/todo.php";

}

$_SESSION["items"][$targetKey][$id]=$Item;



RedirectHelper::redirectToPreviousPage($page);

