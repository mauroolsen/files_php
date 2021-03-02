<?php

namespace DAO;

use Models\Post as Post;
use Interfaces\DAO as DAO;

include_once('./Models/Post.php');
include_once('interfaces/DAO.php');

define('POST_PATH', './data/posts.json');

class PostDAO implements DAO
{
  public function getAll()
  {
    $posts = $this->retrieve();
    foreach ($posts as $post) {
      if ($post->disabled) {
        unset($post);
      }
    }
    return $posts;
  }

  public function getByUser($username)
  {
    $posts = $this->getAll();
    foreach($posts as $post){
      if($username != $post->user)
        unset($post);
    }
    return $posts;
  }

  public function add($post)
  {
    $lastId = 0;
    $posts = $this->retrieve();

    if(false !== (end($posts))) 
      $lastId = end($posts)->id + 1;

    $uploadPath = './uploads/default/' . $post->user . '/' . $lastId . '/';
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
    foreach($posts as $post){
      if($post->id == $postId){
        $post->disabled = true;
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
          new Post(
            $value['user'],
            $value['image'],
            $value['text'],
            $value['likes'],
            $value['date'],
            $value['coments'],
            $value['id'],
            $value['disabled']
          )
        );
      }
    }
    return $posts;
  }
  
  private function save($data)
  {
    $arrayPosts = [];
    $post = [];
    if (!file_exists('data'))
      mkdir('data');
    foreach ($data as $value) {
      $post['user'] = $value->user;
      $post['image'] = $value->image;
      $post['text'] = $value->text;
      $post['likes'] = $value->likes;
      $post['date'] = $value->date;
      $post['coments'] = $value->coments;
      $post['id'] = $value->id;
      $post['disabled'] = $value->disabled;
      array_push($arrayPosts, $post);
    }
    $jsonPosts = json_encode($arrayPosts, JSON_PRETTY_PRINT);
    file_put_contents(POST_PATH, $jsonPosts);
  }
}
