<?php 
    require_once 'vendor/autoload.php';
    $categories = new App\classes\Category();

      $category = $categories->allActiveCategory();

      $getId = $_GET['id'];

     $singlePost = $categories->singlePost($getId);
     $post = mysqli_fetch_assoc($singlePost);
    


?>

<?php require_once 'header.php'?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="uploads/<?= $post['photo']?>" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title"><?=  $post['title']?></h3>
                <p class="card-text"><?=  $post['content']?></p>
                <a href="post.php?id=<?=  $post['id']; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on <?= date('d M Y', strtotime( $post['createtime'])); ?> by
                <a href="#"><?=  $post['name'];?></a>
            </div>
         </div>

      
      </div>

      <?php require_once 'widget.php'?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  