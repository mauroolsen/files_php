<?php

namespace DAO;

use Models\User as User;

include_once('Models/User.php');

define('USERS_PATH', 'data/users.json');

class UserDAO
{
  public function getAll()
  {
    $users = $this->retrieve();
    foreach ($users as $user) {
      if ($user->disabled) {
        unset($user);
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
    foreach($users as $value){
      if($name == $value->name){
        $user = $value;
      }
    }
    return $user;
  }
  public function getByEmail($email)
  {
    $users = $this->getAll();
    $user = null;
    foreach($users as $value){
      if($email == $value->email){
        $user = $value;
      }
    }
    return $user;
  }

  private function validateUser($param1, $param2){
    if($param1->name == $param2->name && $param1->email == $param2->email)
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
          new User(
            $value['name'],
            $value['email'],
            $value['passHashed'],
            $value['disabled']
          )
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
      $user['name'] = $value->name;
      $user['email'] = $value->email;
      $user['passHashed'] = $value->passHashed;
      $user['disabled'] = false;
      array_push($arrayUsers, $user);
    }
    $jsonUsers = json_encode($arrayUsers, JSON_PRETTY_PRINT);
    file_put_contents(USERS_PATH, $jsonUsers);
  }
}
