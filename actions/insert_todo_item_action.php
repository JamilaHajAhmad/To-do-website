<?php

session_start();

include "../helpers/GeneratorHelper.php";

include "../helpers/RedirectHelper.php";

$generated_ID = GeneratorHelper::generateID();


$_SESSION["items"]["todo"][$generated_ID]=[

    "title"=>$_POST["title"],
    "description"=>$_POST["description"],
    "created_at"=>GeneratorHelper::generateCurrentDate()

];

$_SESSION["message"] = "The '{$_POST["title"]}' is created successfully ^^";

RedirectHelper::redirectToPreviousPage("../views/todo.php");

