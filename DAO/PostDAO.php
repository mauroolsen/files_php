<?php

namespace DAO;

use Models\Post as Post;
use Interfaces\DAO as DAO;
use Models\Comment as Comment;

include_once('../Models/Post.php');
include_once('interfaces/DAO.php');
include_once('../Models/Comment.php');

define('POST_PATH', '../data/posts.json');

class PostDAO implements DAO
{
  public function getAll()
  {
    $posts = $this->retrieve();
    foreach ($posts as $key => $post) {
      if ($post->disabled) {
        unset($posts[$key]);
      }
    }
    return $posts;
  }

  public function getByUser($username)
  {
    $posts = $this->getAll();
    foreach ($posts as $key => $post) {
      if ($username != $post->user)
        unset($posts[$key]);
    }
    return $posts;
  }

  public function getById($id)
  {
    $res = null;
    $posts = $this->getAll();
    foreach ($posts as $post) {
      if ($id == $post->id)
        $res = $post;
    }
    return $res;
  }

  public function add($post)
  {
    $lastId = 0;
    $posts = $this->retrieve();

    if (false !== (end($posts)))
      $lastId = end($posts)->id + 1;

    $uploadPath = '../uploads/default/' . $post->user . '/' . $lastId . '/';
    if (!file_exists($uploadPath))
      mkdir($uploadPath, 0777, true); // creo mas de una carpeta

    $fileName = $post->image['tmp_name'];
    $targetfileName = basename($post->image['name']);
    $filePath = $uploadPath . $targetfileName;

    move_uploaded_file($fileName, $filePath);

    $post->image = $filePath;

    $post->id = $lastId;
    array_push($posts, $post);
    $this->save($posts);
  }

  public function delete($postId)
  {
    $posts = $this->retrieve();
    foreach ($posts as $post) {
      if ($post->id == $postId) {
        $post->disabled = true;
      }
    }
    $this->save($posts);
  }

  public function edit($value)
  {
    $posts = $this->getAll();
    foreach ($posts as $key => $post) {
      if ($post->id == $value->id) {
        $posts[$key] = $value;
      }
    }
    $this->save($posts);
  }

  private function retrieve()
  {
    $data = [];
    $posts = [];
    if (file_exists(POST_PATH)) {
      $data = file_get_contents(POST_PATH);
      $data = json_decode($data, true);
      foreach ($data as $value) {
        array_push(
          $posts,
          $this->toObject($value)
        );
      }
    }
    return $posts;
  }

  private function save($data)
  {
    $arrayPosts = [];
    if (!file_exists('data'))
      mkdir('data');
    foreach ($data as $value) {
      array_push($arrayPosts, $value->toArray());
    }
    $jsonPosts = json_encode($arrayPosts, JSON_PRETTY_PRINT);
    file_put_contents(POST_PATH, $jsonPosts);
  }

  public function toObject($value)
  {
    $arrayComments = [];
    if($value['comments']){
      foreach($value['comments'] as $comment){
        array_push(
          $arrayComments,
          new Comment($comment['user'], $comment['text'], $comment['date'])
        );
      }
    }
    return new Post(
      $value['user'],
      $value['image'],
      $value['text'],
      $value['likes'],
      $value['date'],
      $arrayComments,
      $value['id'],
      $value['disabled']
    );
  }
}
