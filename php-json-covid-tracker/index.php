<?php 
include "data.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Tracker</title>
</head>



<body>

  <div class="jumbotron text-center">
    <h1 class="display-4">Covid-19 Tracker</h1>
    <p class="lead">Let's stay safe and be kind to one another</p>
    <hr class="my-4">
    <p>Please take care of yourself and your loved ones</p>
  </div>

<div class="container fluid my-5">
<div class="row">

<div class="col-sm">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
 <div class="card-header">

    <!-- Icon -->
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
    </svg>

 </div>
 <div class="card-body"><h5>Confirmed</h5>
   <p class="card-text"><?php echo $total_confimred;?></p>
 </div>
</div>
</div>
<div class="col-sm">
<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
 <div class="card-header">

    <!-- Icon -->
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
    </svg>
 </div>
 <div class="card-body">
   <h5 class="card-title">Fatalities</h5>
   <p class="card-text"><?php echo $total_deaths;?></p>
 </div>
</div>
</div>
<div class="col-sm">
<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
 <div class="card-header">

    <!-- Icon -->
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-emoji-smile" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
    <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
    </svg>

 </div>
 <div class="card-body">
   <h5 class="card-title">Recovered</h5>
   <p class="card-text"><?php echo $total_recovered_percent;?>%</p>
 </div>
</div>
</div>

<div class="col-sm">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
 <div class="card-header">
    <!-- Icon -->
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-calendar2-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
    </svg>

 </div>
 <div class="card-body">
   <h5 class="card-title">Updated</h5>
   <p class="card-text"><?php echo $date_updated;?></p>
 </div>
</div>
</div>

</div>
     </div>

        <div class="continaer fluid">
            <div class="table-responsive">

            <table class="table table-striped table-active table-hover table-hover">
            <thead class="bg-info">
                <tr>
                    <th scope="col">Countries</th>
                    <th scope="col">Infected</th>
                    <th scope="col">Fatalities</th>
                    <th scope="col">Recovered</th>
                    <th scope="col">Recovery %</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($data as $key => $value){
                            $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                            $increaseDeath = $value[$days_count]['deaths'] - $value[$days_count_prev]['deaths'];
                            $increaseRecovered = $value[$days_count]['recovered'] - $value[$days_count_prev]['recovered'];
                            $recPercent = (int)($value[$days_count]['recovered'] / $value[$days_count]['confirmed'] * 100);

                ?>
                    <tr>
                        <th><?php echo $key?></th>
                        <td><?php echo $value[$days_count]['confirmed'];?>

                         <!-- Only display if greater than 0 -->
                         <?php if($increase !=0){?>
                            <small class="text-danger p1-3"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>
                                <?php } ?>
                        </td>


                        <td><?php echo $value[$days_count]['deaths'];?>

                        <!-- Only display if greater than 0 -->
                        <?php if($increaseDeath !=0){?>
                            <small class="text-danger p1-3"><i class="fas fa-arrow-up"></i><?php echo $increaseDeath;?></small>
                                <?php } ?>
                        </td>
                        <td><?php echo $value[$days_count]['recovered'];?>

                        <!-- Only display if greater than 0 -->
                        <?php if($increaseRecovered !=0){?>
                            <small class="text-success p1-3"><i class="fas fa-arrow-up"></i><?php echo $increaseRecovered;?></small>
                                <?php } ?>

                        <td><?php echo $recPercent?>%</td>

                <?php }?>

            </tbody>

        </table>
            </div>

        </div>
    </div>

<!-- footer -->
<?php include "footer.php"; ?>

</body>
</html>
