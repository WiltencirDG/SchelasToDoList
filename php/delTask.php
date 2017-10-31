<?php

require 'db.php';

$db = new Db();
$response = $db->deleteTask($_GET['id']);
$db->mysql->close();
header("Location: ../index.php");
