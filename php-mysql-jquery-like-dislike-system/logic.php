<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', 'root', 'maplesyrupweb');

// for learning and demonstraiton purposes, and times sake,
// lets assume a user is logged in with id $user_id of 2
$user_id = 2;

if (!$conn) {
  die("Error connecting to database: " . mysqli_connect_error($conn));
  exit();
}
//*******************************************************************************************************************************
// if user clicks like or dislike button on a post
// notice each case has a corresponting SQL query
// notice also for each case, it will break after executing
if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
     case 'like':
         $sql="INSERT INTO likes_dislikes_ratings (user_id, post_id, rating_action)
               VALUES ($user_id, $post_id, 'like')
               ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
     case 'dislike':
          $sql="INSERT INTO likes_dislikes_ratings (user_id, post_id, rating_action)
               VALUES ($user_id, $post_id, 'dislike')
               ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
     case 'unlike':
         $sql="DELETE FROM likes_dislikes_ratings WHERE user_id=$user_id AND post_id=$post_id";
         break;
     case 'undislike':
           $sql="DELETE FROM likes_dislikes_ratings user_id=$user_id AND post_id=$post_id";
      break;
     default:
        break;
  } // closing brack for switch

  // execute query to effect changes in the database ...
  mysqli_query($conn, $sql);
  echo getRating($post_id);
  exit(0);
} // closing bracket for if (isset($_POST['action']))
//*******************************************************************************************************************************
// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM likes_dislikes_ratings
          WHERE post_id = $id AND rating_action='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}
//*******************************************************************************************************************************
// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM likes_dislikes_ratings
          WHERE post_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}
//*******************************************************************************************************************************
// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();
  // notice that we are performing two queries here
  $likes_query = "SELECT COUNT(*) FROM likes_dislikes_ratings WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM likes_dislikes_ratings
                 WHERE post_id = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
     'likes' => $likes[0],
     'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}
//*******************************************************************************************************************************
// Check if user already likes post or not
function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM likes_dislikes_ratings WHERE user_id=$user_id
          AND post_id=$post_id AND rating_action='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
     return true;
  }else{
     return false;
  }
}
//*******************************************************************************************************************************
// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM likes_dislikes_ratings WHERE user_id=$user_id
          AND post_id=$post_id AND rating_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
     return true;
  }else{
     return false;
  }
}

$sql = "SELECT * FROM likes_dislikes_posts";
$result = mysqli_query($conn, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//*******************************************************************************************************************************
