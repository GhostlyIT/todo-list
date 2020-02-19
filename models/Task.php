<?php 
class Task {
    public function add($username, $email, $task) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO `task` (`username`, `email`, `task`) 
                VALUES (:username, :email, :task)';
        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':task', $task, PDO::PARAM_STR);
        $result->execute();

        return $result;
    }

    public function query() {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM task ORDER BY id_task DESC';
        $result = $db->prepare($sql);
        $result->execute();

        if ($result->rowCount()) {
            return $result;
        }

        return false;
    }

    public function editTask($idTask, $editTask) {
        $db = Db::getConnection();

        $sql = 'UPDATE task 
                SET task = :editTask,
                 edited = 1
                WHERE id_task = :idTask';
        $result = $db->prepare($sql);
        $result->bindParam(':editTask', $editTask, PDO::PARAM_STR);
        $result->bindParam(':idTask', $idTask, PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount()) {
            return $result;
        }

        return false;
    }

    public function completeTask($idTask) {
        $db = Db::getConnection();

        $sql = 'UPDATE task 
                SET `status` = 1,
                 edited = 1
                WHERE id_task = :idTask';
        $result = $db->prepare($sql);
        $result->bindParam(':idTask', $idTask, PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount()) {
            return $result;
        }

        return false;
    }


}
?>