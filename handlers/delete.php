<?php
require_once '../inc/connection.php';
require_once '../App.php';
if ($request->check($request->get('id'))) {
    $id = $request->get('id');
    $query = "select * from products where id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $oldImage = mysqli_fetch_assoc($result)['image'];
        if (!empty($oldImage)) {
            unlink("../images/$oldImage");
        }
        $query = "delete from products where id=$id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $session->set("succcess", ["Data deleted successfully"]);
            $request->redirect("../index.php");
        } else {
            $session("errors", ["There were an error deleting this data"]);
            $request->redirect("../index.php");
        }
    } else {
        $session("errors", ["data not found"]);
        $request->redirect("../index.php");
    }
} else {
    $request->redirect("../index.php");
}
