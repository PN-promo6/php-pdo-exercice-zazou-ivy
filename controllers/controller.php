<?php

$action = isset($_GET["action"]) ? $_GET["action"] : null;

switch ($action) {

  case 'register':
    // code...
    break;

  case 'login':
    // code...
    break;

  case 'display':
  default:
    include "../models/PostManager.php";
    $posts = GetAllPosts();

    if (isset($_GET["query"])) {
      $query = $_GET["query"];
      $posts = GetPostsLike($query);
    }

    include "../models/CommentManager.php";
    $comments = array();

    foreach ($posts as $onePost) {

      $idPost = $onePost['id'];
      $comments[$idPost] = GetAllCommentsFromPostId($idPost);
    }
    include "../views/DisplayPosts.php";
    break;
}
