<?php

    // is the preferred way to read the contents of a file into a string. 
    $covidJsonData = file_get_contents("https://pomber.github.io/covid19/timeseries.json");

    // convert json into an associative array
    $data = json_decode($covidJsonData, true);

    
    foreach($data as $key => $value) {

        $days_count = count($value)-1;
        $days_count_prev = $days_count-1;
    }

    $total_confimred = 0;
    $total_recovered = 0;
    $total_deaths = 0;
    $date_updated = $value[$days_count]['date'];


    // get properties of the given object
    // $array = get_object_vars($json->entries[0]);


    foreach($data as $key => $value) {

        //add the total values of each of confirmed, recovered, death
        $total_confimred = $total_confimred + $value[$days_count]['confirmed'];
        $total_recovered = $total_recovered + $value[$days_count]['recovered'];
        $total_deaths = $total_deaths + $value[$days_count]['deaths'];

    }

    $total_recovered_percent = (int)($total_recovered / $total_confimred * 100);

?>
