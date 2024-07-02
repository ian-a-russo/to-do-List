<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="src/css/stylesheet.css">
</head>

<body>
    <form class="inserir" action="src/api/postInDataBase.php" method="post">
        <input class='incluir-tarefa' name="tarefa" id="tarefa" type="text" required placeholder="Insira sua tarefa">

        <button class="enviar" type="submit">Confirmar</button>
    </form>
    <div class="titulo-pendencias">
        <p text-over>Pendências</p>
    </div>
    <div class="pendencias">
        <ul class="incompleto">
            <?php
            require_once "src/api/listIncompleteTasksForDataBase.php";
            ?>
        </ul>
    </div>
    <div class="titulo-finalizados">
        <p>Finalizados</p>
    </div>
    <div class="finalizados">
        <ul class="completo">
            <?php
            require_once "src/api/listCompleteTasksForDataBase.php"
            ?>
        </ul>
    </div>
    </div>



    <?php
    require_once "src/api/editDialogTask.php"
    ?>

    <script>
        if (document.getElementById('confirmar-edicao') != null) {
            const confirmarEdicao = document.getElementById('confirmar-edicao').addEventListener("click", () => {
                confirmarEdicao.close();
            })
        }
    </script>
</body>

</html>