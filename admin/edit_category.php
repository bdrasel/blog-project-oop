<?php require_once('header.php'); ?>

<?php

    require_once '../vendor/autoload.php';
    $category = new \App\classes\Category();

    $id = $_GET['id'];

    $result = $category->selectRow($id);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['updateCategory'])){
       $insert_msg = $category->updateCategory($_POST);
    }

?>

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <?php echo isset($_SESSION['message']) ? $_SESSION['message']:'' ?>
    <section class="card">
        <header class="card-header">
           <div class="row">
               <div class="col-md-6"> Category Update Form</div>
               <div class="col-md-6 text-right">
                   <a class="btn btn-info btn-sm" href="manage_category.php">Manage Category</a>
                </div>
           </div>
        </header>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="category_name " class="col-sm-4 col-form-label">Category Name </label>
                    <div class="col-sm-8">
                        <input type="hidden" name="id" value="<?= $row['id']?>">
                        <input type="text" class="form-control" name="category_name" required value="<?= $row['category_name']?>">
                    </div>
                </div>             
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="status" id="active" value="1" <?= $row['status'] == '1' ? 'checked':''  ?>>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="status" id="inactive" value="0" <?= $row['status'] == '0' ? 'checked':''  ?>>
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                                                   
                        </div>
                    </div>
                </fieldset>             
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" name="updateCategory" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </div>
</div>

<?php require_once('footer.php');?>