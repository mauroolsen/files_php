<?php

namespace Controllers;

include_once('./Controllers/ViewController.php');
include_once('./Controllers/interfaces/Transform.php');
include_once('./Models/Post.php');
include_once('./DAO/PostDAO.php');

use Interfaces\Transform as Transform;
use Models\User as User;
use DAO\UserDAO as UserDAO;

class PostController
{
  private $dao;
  private $viewController;

  public function __construct()
  {
    $this->dao = new PostDAO();
    $this->viewController = new ViewController();
  }
}
