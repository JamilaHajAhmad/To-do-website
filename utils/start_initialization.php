<?php

ob_start();

session_start();

if(!key_exists("items",$_SESSION))
{
    $_SESSION["items"] = [];
}

$keys = ["todo","completed","deleted"];

foreach($keys as $key)
{
    if(!key_exists($key,$_SESSION["items"]))
    {
        $_SESSION["items"][$key] = [];
    }
}
