<?php require_once('header.php'); ?>

<?php

    require_once '../vendor/autoload.php';
    $category = new \App\classes\Category();
    $blog = new \App\classes\Blog();

   $activeCategory = $category->allActiveCategory();

    if(isset($_POST['addBlog'])){
       $insert_msg = $blog->addBlog($_POST);
    }

?>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <?php echo isset($insert_msg) ? $insert_msg:'' ?>
    <section class="card">
        <header class="card-header">
            Blog Add Form
        </header>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="category_id " class="col-sm-4 col-form-label">Category</label>
                    <div class="col-sm-8">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php while($row = mysqli_fetch_assoc($activeCategory)){ ?>

                                <option value="<?= $row['id'];?>"><?= $row['category_name'];?></option>
                            <?php }  ?>
                           
                        </select>
                    </div>
                </div>   
                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label">Blog Title </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" required placeholder="Blog Title">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label">Blog Details </label>
                    <div class="col-sm-8">
                        <textarea name="details" class="summernote"></textarea>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="image" class="col-sm-4 col-form-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>                 
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="status" id="active" value="1">
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="status" id="inactive" value="0">
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                                                   
                        </div>
                    </div>
                </fieldset>             
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" name="addBlog" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </div>
</div>

<?php require_once('footer.php');?>