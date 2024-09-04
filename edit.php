<?php include 'inc/header.php';
require_once 'App.php';

if ($request->check($request->get('id'))) {
    $id = $request->get('id');
    $query = "select * from products where id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $product = mysqli_fetch_assoc($result);
    } else {
        $msg = "No such product were found";
    }
    if (!empty($product)) {


?>

        <div class="container my-5">
        <?php 
        if($request->check($session->get("succcess"))){
            foreach($session->get("succcess") as $success){
                echo $success;
            }
        }elseif($request->check($session->get("errors"))){
            foreach($session->get("errors") as $error){
                echo $error;
            }
        }
        // $session->remove("success");
        // $session->remove("errors");
        $session->destroy();
    ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">


                    <form action="handlers/edit.php?id=<?php echo $product['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image:</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>

                        <div class="col-lg-3">
                            <img src="images/<?php echo $product['img'] ?>" class="card-img-top">
                        </div>

                        <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
                    </form>
                </div>
            </div>
        </div>

<?php } else echo $msg;
} else $request->redirect("index.php"); ?>

<?php include 'inc/footer.php'; ?>