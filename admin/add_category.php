<?php require_once('header.php'); ?>

<?php

    require_once '../vendor/autoload.php';
    $category = new \App\classes\Category();

    if(isset($_POST['addCategory'])){
       $insert_msg = $category->addCategory($_POST);
    }

?>

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <?php echo isset($insert_msg) ? $insert_msg:'' ?>
    <section class="card">
        <header class="card-header">
            Category Add Form
        </header>
        <div class="card-body">
            <form action="" method="post" id="myform">
                <div class="form-group row">
                    <label for="category_name " class="col-sm-4 col-form-label">Category Name </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="category_name" placeholder="Category Name" data-validataion="required">
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
                        <button type="submit" name="addCategory" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </div>
</div>

<?php require_once('footer.php');?>