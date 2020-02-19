<?php

class SiteController {
	public function actionIndex() {
        $query = Task::query();

        // Creating new task
        $username = false;
        $email = false;
        $task = false;
        $errors = false;
        $success = false;
        if (isset($_POST['action'])) {
            if (isset($_POST['username']) && $_POST['username']) {
                $username = htmlspecialchars($_POST['username']);
            } else {
                $errors[] = 'You havent enter username.';
            }

            if(isset($_POST['email']) && $_POST['email']) {
                $email = htmlspecialchars($_POST['email']);
            } else {
                $errors[] = 'You havent enter email.';
            }

            if(isset($_POST['task']) && $_POST['task']) {
                $task = htmlspecialchars($_POST['task']);
            } else {
                $errors[] = 'You havent enter task.';
            }

            if (!$errors) {
                $addTask = Task::add($username, $email, $task);
                if ($addTask) {
                    $success[] = 'Task was successfully created.';
                    header( 'Refresh:2; URL=/' );
                } else {
                    $errors[] = 'Something went wrong :(';
                }
            }
        }

		require_once(ROOT . '/views/site/index.php');
		return true;
    }
    
    
}