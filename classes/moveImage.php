<?php

namespace c42\EXAM\classes;



class moveImage
{
    public function moveImage($img, $newName)
    {
        $tmpName = $img['tmp_name'];
        move_uploaded_file($tmpName, "../images/$newName");
    }
}
