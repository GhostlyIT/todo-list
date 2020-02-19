<?php 

class AuthController {
    public function actionIndex () {
        $login = false;
        $pass = false;
        $errors = false;
        $success = false;
        if (isset($_POST['action'])) {
            if (isset($_POST['login']) && $_POST['login']) {
                $login = $_POST['login'];
            } else {
                $errors[] = 'You havent entered login.';
            }

            if (isset($_POST['pass']) && $_POST['pass']) {
                $pass = $_POST['pass'];
            } else {
                $errors[] = 'You havent entered password.';
            }

            if (!$errors) {
                $signIn = Auth::signIn($login, $pass);
                if ($signIn) {
                    $_SESSION['login'] = $login;
                    $success[] = ' Login successfull.';
                    header( 'Refresh:2; URL=/' );
                } else {
                    $errors[] = 'Invalid login or password.';
                }
            }
        }

        require_once(ROOT . '/views/auth/index.php');
		return true;
    }

    public function actionSignOut () {
        session_destroy();
        header('Location: /');
        return true;
    }
}

?>