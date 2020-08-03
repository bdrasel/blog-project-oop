<?php require_once('header.php');?>

<?php 
      require_once '../vendor/autoload.php';
      $categories = new \App\classes\Category();
  
      $category = $categories->allCategory();


?>
    
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                All Category Information
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>S1 No</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sl = 1;
                            while($row=mysqli_fetch_assoc($category)){ ?>
                            <tr>
                                <td><?= $sl++;?> </td>
                                <td><?= $row['category_name'];?></td>
                                <td><?= $row['status'] == 1 ? 'Active':'Inactive' ?></td>
                                <td>
                                    <?php 
                                        if($row['status'] == 1){ ?>
                                          <a class="btn btn-warning btn-sm" href="status.php?id=<?= $row['id'];?>&cat=category&inactive=inactive">
                                          <i class="fa fa-arrow-down"> Inactive</i></a>

                                       <?php }else{ ?>

                                        <a class="btn btn-info btn-sm" href="status.php?id=<?= $row['id'];?>&cat=category&active=active">
                                        <i class="fa fa-arrow-up"> Active</i></a>
                                       <?php  } ?>
                                   
                                    <a class="btn btn-warning btn-sm" href="edit_category.php?id=<?= $row['id']?>">
                                    <i class="fa fa-pencil-square-o"> edit</i></a>

                                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?=$row['id'];?>&cat=category">
                                    <i class="fa fa-trash-o"> delete</i></a>
                                </td>
                            </tr>
                         <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
</div>


<?php require_once('footer.php');?>