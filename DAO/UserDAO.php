<?php

namespace DAO;

use Models\User as User;
use Interfaces\DAO as DAO;
use Interfaces\Transform as Transform;

include_once('../Models/User.php');
include_once('interfaces/DAO.php');
include_once('interfaces/Transform.php');

define('USERS_PATH', '../data/users.json');

class UserDAO implements DAO, Transform
{
  public function getAll()
  {
    $users = $this->retrieve();
    foreach ($users as $key => $user) {
      if ($user->disabled) {
        unset($users[$key]);
      }
    }
    return $users;
  }
  public function add($user)
  {
    $users = $this->retrieve();
    $flag = 0;
    foreach ($users as $value) {
      if ($this->validateUser($user, $value)) {
        if ($value->disabled) { // if is disabled
          $user->disabled = true;
        }
        $flag = 1;
      }
    }
    if ($flag == 0)
      array_push($users, $user);
    $this->save($users);
  }
  public function delete($user)
  {
    $users = $this->retrieve();
    foreach ($users as $user) {
      $user->disabled = false;
    }
    $this->save($users);
  }
  public function getByName($name)
  {
    $users = $this->getAll();
    $user = null;
    foreach ($users as $value) {
      if ($name == $value->name) {
        $user = $value;
      }
    }
    return $user;
  }
  public function getByEmail($email)
  {
    $users = $this->getAll();
    $user = null;
    foreach ($users as $value) {
      if ($email == $value->email) {
        $user = $value;
      }
    }
    return $user;
  }

  private function validateUser($param1, $param2)
  {
    if ($param1->name == $param2->name && $param1->email == $param2->email)
      return true;
  }
  private function retrieve()
  {
    $data = [];
    $users = [];
    if (file_exists(USERS_PATH)) {
      $data = file_get_contents(USERS_PATH);
      $data = json_decode($data, true);
      foreach ($data as $value) {
        array_push(
          $users,
          $this->toObjet($value)
        );
      }
    }
    return $users;
  }
  private function save($data)
  {
    $arrayUsers = [];
    $user = [];
    if (!file_exists('data'))
      mkdir('data');
    foreach ($data as $value) {
      $user = $this->toArray($value);
      array_push($arrayUsers, $user);
    }
    $jsonUsers = json_encode($arrayUsers, JSON_PRETTY_PRINT);
    file_put_contents(USERS_PATH, $jsonUsers);
  }

  public function toArray($objet)
  {
    $value['name'] = $objet->name;
    $value['email'] = $objet->email;
    $value['passHashed'] = $objet->passHashed;
    $value['disabled'] = $objet->disabled;
    return $value;
  }

  public function toObjet($value)
  {
    return new User(
      $value['name'],
      $value['email'],
      $value['passHashed'],
      $value['disabled']
    );
  }
}
