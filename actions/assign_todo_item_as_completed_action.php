<?php

session_start();

include "../helpers/GeneratorHelper.php";

require "../helpers/RedirectHelper.php";


$id = $_POST["item_id"];

$Item = $_SESSION["items"]["todo"][$id];

$_SESSION["items"]["completed"][$id]=$Item;

$_SESSION["items"]["completed"][$id]["completed_at"] = GeneratorHelper::generateCurrentDate();

$_SESSION["message"] = "The '{$Item["title"]}' is completed now :)";

unset($_SESSION["items"]["todo"][$id]);

RedirectHelper::redirectToPreviousPage("../views/completed.php");











