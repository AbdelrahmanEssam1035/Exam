<?php

namespace c42\EXAM\classes;

require_once 'required.php';
require_once 'str.php';
require_once 'numeric.php';
require_once 'img.php';

class validation
{
    private $errors = [];
    public function validate($data, $name, $rules)
    {
        foreach ($rules as $rule) {
            $rule = "c42\EXAM\classes\\" . $rule;
            $obj = new $rule;
            $result = $obj->check($name, $data);
            if ($result != false) {
                $this->errors = $obj->check($name, $data);
            }
        }
    }
    public function errors()
    {
        return  $this->errors;
    }
}
