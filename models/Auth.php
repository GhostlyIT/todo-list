<?php

class Auth {
    public function signIn ($login, $pass) {
        $db = Db::getConnection();

        $sql = 'SELECT *
                FROM `users`
                WHERE `login` = :login
                AND `pass` = :pass';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->execute();

        if ($result->rowCount()) {
            return $result;
        }

        return false;
    }
}

?>