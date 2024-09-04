<?php
require_once '../App.php';
require_once '../classes/imgName.php';
require_once '../classes/moveImage.php';

use c42\EXAM\classes\validate;
use c42\EXAM\classes\imgName;
use c42\EXAM\classes\moveImage;

$imgName = new imgName;
if ($request->check($request->post('submit'))) {
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
        $validation->validate($img, "img", ["required", "img"]);
        $errors = $validation->errors();
        $imageNewName = uniqid() . "." . $imageExtention;
    }
    if (empty($errors)) {
        $query = "insert into products(`title`,`body`,`price`,`img`) values('$title','$body','$price','$imageNewName')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if ($request->check($request->files('image')) && $request->check($imgName->isSetImageName($request->files('image')))) {
                $moveImage->moveImage($img, $imageNewName);
            }
            $session->set("succcess", ["Data inserted successfully"]);
            $request->redirect("../index.php");
        } else {
            $session("errors", ["There were an error inserting this data"]);
            $request->redirect("../add.php");
        }
    } else {
        $request->redirect("../add.php");
        $session("errors", $errors);
    }
} else {
    $request->redirect("../add.php");
}
