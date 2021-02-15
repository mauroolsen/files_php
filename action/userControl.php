<?php
define('DATA_PATH', 'data/users.json');

function getUsers()
{
  $users = [];
  if (file_exists(DATA_PATH)) {
    $users = file_get_contents(DATA_PATH);
    $users = json_decode($users, true);
  }
  return $users;
}

function setUser($user)
{
  $users = getUsers();
  $user['pass'] = password_hash($user['pass'], PASSWORD_DEFAULT);
  array_push($users, $user);
  $jsonUsers = json_encode($users, JSON_PRETTY_PRINT);
  file_put_contents(DATA_PATH, $jsonUsers);
}

function isUsuario($user)
{
  $users = getUsers();
  $names = array_column($users, 'username');
  $response = [];
  $key = array_search($user['username'], $names);
  if ($key!==false) {
    $response = ($users[$key]);
  }
  return $response;
}

function createUser(array $user)
{
  $response = false;
  if (file_exists(DATA_PATH)) {
    if (!isUsuario($user)) {
      $response = (setUser($user) == false) ?: true;
    }
  } else {
    $response = (setUser($user) == false) ?: true;
  }
  return $response;
}
