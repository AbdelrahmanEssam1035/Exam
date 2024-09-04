<?php

namespace c42\EXAM\classes;

use  c42\EXAM\inc\connection;

require_once 'validator.php';


class img implements validator
{
    private $errors = [];
    public function check($name, $data)
    {
        $imageName = $data['name'];
        $imageTmpName = $data['tmp_name'];
        $imageExtention = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $imageError = $data['error'];
        // $imageSize = $data['size'] / 1024 * 1024;
        if ($imageError != 0) {
            $errors[] = "There was an error uploading the image";
        }
        // if ($imageSize > 1) {
        //     $errors[] = "The image is large-sized";
        // }
        if (!in_array($imageExtention, ["png", "jpg", "jpeg"])) {
            $errors[] = "The image must be bng, jpg, or jpeg";
        }
        if (empty($errors)) {
            return false;
        } else {
            return $errors;
        }
    }
}
