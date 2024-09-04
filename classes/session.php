<?php

namespace c42\EXAM\classes;


class session
{
    public function __construct()
    {
        session_start();
    }
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
    public function destroy()
    {
        session_destroy();
    }
}
