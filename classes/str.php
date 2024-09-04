<?php

namespace c42\EXAM\classes;

require_once 'validator.php';

use c42\EXAM\classes\validator;

class str implements validator
{
    public function check($name, $data)
    {
        if (is_numeric($data)) {
            return ["$name must be string"];
        } else {
            return false;
        }
    }
}
