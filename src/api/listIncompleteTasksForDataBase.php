<?php

$host = "localhost";
$dbName = "afazeres";
$user = "usuario";
$password = "12345";
$table = "tarefas";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $list = $pdo->query("SELECT * FROM $table WHERE estado='Incompleto'");

    while ($row = $list->fetch(PDO::FETCH_ASSOC)) {

        $id = "{$row['tarefa']}";
        echo
        "<li class='afazeres' data-id='$id'> $id
        <form style='display:inline;' action='src/api/confirmTask.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='action' value='confirmar'>
            <button type='submit' class='confirmar'>❌</button>
        </form>
        <form style='display:inline;' action='' method='post'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='action' value='editar'>
            <button type='submit' name='edit_button' class='editar'>✏️</button>
        </form>
        <form style='display:inline;' action='src/api/deleteTaskForDataBase.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='action' value='deletar'>
            <button type='submit' class='deletar'>🗑️</button>
        </form>
        <br/>  
    </li>";
    };
    $pdo = null;
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage();
    die();
};
