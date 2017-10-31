<?php

require 'db.php';

$db = new Db();
$response = $db->updateTask($_GET['id']);
$db->mysql->close();
header("Location: ../index.php");
