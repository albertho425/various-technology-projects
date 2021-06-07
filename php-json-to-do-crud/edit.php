<?php


//delete old item
$todoName = $_POST['todo_name'];
$todos = json_decode(file_get_contents('./todos.json'), true);
unset($todos[$todoName]);
file_put_contents('./todos.json', json_encode($todos, JSON_PRETTY_PRINT));
header('Location: index.php');

//add new item
$todos = json_decode(file_get_contents('./todos.json'), true);
$todoName = $_POST['edit_todo_name'];
$todos[$todoName] = ['completed' => false];
file_put_contents('./todos.json', json_encode($todos, JSON_PRETTY_PRINT));
header('Location: index.php');
