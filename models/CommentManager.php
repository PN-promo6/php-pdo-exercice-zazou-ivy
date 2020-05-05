<?php
include_once "PDO.php";

function GetOneCommentFromId($id)
{
  global $PDO; //pourquoi on fait appek à global PDO alors qu'on a un include ? parce que c'est à l'intérieur d'une fonction et on a besoin de faire appel a cette variable pour avoir accès aux données de las BDD
  $response = $PDO->query("SELECT * FROM comment WHERE id = " . $id);
  return $response->fetch();
}

function GetAllComments()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment ORDER BY created_at ASC");
  return $response->fetchAll(); //fetchAll veut dire récupère les moi tous
}

function GetAllCommentsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT comment.*, user.nickname "
      . "FROM comment LEFT JOIN user on (comment.user_id = user.id) "
      . "WHERE comment.user_id = $userId "
      . "ORDER BY comment.created_at ASC"
  );
  return $response->fetchAll();
}

function GetAllCommentsFromPostId($postId)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT comment.*, user.nickname FROM comment inner join user on comment.user_id = user.id WHERE comment.post_id = " . $postId
  );
  return $response->fetchAll();
}
