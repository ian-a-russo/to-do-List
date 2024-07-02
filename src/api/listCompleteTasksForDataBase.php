<?php

$host = "localhost";
$dbName = "afazeres";
$user = "usuario";
$password = "12345";
$table = "tarefas";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $list = $pdo->query("SELECT * FROM $table WHERE estado='Completo'");


    while ($row = $list->fetch(PDO::FETCH_ASSOC)) {

        $id = "{$row['tarefa']}";

        echo
        "<li class='afazeres' data-id='$id'> {$row['tarefa']}
        <form style='display:inline;' action='' method='post'>
            <input type='hidden' name='id' value='{$row['tarefa']}'>
            <input type='hidden' name='action' value='confirmar'>
            <input type='button' class='confirmar' value='✔️' readonly>
        </form>";
    };
    $pdo = null;
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage();
    die();
};
