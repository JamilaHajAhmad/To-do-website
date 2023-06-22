<?php

session_start();

include "../helpers/RedirectHelper.php";


$id = $_POST["item_id"];

$Item = $_SESSION["items"]["completed"][$id];

$_SESSION["items"]["todo"][$id]= $Item;


$_SESSION["message"] = "The '{$Item["title"]}' is uncompleted now";

unset($_SESSION["items"]["completed"][$id]);

RedirectHelper::redirectToPreviousPage("../views/todo.php");







