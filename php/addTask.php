<?php

require 'db.php';
$db = new Db();

if (isset($_POST['add'])) {
    $query = "INSERT INTO tasks(task,priority_id,done) VALUES(?,?,0)";

    if ($stmt = $db->mysql->prepare($query)) {
        if (isset($_POST['prioId'])) {
            $stmt->bind_param('ss', $_POST['taskName'], $_POST['prioId']);
            $stmt->execute();
            $db->mysql->close();
            header("location: ../index.php");
        }else{
            $stmt->bind_param('ss', $_POST['taskName'], $done="1");
            $stmt->execute();
            $db->mysql->close();
            header("location: ../index.php");
        }

    } else die($db->mysql->error);
}



