<?php

namespace Interfaces;

interface Transform
{
  function toArray($objet);
  function toObject(array $array);
}
