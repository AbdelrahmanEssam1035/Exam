<?php include 'inc/header.php';
require_once 'App.php';

if ($request->check($request->get('id'))) {
    $id = $request->get('id');
    $query = "select * from products where id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $product = mysqli_fetch_assoc($result);
    } else {
        $msg = "No product were found";
    }
    if (!empty($product)) {


?>




        <div class="container my-5">

            <div class="row">


                <div class="col-lg-6">
                    <img src="images/<?php echo $product['img'] ?>" class="card-img-top">
                </div>
                <div class="col-lg-6">
                    <h5><?php echo $product['title'] ?></h5>
                    <p class="text-muted"><?php echo $product['price'] ?> EGP</p>
                    <p><?php echo $product['body'] ?></p>
                    <a href="index.php" class="btn btn-primary">Back</a>
                    <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
                    <a href="handlers/delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>

<?php } else echo $msg;
} else $request->redirect("index.php"); ?>

<?php include 'inc/footer.php'; ?>