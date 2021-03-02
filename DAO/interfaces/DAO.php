<?php namespace Interfaces;

interface DAO{
  function getAll();
  function add($param);
  function delete($param);
}