<?php include (ROOT . '/views/layout/header.php'); ?>
<div class="container">
<div class="row">
    <div class="col s12 text-center">
        <h1>Current tasks</h1>
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


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>  
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Task</th>
      <th scope="col">Status</th>
      <?php 
      if (isset($_SESSION['login'])) { ?>
        <th scope="col">Complete button</th>
      <?php  
      }
      ?>
    </tr>
  </thead>
  <tbody class="query-result">
    <?php 
    if ($query) {
        while ($row = $query->fetch()) { ?>
            <tr id="<?php echo $row['id_task']; ?>" <?php if($row['status'] == 1) { ?> class="table-success" <?php } ?>>
                <td><?php echo $row['id_task']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['task'] . "<br>"; 
                if (isset($_SESSION['login'])) { ?>
                    <button type="button" class="btn btn-primary btn-sm mt-2 edit">Edit</button>
                <?php
                }?></td>
                <td class="status"><?php if($row['status'] == 0) echo 'In progress'; else echo 'Completed'; if($row['edited'] == 1) echo ' (edited by administrator)';?></td>
                <?php 
                if (isset($_SESSION['login'])) { ?>
                <td>
                    <?php 
                    if ($row['status'] == 0) { ?>
                        <button type="button" class="btn btn-primary btn-sm mt-2 complete">Completed</button>
                    <?php
                    }
                    ?>
                
                </td>
                <?php
                }
                ?>
            </tr>
        <?php    
        } 
    }
    ?>
  </tbody>
</table>


<div class="row create-task">
    <div class="col s12">
    <h1 class="text-center">Create new task</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Enter username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email">Enter email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="task">Describe your task</label>
                <textarea class="form-control" name="task" placeholder="Task" rows="3"></textarea>
            </div>
            <input type="hidden" name="action" value="action">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>

</div>
<?php include (ROOT . '/views/layout/footer.php'); ?>