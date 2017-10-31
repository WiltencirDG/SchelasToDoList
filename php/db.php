<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', 'root');
DEFINE('DB_HOST', '127.0.0.1');
DEFINE('DB_NAME', 'todolist');


Class Db
{
    public $mysql;

    function __construct()
    {
        $this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Problem to connect to database.');
    }

    function deleteTask($id)
    {
        $query = "DELETE from tasks WHERE id = $id";
        $result = $this->mysql->query($query) or die("Problem to delete entry.");
        if ($result){
            return 'Deleted';
        }
    }

    function updateTask($id)
    {
        $query = "UPDATE tasks SET done = 1 WHERE id=$id";
        $result = $this->mysql->query($query) or die("Problem to update entry.");
        if ($result){
            return 'Updated';
        }
    }

}
