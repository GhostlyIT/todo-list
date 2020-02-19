<?php include (ROOT . '/views/layout/header.php'); ?>
<div class="container">

<div class="row">
    <div class="col s12 text-center">
        <h1>Sign in</h1>
    </div>
</div>

<?php
    if ($errors) { ?>
        <div class="alert alert-danger" role="alert">
            <?php
            for ($i = 0; $i < count($errors); $i++) {
                echo $errors[$i] . '<br>';
            }
            ?>
        </div>
    <?php }
    if ($success) { ?>
        <div class="alert alert-success" role="alert">
            <?php
            for ($i = 0; $i < count($success); $i++) {
                echo $success[$i] . '<br>';
            }
            ?>
        </div>
        <?php
    } 
?>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input type="text" class="form-control" placeholder="Enter login" name="login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pass">
  </div>
  <input type="hidden" name="action" value="action">
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

</div>
<?php include (ROOT . '/views/layout/footer.php'); ?>