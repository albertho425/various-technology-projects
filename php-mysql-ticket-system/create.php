<?php

// for trouble shooting purposes
ini_set('display_errors', 1);
// for trouble shooting purposes
ini_set('display_startup_errors', 1);
// for trouble shooting purposes
error_reporting(E_ALL);


include 'functions.php';
$pdo = pdo_connect_mysql();
// Output message variable
$msg = '';
// Check if POST data exists (user submitted the form)
if (isset($_POST['title'], $_POST['email'], $_POST['msg'])) {
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['title']) || empty($_POST['email']) || empty($_POST['msg'])) {
        $msg = 'Form is empty, please check the form';
    // Validatin check, use PHP built-in email validation
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $msg = 'Please enter a valid email!';
    } else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO tickets (title, email, msg) VALUES (?, ?, ?)');
        $stmt->execute([ $_POST['title'], $_POST['email'], $_POST['msg'] ]);
        // Redirect to the view ticket page, the user will see their created ticket on this page
        header('Location: view.php?id=' . $pdo->lastInsertId());
    }
}
?>

<?=template_header('Create Ticket')?>

 <div class="container col-10 mt-3">
    
	<h2>Create a new ticket</h2>
    <form action="create.php" method="post">
        
        <div class="form-group mt-5">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Required" id="title" required>
        </div>
        
        <div class="form-group mt-5"
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Required" id="email" required>
        </div>
        
        <div class="form-group mt-5">
        <label for="msg">Message</label>
            <input type="text" name="msg" placeholder="Required" id="msg" required>
            
        </div>
        <div class="form-group mt-5">
            <input type="submit" role="button" class="btn btn-primary" value="Create Ticket">
        </div>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
