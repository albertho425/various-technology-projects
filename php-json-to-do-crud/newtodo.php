<?php

//  read the contents of a file into a string
//  get associative array
$todos = json_decode(file_get_contents('./todos.json'), true);


// when user clicks on new toDo
if (isset($_POST['todo_name'])){
    //assign new to do from the form
    $todoName = $_POST['todo_name'];
    //assign completed status to false since it's a new item
    $todos[$todoName] = ['completed' => false];
}

// read the contents of a file into a string
// JSON_PRETTY_PRINT for better readability
file_put_contents('./todos.json', json_encode($todos, JSON_PRETTY_PRINT));

header('Location: index.php');
