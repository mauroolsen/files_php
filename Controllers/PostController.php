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

  public function newPost($username, $img, $text)
  {
    $post = new Post($username, $img, $text);
    $this->addPost($post);
    $this->viewController->showHomeView();
  }

  public function getAll()
  {
    return $this->dao->getAll();
  }

  public function getByUser($username)
  {
    return $this->dao->getByUser($username);
  }

  public function getById($id)
  {
    return $this->dao->getById($id);
  }

  public function delete($id)
  {
    $post = $this->getById($id);
    if ($post) {
      if ($post->user == $_SESSION['user']['name']) {
        $this->dao->delete($id);
      }
    }
    $this->viewController->showHomeView();
  }

  public function edit($post, $toPost = false)
  { //$toPost redirecciona al post
    $this->dao->edit($post);
    if ($toPost)
      $this->viewController->showPostView($post->id);
    else
      $this->viewController->showHomeView();
  }

  public function comment($text, $post_id, $username)
  {
    $comment = new Comment($username, $text);
    $post = $this->getById($post_id);

    $comments = $post->comments;
    array_push($comments, $comment);
    $post->comments = $comments;

    $this->edit($post, true);
  }

  public function like($post_id, $username)
  {
    $post = $this->getById($post_id);
    if ($post) {
      $user_key = array_search($username, $post->likes);
      $likes = $post->likes;
      if ($user_key === false) {
        array_push($likes, $username);
        $post->likes = $likes;
      } else {
        unset($likes[$user_key]);
      }
      $post->likes = $likes;
      $this->edit($post, true);
    } else {
      $this->viewController->showHomeView();
    }
  }

  private function addPost($post)
  {
    $this->dao->add($post);
  }
}
