<?php
require_once '../App.php';
require_once '../classes/imgName.php';
require_once '../classes/moveImage.php';

use c42\EXAM\classes\validate;
use c42\EXAM\classes\imgName;
use c42\EXAM\classes\moveImage;

$imgName = new imgName;

if ($request->check($request->post('submit'))) {
    $id = $request->get('id');
    $title = $request->clean($request->post('title'));
    $body = $request->clean($request->post('body'));
    $price = $request->clean($request->post('price'));
    $validation->validate($title, "title", ["required", "str"]);
    $validation->validate($body, "body", ["required", "str"]);
    $validation->validate($price, "price", ["required", "numeric"]);
    $img = $request->files('image');
    $imageName = $img['name'];
    if ($request->check($request->files('image')) && $request->check($imgName->isSetImageName($request->files('image')))) {
        $imageExtention = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $validation->validate($img, "image", ["required", "img"]);
        $errors = $validation->errors();
        $imageNewName = uniqid() . "." . $imageExtention;
    } else {
        $imageNewName = $oldImage;
    }
    if (empty($errors)) {
        $query = "update products set `title`='$title', `body`='$body', `price`='$price', `img`='$imageNewName' where id='$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if ($request->check($request->files('image')) && $request->check($imgName->isSetImageName($request->files('image')))) {
                $moveImage->moveImage($img, $imageNewName);
            }
            $session->set("succcess", ["Data updated successfully"]);
            $request->redirect("../index.php");
        } else {
            $session("errors", ["There were an error updating this data"]);
            $request->redirect("../edit.php?id=$id");
        }
    } else {
        $request->redirect("../edit.php?id=$id");
        $session("errors", $errors);
    }
} else {
    $request->redirect("../index.php");
}
