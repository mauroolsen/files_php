<?php

namespace Controllers;

include_once('./Controllers/ViewController.php');
include_once('./Controllers/interfaces/Transform.php');
include_once('./Models/Post.php');
include_once('./DAO/PostDAO.php');

use Interfaces\Transform as Transform;
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

  public function edit($post){
    $this->dao->edit($post);
    $this->viewController->showHomeView();
  }

  private function addPost($post){
    $this->dao->add($post);
  }
}
