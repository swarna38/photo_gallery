<?php
include 'includes/head.php';

//get data from
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];


    //check empty
if(empty($title) || empty($description) || !isset($image) || empty($image['name'])){
    echo "please fill in the all fields";
}else{
    //else part file upload processing 
    //check img have or not directory

    //Where to save the file indicate path
    $target_dir = 'assets/images/';

    //file image name 
    $file = $image['name'];

    //every each file create unique file name 
    $unique_name = uniqid() . $file;

    $target_file = $target_dir . $unique_name;
}

//File size must be under 5MB (5,000,000 bytes)
if($image['size'] > 5000000){
    echo "File size is to large";
}elseif(!in_array($image['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
    echo "Invalid file type. Only JPEG, PNG, and GIF allowed.";
}else{
    //file upload process
    if(move_uploaded_file($image['tmp_name'], $target_file)){

        //data insert  file 
        //now() present date and time store for upload_date;
        $sql = $pdo->prepare("insert into images (title, description, filename, upload_date) values (?, ?, ?, now())");

        //database save data
        $sql->execute([
            $title,
            $description,
            $unique_name,
        ]);
        header('Location:index_gallery.php');
    }else{
        echo "error uploading image";
    }
}
}
?>


<!-- from start==== -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="upload_gallery.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Image Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Image Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Select Image File</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
    </div>
</div>
<!-- from start==== -->


<?php
include 'includes/footer.php';
?>