<?php

// for trouble shooting purposes
ini_set('display_errors', 1);
// for trouble shooting purposes
ini_set('display_startup_errors', 1);
// for trouble shooting purposes
error_reporting(E_ALL);


include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// Check if the ID param in the URL exists
if (!isset($_GET['id'])) {
    exit('No ID specified!');
}
// MySQL query that selects the ticket by the ID column, using the ID GET request variable
$stmt = $pdo->prepare('SELECT * FROM tickets WHERE id = ?');
$stmt->execute([ $_GET['id'] ]);
$ticket = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if ticket exists
if (!$ticket) {
    exit('Ticket ID is invalid!');
}

// Update status
if (isset($_GET['status']) && in_array($_GET['status'], array('open', 'closed', 'resolved'))) {
    // Prepare statment
    $stmt = $pdo->prepare('UPDATE tickets SET status = ? WHERE id = ?');
    // Execute statment
    $stmt->execute([ $_GET['status'], $_GET['id'] ]);
    // Re-direct
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}

// Check if the comment form has been submitted
if (isset($_POST['msg']) && !empty($_POST['msg'])) {
    // Insert the new comment into the "tickets_comments" table
    $stmt = $pdo->prepare('INSERT INTO tickets_comments (ticket_id, msg) VALUES (?, ?)');
    $stmt->execute([ $_GET['id'], $_POST['msg'] ]);
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM tickets_comments WHERE ticket_id = ? ORDER BY created DESC');
$stmt->execute([ $_GET['id'] ]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Ticket')?>

<div class="content view text-center">

	<h2><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?> <span class="<?=$ticket['status']?>">(<?=$ticket['status']?>)</span></h2>

    <div class="ticket">
        <p class="created"><?=htmlspecialchars($ticket['created'])?></p>
        <p class="msg"><?=nl2br(htmlspecialchars($ticket['msg'], ENT_QUOTES))?></p>
    </div>

    <div class="btns">
        <a href="index.php" class="btn blue">Home</a>
        <a href="view.php?id=<?=$_GET['id']?>&status=closed" class="btn red">Close Ticket</a>
        <a href="view.php?id=<?=$_GET['id']?>&status=resolved" class="btn">Resolve Ticket</a>
        
    </div>

    <div class="comments">
        <?php foreach($comments as $comment): ?>
        <div class="comment">
            <div>
                <i class="fas fa-comment fa-2x"></i>
            </div>
            <p>
            <span class="con created"><?=htmlspecialchars($ticket['created'])?></span>
                <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
            </p>
        </div>
        <?php endforeach; ?>
        <form action="" method="post">
            <textarea name="msg" placeholder="Enter your comment"></textarea>
            
            <div class="btns">
            <a href="index.php" class="btn blue" role="button" >Home</a>    
            <input type="submit" class="btn" value="Submit">
            
            </div>
            
        </form>
        

    </div>

</div>

<?=template_footer()?>
