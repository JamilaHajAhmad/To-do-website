<?php
class RedirectHelper
{
    public static function redirectToPreviousPage($page)
    {

          header("Location:".$page);
         //header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
}
