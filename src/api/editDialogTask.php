<?php
if (isset($_POST['edit_button'])) {
    $id = $_POST['id'];
    echo "<dialog open>
                <form action='src/api/editTask.php' method='post'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='hidden' name='action' value='editar'>
                    <label for='tarefa_editada'>Edite sua tarefa: </label>
                    <input name='tarefa_editada' id='tarefa_editada' type='text' value='$id'required>

                    <button class='enviar' id='confirmar-edicao' type='submit'>Confirmar</button>
                </form>
              </dialog>";
}
