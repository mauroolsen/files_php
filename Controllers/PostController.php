<?php

namespace Controllers;

include_once('../Controllers/ViewController.php');
include_once('../Models/Post.php');
include_once('../DAO/PostDAO.php');
include_once('../Models/Comment.php');

use Models\Comment as Comment;
use Models\Post as Post;
use DAO\PostDAO as PostDAO;

class PostController
{
  private $dao;
  private $viewController;

  public function __construct()
  {
    $this->dao = new PostDAO();
    $this->viewController = new ViewController();
  }

  public function newPost($username, $img, $text){
    $post = new Post($username, $img, $text);
    $this->addPost($post);
    $this->viewController->showHomeView();
  }

  public function getAll(){
    return $this->dao->getAll();
  }

  public function getByUser($username){
    return $this->dao->getByUser($username);
  }

  public function getById($id){
    return $this->dao->getById($id);
  }

  public function delete($id){
    $post = $this->getById($id);
    if($post){
      if($post->user == $_SESSION['user']['name']){
        $this->dao->delete($id);
      } 
    }
    $this->viewController->showHomeView();
  }

  public function edit($post, $toPost = false){ //$toPost redirecciona al post
    $this->dao->edit($post);
    if($toPost)
      $this->viewController->showPostView($post->id);
    else
      $this->viewController->showHomeView();
  }

  public function comment($text, $post_id, $username){
    $comment = new Comment($username, $text, date('l jS \of F Y h:i A'));
    $post = $this->getById($post_id);

    // modificar __set()
    $comments = $post->comments; 
    array_push($comments, $comment);
    $post->comments = $comments;

    $this->edit($post, true);
  }

  public function like($post_id, $username){
    $post = $this->getById($post_id);
    if($post && array_search($username, $post->likes) === false){
      $likes = $post->likes;
      array_push($likes, $username);
      $post->likes = $likes;
      $this->edit($post);
    }else{
      $this->viewController->showHomeView();
    }
  }

  private function addPost($post){
    $this->dao->add($post);
  }
}
