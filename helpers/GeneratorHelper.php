<?php

class GeneratorHelper
{
   public static function generateID()
   {

            if(!session_id()){
                session_start();
            }

               $Items = $_SESSION["items"];

               $todoItems_indexes_as_keys = [0];
               $completedItems_indexes_as_keys = [0];
               $deletedItems_indexes_as_keys = [0];

               if (key_exists("todo", $Items )&& $Items["todo"]) {
                   $todoItems_indexes_as_keys = array_keys($Items["todo"]);
               }

               if (key_exists("completed", $Items) && $Items["completed"]) {
                   $completedItems_indexes_as_keys = array_keys($Items["completed"]);
               }

               if (key_exists("deleted", $Items) && $Items["deleted"]) {
                   $deletedItems_indexes_as_keys = array_keys($Items["deleted"]);
               }

               $max_index_of_todos = max($todoItems_indexes_as_keys);

               $max_index_of_completes = max($completedItems_indexes_as_keys);

               $max_index_of_deletes = max($deletedItems_indexes_as_keys);

               return max($max_index_of_todos, $max_index_of_completes, $max_index_of_deletes) + 1;

           }
           public static function generateCurrentDate()
           {

            return date("Y-m-d H:i:s");

           }

}