<?php include 'inc/header.php';
require_once 'App.php';

use c42\EXAM\inc\connection;

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
        $session->destroy();
        // $session->remove("success");
        // $session->remove("errors");

    ?>

    <div class="row">



        <?php
        // echo $session->get("ext");
        $query = "select * from products";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            $msg = "No products available";
        }
        if (!empty($products)) {
            foreach ($products as $product) {
        ?>
                <div class="col-lg-4 mb-3">



                    <div class="card">
                        <img src="images/<?php echo $product['img'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['title'] ?></h5>
                            <p class="text-muted"><?php echo $product['price'] ?> EGP</p>
                            <p class="card-text"><?php echo $product['body'] ?></p>
                            <a href="show.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Show</a>
                            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="handlers/delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>

                        </div>
                    </div>

                </div>
        <?php }
        } else echo $msg; ?>

    </div>

</div>



<?php include 'inc/footer.php'; ?>