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
// MySQL query that retrieves  all the tickets from the databse
$stmt = $pdo->prepare('SELECT * FROM tickets ORDER BY created DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Load the template header and title of each page -->
<?=template_header('Tickets')?>

<div class="container mt-3">
	<div class="col-12 mt-3 mb-3">
		<h2 class="mt-3 mb-3">Tickets</h2>

		<p>Please see your tickets below or create a new one.</p>
		<a href="create.php" class="btn btn-primary" role="button" >Create Ticket</a>
		<table class="table table-dark mt-3">
		<thead class="thead-dark">
      	<tr>
 	     	<th scope="col">Status</th>
    	  	<th scope="col">Title</th>
      		<th scope="col">Message</th>
			<th scope="col">Action</th>
      		<th scope="col">Time Stamp</th>
     	</tr>
 	</thead>
		
		<tbody>
		<!-- Foreach loop -->
		<?php foreach ($tickets as $ticket): ?>
		
		<!-- The status of the ticket.  It can be open, closed, or resolved -->
		<!-- Displays the corresponding fontawesome icon -->
		<tr>
			<td>
			  <?php if ($ticket['status'] == 'open'): ?>
				<i class="far fa-clock fa-2x"></i>
				<?php elseif ($ticket['status'] == 'resolved'): ?>
				<i class="fas fa-check fa-2x"></i>
				<?php elseif ($ticket['status'] == 'closed'): ?>
				<i class="fas fa-times fa-2x"></i>
				<?php endif; ?>	
			</td>
		
			<td>
			<!-- Ticket title -->		
			   <span class="title"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?></span>
		   </td>
		    <td> 
			<!-- Ticket Message -->		
			   <span class="msg"><?=htmlspecialchars($ticket['msg'], ENT_QUOTES)?></span>
			</td>
			
		    <td>
			<!-- Button to allow you to edit and view the selected ticket -->			
			   <a href="view.php?id=<?=$ticket['id']?>" class="btn btn-warning" role="button" >Edit</a>
			   
			<td>
			<!-- The timestamp of each ticket -->			
			<span class="con created"><?=htmlspecialchars($ticket['created'])?></span>
			</td>

		</a>
	</div>
		<?php endforeach; ?>
	</div>

</div>
</div>
<!-- Load the template footer of each page -->
<?=template_footer()?>
