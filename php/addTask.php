<?php

require 'db.php';
$db = new Db();

if(isset($_POST['add'])) {
    $query = "INSERT INTO tasks(task,done,priority_id) VALUES(?, 0,0)";

    if($stmt = $db->mysql->prepare($query)) {
        $stmt->bind_param('s', $_POST['taskName']);
        $stmt->execute();
        $db->mysql->close();
        header("location: ../index.php");

    } else die($db->mysql->error);
}



