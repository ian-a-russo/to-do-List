<?php

$host = "localhost";
$dbName = "afazeres";
$user = "usuario";
$password = "12345";
$table = "tarefas";
$task = $_POST["tarefa"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $post = $pdo->query("INSERT INTO $table (tarefa, estado) VALUES ('$task', 'Incompleto')");

    $pdo = null;

    print 'Sucesso';
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage();
    die();
};

header("Location: {$_ENV["BASE_URL"]}/To-Do%20List/index.php");
