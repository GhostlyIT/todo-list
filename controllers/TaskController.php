<?php 

class TaskController {
    public function actionEdit() {
        if (isset($_POST['editTask']) && isset($_POST['idTask'])) {
            $editTask = $_POST['editTask'];
            $idTask = $_POST['idTask'];
            Task::editTask($idTask, $editTask);
        }
        return true;
    }

    public function actionComplete() {
        if (isset($_POST['idTask'])) {
            $idTask = $_POST['idTask'];
            Task::completeTask($idTask);
        }
        return true;
    }
}

?>