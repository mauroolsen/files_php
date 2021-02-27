<?php

namespace Interfaces;

interface Transform
{
  function toArray($objet);
  function toObjet(array $array);
}
