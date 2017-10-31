<?php

require 'db.php';

$db = new Db();
if ($_GET['done'] == 0) {
    $response = $db->updateTask($_GET['id'],1);
    $db->mysql->close();
    header("Location: ../index.php");
}
$response = $db->updateTask($_GET['id'],0);
$db->mysql->close();
header("Location: ../index.php");