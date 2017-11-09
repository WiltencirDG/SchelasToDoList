<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');
DEFINE('DB_HOST', 'localhost');
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

    function updateTask($id,$done)
    {
        $query = "UPDATE tasks SET done = $done WHERE id=$id";
        $result = $this->mysql->query($query) or die("Problem to update entry.");
        if ($result){
            return 'Updated';
        }
    }

    function getPriorityNameById($id){
        $query = "SELECT name FROM priorities WHERE id = $id";
        $result = $this->mysql->query($query) or die("Error to get priority name");
        if ($result){
            $name = $result->fetch_array(MYSQLI_ASSOC);
            return $name['name'];

        }
    }

}
