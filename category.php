<?php 
    require_once 'vendor/autoload.php';
    $categories = new App\classes\Category();
    $category = $categories->allActiveCategory();
    $Category_id = $_GET['id'];
    $category_post = $categories->categoryPost($Category_id);

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

        <?php 
            while($row2 = mysqli_fetch_assoc($category_post)){ ?>

              <div class="card mb-4">
                <img class="card-img-top" src="uploads/<?= $row2['photo']?>" alt="Card image cap">
                <div class="card-body">
                  <h3 class="card-title"><?= $row2['title']?></h3>
                  <p class="card-text"><?=$row2['content']?></p>
                  <a href="post.php?id=<?= $row2['id']; ?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  Posted on <?= date('d M Y', strtotime($row2['createtime'])); ?> by
                  <a href="#"><?= $row2['name'];?></a>
                </div>
              </div>
        <?php }  ?>
      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>
      </div>
      <?php require_once 'widget.php'?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  