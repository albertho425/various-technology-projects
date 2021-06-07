<?php
include 'functions.php';

// read the contents of a file into a string
$todos = json_decode(file_get_contents('./todos.json'), true);
template_header(" To-Do-List with PHP and JSON ", "far fa-list-alt");

?>



<div class="container" style="padding: 100px">
  <!-- Form for entering a new to do -->
  <form action="newtodo.php" method="post" class="form-inline mb-5">
    <input type="text" name="todo_name" style="width: 75%" placeholder="Enter your todo" class="form-control">
    <button class="btn btn-primary">New Todo</button>

  </form>
  <br>
    <!-- Associative Array -->
    <?php foreach ($todos as $todoName => $todo): ?>
      <div style="margin-bottom: 20px;">
        <!-- Form for displaying a to do and it's checkbox for completion -->
        <form style="display: inline"  action="change_status.php" method="post" class="form-inline">

          <input type="hidden" name="todo_name"  class="form-control" style="width: 25%"
                 value="<?php echo $todoName ?>">
          <input type="checkbox" name="status"  class="form-control" style="width: 100px"
                  value="1" <?php echo($todo['completed'] ? 'checked' : '') ?>>
        </form>
          <?php echo $todoName ?>
        <form style="display: inline"action="delete.php" method="post" class="form-inline">

          <input type="hidden" name="todo_name"  class="form-control" style="width: 25%"
                  value="<?php echo $todoName ?>">

          <button class="btn btn-danger">Delete</button>
        </form>
        <form style="display: inline"action="edit.php" method="post" class="form-inline">

          <input type="hidden" name="todo_name"  class="form-control" style="width: 25%"
                  value="<?php echo $todoName ?>">
          <button class="btn btn-warning">edit</button>
          <input type="text" name="edit_todo_name"  placeholder="Edit" style="width: 100px" class="form-control">

        </form>

      </div>
    <?php endforeach; ?>
</div>

<script>
  const checkboxes = document.querySelectorAll('input[type=checkbox]');
  checkboxes.forEach(ch => {
    ch.onclick = function () {
      this.parentNode.submit()
    };
  })
</script>

<?php
template_footer();
?>
