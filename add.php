<?php include 'inc/header.php';
include 'App.php';

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
        // $session->remove("success");
        // $session->remove("errors");
        $session->destroy();
    ?>

    <div class="row">
        <div class="col-lg-6 offset-lg-3">


            <form action="handlers/add.php" method="post" enctype="multipart/form-data">
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
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>