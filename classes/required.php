<?php

namespace c42\EXAM\classes;

require_once 'validator.php';

use c42\EXAM\classes\validator;

class required implements validator
{
    public function check($name, $data)
    {
        if (empty($data)) {
            return ["$name is required"];
        } else {
            return false;
        }
    }
}
