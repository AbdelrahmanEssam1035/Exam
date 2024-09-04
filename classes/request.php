<?php

namespace c42\EXAM\classes;


class request
{
    public function get($key)
    {
        if (isset($_GET[$key])) return $_GET[$key];
        else return NULL;
    }
    public function post($key)
    {
        if (isset($_POST[$key])) return $_POST[$key];
        else return NULL;
    }
    public function files($key)
    {
        if (isset($_FILES[$key])) return $_FILES[$key];
        else return NULL;
    }
    public function check($data)
    {
        return isset($data);
    }
    public function clean($data)
    {
        return trim(htmlspecialchars($data));
    }
    public function checkMethod()
    {
        return $_SERVER('REQUEST_METHOD');
    }
    public function redirect($file)
    {
        header("location:$file");
    }
}
