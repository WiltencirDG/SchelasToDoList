<!DOCTYPE HTML>

<html lang="en">

<header>
    <title>Tasks</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/23f7c0f4c8.js"></script>

</header>

<body>
<?php
require 'php/db.php';
$db = new Db;
?>
<div class="container">
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <form action="./php/addTask.php" method="post" name="actions">
                <div class="col-xs-8 form-group">
                    <label for="addtask" class="control-label">Tarefa</label>
                    <input id="addtask" class="form-control" name="taskName" type="text"
                           placeholder="Adicionar tarefa" required="required">
                </div>
                <label for="dropdown" class="control-label margin-left">Prioridades</label>
                <div class="col-xs-4 form-group actions">
                    <select id="dropdown" name="prioId" class="form-control" required="required">
                        <option disabled selected style="display: none">Selecione...</option>
                        <?php
                        $queryP = "SELECT * FROM priorities";
                        $resultsP = $db->mysql->query($queryP);
                        if ($resultsP->num_rows) {
                            while ($row = $resultsP->fetch_array()) {
                                ?>
                                <option value="<?php print_r($row['id']) ?>"><?php print_r($row['name']) ?></option>
                            <?php }
                        } ?>
                    </select>
                    <button type="submit" name="add" class="btn btn-primary margin-left">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 todo">
            <h3>List To Do</h3>
            <ul class="list-group">
                <?php
                $queryT = "SELECT * FROM tasks WHERE done = 0";
                $resultsT = $db->mysql->query($queryT);
                if ($resultsT->num_rows) {
                    while ($row = $resultsT->fetch_array()) {
                        ?>
                        <li class="list-group-item "><?php print_r($row['task']); ?>
                            <a href="php/delTask.php?id=<?php print_r($row['id']); ?>">
                                <button type="button" name="del"
                                        class="btn btn-danger btn-xs pull-right margin-left delTask">
                                    <i class="fa fa-trash-o"></i></button>
                            </a>
                            <a href="php/updateTask.php?id=<?php print_r($row['id']); ?>&done=<?php print_r($row['done']);?>">
                                <button type="button" name="del" class="btn btn-success btn-xs pull-right updateTask margin-left">
                                    <i class="fa fa-check"></i></button></a>
                            <div class="pull-right">Prioridade: <?php print_r($db->getPriorityNameById($row['priority_id']));?></div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 done">
            <h3>List Done</h3>
            <ul class="list-group">
                <?php
                $queryD = "SELECT * FROM tasks WHERE done = 1";
                $resultsD = $db->mysql->query($queryD);
                if ($resultsD->num_rows) {
                    while ($row = $resultsD->fetch_array()) {
                        ?>
                        <li class="list-group-item list-group-item-success"><?php print_r($row['task']); ?>
                            <a href="php/delTask.php?id=<?php print_r($row['id']); ?>">
                                <button type="button" name="del"
                                        class="btn btn-danger btn-xs pull-right margin-left delTask">
                                    <i class="fa fa-trash-o"></i></button></a>
                            <a href="php/updateTask.php?id=<?php print_r($row['id']); ?>&done=<?php print_r($row['done']);?>">
                                <button type="button" name="del" class="btn btn-warning btn-xs pull-right margin-left updateTask">
                                    <i class="fa fa-check"></i></button></a>
                            <div class="pull-right">Prioridade: <?php print_r($db->getPriorityNameById($row['priority_id']));?></div>
                        </li>
                        <?php
                    }
                }

                $db->mysql->close();
                ?>
            </ul>
        </div>
    </div>
    <hr>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>

</html>

