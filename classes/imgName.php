<?php

namespace c42\EXAM\classes;

require_once '../App.php';
require_once 'validator.php';
class imgName
{
    public function isSetImageName($img)
    {
        return isset($img['name']) ? $img['name'] : null;
    }
}
