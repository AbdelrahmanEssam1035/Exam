<?php

namespace c42\EXAM\classes;

require_once 'validator.php';
interface validator
{
    public function check($name, $data);
}
