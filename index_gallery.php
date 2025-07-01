<?php
include 'includes/head.php';

$sql = "select * from images order by upload_date desc";
$sql = $pdo->query($sql);
$show_images = $sql->fetchAll();
?>

<div class="container my-5 text-center">
    <div class="display-4">Photo Gallery</div>
</div>
<div class="row my-5">
    <?php foreach($show_images as $image){ ?>

    <div class="card me-4" style="width: 18rem;">
        <img src="assets/images/<?php echo htmlspecialchars($image['filename']); ?>" class="card-img-top mt-3" alt="<?php echo htmlspecialchars($image['title']); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($image['title']) ?></h5>
            <p class="text-muted small">Uploaded on : <?php echo date("F J,Y" , strtotime($image['upload_date'])) ?></p>
            <p class="card-text"> <?php echo htmlspecialchars($image['description']) ?> </p>
        </div>
    </div>  

    <?php } ?>
</div>

<?php
include 'includes/footer.php';
?>