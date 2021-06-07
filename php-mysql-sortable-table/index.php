<?php
include ('functions.php');

// Below is optional, remove if you have already connected to your database.
 $servername = "localhost";
 $dbname = "mysql_study";
 $username = "phpman50";
 $password = "gunfight-partake-FEEL";

$mysqli = mysqli_connect("$servername", "$username", "$password", "$dbname");

//template header with title and icon
template_header(" PHP/MySQL Sortable Table", "fas fa-table fa-2x");


// these are the columns of which we can sort by in the database
$columns = array('name','games','points', 'rebounds', 'assists', 'steal', 'block', 'FG', '3P', 'FT', 'PER');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending order
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';



// Get the result from the database
if ($result = $mysqli->query('SELECT * FROM sortable_table_nba ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	
	// when the column is selected, the selected column will highlight
	$add_class = ' class="highlight"';
	?>
	<style>
	    .highlight {
       color: red;
    }
	</style>
	  
			<div class="container mt-5">
			<div class="container mt-5 text-center text-warning">
			<p class="text-center" style="color: white;">Golden State Warriors 2016-17 Season</p>
			<i class="fas fa-basketball-ball fa-2x" style="color: white;"></i>
			</div>
			<table class="table table-striped table-bordered table-hover table-dark mt-5 table-responsive-sm">
			    <thead class="thead-dark">
			     <t   
				<tr>
					<th scope="col"><a href="index.php?column=name&order=<?php echo $asc_or_desc; ?>">Name<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=games&order=<?php echo $asc_or_desc; ?>">Games<i class="fas fa-sort<?php echo $column == 'games' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=points&order=<?php echo $asc_or_desc; ?>">Points<i class="fas fa-sort<?php echo $column == 'points' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=rebounds&order=<?php echo $asc_or_desc; ?>">Rebounds<i class="fas fa-sort<?php echo $column == 'rebounds' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=assists&order=<?php echo $asc_or_desc; ?>">Assists<i class="fas fa-sort<?php echo $column == 'assists' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=steal&order=<?php echo $asc_or_desc; ?>">Steals<i class="fas fa-sort<?php echo $column == 'steal' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=block&order=<?php echo $asc_or_desc; ?>">Block<i class="fas fa-sort<?php echo $column == 'block' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=FG&order=<?php echo $asc_or_desc; ?>">FG %<i class="fas fa-sort<?php echo $column == 'FG' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=3P&order=<?php echo $asc_or_desc; ?>">3P %<i class="fas fa-sort<?php echo $column == '3P' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=FT&order=<?php echo $asc_or_desc; ?>">FT %<i class="fas fa-sort<?php echo $column == 'FT' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th scope="col"><a href="index.php?column=PER&order=<?php echo $asc_or_desc; ?>">PER<i class="fas fa-sort<?php echo $column == 'FT' ? '-' . $up_or_down : ''; ?>"></i></a></th>
				</tr>
				</thead>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $row['name']; ?></td>
					<td<?php echo $column == 'games' ? $add_class : ''; ?>><?php echo $row['games']; ?></td>
					<td<?php echo $column == 'points' ? $add_class : ''; ?>><?php echo $row['points']; ?></td>
					<td<?php echo $column == 'rebounds' ? $add_class : ''; ?>><?php echo $row['rebounds']; ?></td>
					<td<?php echo $column == 'assists' ? $add_class : ''; ?>><?php echo $row['assists']; ?></td>
					<td<?php echo $column == 'steal' ? $add_class : ''; ?>><?php echo $row['steal']; ?></td>
					<td<?php echo $column == 'block' ? $add_class : ''; ?>><?php echo $row['block']; ?></td>
					<td<?php echo $column == 'FG' ? $add_class : ''; ?>><?php echo $row['FG']; ?></td>
					<td<?php echo $column == '3P' ? $add_class : ''; ?>><?php echo $row['3P']; ?></td>
					<td<?php echo $column == 'FT' ? $add_class : ''; ?>><?php echo $row['FT']; ?></td>
					<td<?php echo $column == 'PER' ? $add_class : ''; ?>><?php echo $row['PER']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
		</div>
		<?php template_footer(); ?>
	<?php
	$result->free();
}
?>