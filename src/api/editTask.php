<?php

$host = "localhost";
$dbName = "afazeres";
$user = "usuario";
$password = "12345";
$table = "tarefas";


try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST["id"];
    $editedTask = $_POST["tarefa_editada"];
    $list = $pdo->query("UPDATE tarefas 
        SET tarefa = '$editedTask'
        WHERE tarefa = '$id';
");

    $pdo = null;

    print $id;
    print 'Sucesso';
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage();
    die();
};

header("Location: {$_ENV["BASE_URL"]}/To-Do%20List/index.php");
