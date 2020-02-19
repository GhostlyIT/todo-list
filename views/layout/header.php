<?php State::save(); ?>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="user-scalable=yes, width=760" />
    <title>Another TODO-List</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo PATH; ?>/template/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/template/css/datatables.css"/>

    
</head>
<body>
<main class="main">
<nav class="navbar navbar-dark bg-dark mb-5">
  <div class="row left">
    <a href="/"><h5 class="text-white ml-3">TODO List</h5></a>
  </div>
  <div class="row right">
  <?php 
  session_start();
  if (isset($_SESSION['login'])) { ?>
    <h4 class="text-white mr-2"><?php echo $_SESSION['login']; ?></h4>
    <a href="sign-out" class="btn btn-danger btn-lg active mr-3" role="button" aria-pressed="true">Sign out</a>
<?php
  } else { ?>
    <a href="sign-in" class="btn btn-primary btn-lg active mr-3" role="button" aria-pressed="true">Sign in</a>
<?php
  }
  ?>
  </div>
</nav>
    
