<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Check if POST variable "title" exists, if not default the value to blank, basically the same for all variables
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    // Insert new record into the "polls" table
    $stmt = $pdo->prepare('INSERT INTO polls VALUES (NULL, ?, ?)');
    $stmt->execute([$title, $desc]);
    // Below will get the last insert ID, this will be the poll id
    $poll_id = $pdo->lastInsertId();
    // Get the answers and convert the multiline string to an array, so we can add each answer to the "poll_answers" table
    $answers = isset($_POST['answers']) ? explode(PHP_EOL, $_POST['answers']) : '';
    foreach ($answers as $answer) {
        // If the answer is empty there is no need to insert
        if (empty($answer)) continue;
        // Add answer to the "poll_answers" table
        $stmt = $pdo->prepare('INSERT INTO poll_answers VALUES (NULL, ?, ?, 0)');
        $stmt->execute([$poll_id, $answer]);
    }
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header("PHP Polls and Surveys - Create", "fas fa-vote-yea fa-2x")?>

<div class="container mt-5 mb-5">
	<h2>Create Poll</h2>

    <div class="container mt-5 mb-5" style="" id="wrapper">
    <div class="form-group mt-5 col-md-10"> 

        <form method="POST" action="create.php">
  



        <div class="col-md-10 mt-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="col-md-10 mt-3">
            <label for="desc" class="form-label">Description</label>
            <input type="text" name="desc" id="desc" class="form-control">
        </div>
        <div class="col-md-10 mt-3">
            <label for="answers" class="form-label">Answers (per line)</label>
            <textarea name="answers" id="answers" class="form control"></textarea>
            
        </div>
        <div class="col-md-10 mt-5 mb-5">
            
            <input type="submit" value="Create" class="btn btn-primary">
            <a class="btn btn-success" href="index.php">Home</a>
        </div>
    </div>
    </form>
    <div>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>