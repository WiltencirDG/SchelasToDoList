<?php

require 'db.php';
$db = new Db();

$query = "INSERT INTO tasks(task,priority_id,done) VALUES(?,?,0)";

if ($stmt = $db->mysql->prepare($query)) {
    if (isset($_POST['prioId'])) {
        $stmt->bind_param('ss', $_POST['taskName'], $_POST['prioId']);
        $stmt->execute();
        $db->mysql->close();
    }else{
        $stmt->bind_param('ss', $_POST['taskName'], $priority="1");
        $stmt->execute();
        $db->mysql->close();
    }
} else die($db->mysql->error);




