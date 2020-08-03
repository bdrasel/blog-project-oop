<?php require_once('header.php');?>

<?php 
    require_once '../vendor/autoload.php';
    $blog = new \App\classes\Blog();

    $allPosts = $blog->allBlog();


?>
    
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
            All Blog Information
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S1 No</th>
                                <th>Category Name</th>
                                <th>Title</th>
                                <th style="width:100px">Details</th>
                                <th>photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sl = 1;
                            while($row=mysqli_fetch_assoc($allPosts)){ ?>
                            <tr>
                                <td><?= $sl++;?> </td>
                                <td><?= $row['category_name'];?></td>
                                <td><?= $row['title'];?></td>
                                <td><?= $row['content'];?></td>
                                <td>
                                    <img width="50" src="../uploads/<?= $row['photo']?>" alt="photo">
                                </td>
                                <td>
                                     <?php 
                                        if($row['status'] == 1){ ?>
                                        <a class="btn btn-info btn-sm" href="status.php?id=<?= $row['id'];?>&blog=blog&inactive=inactive">
                                        <i class="fa fa-arrow-down"> Active</i></a>

                                    <?php }else{ ?>

                                        <a class="btn btn-warning btn-sm" href="status.php?id=<?= $row['id'];?>&blog=blog&active=active">
                                        <i class="fa fa-arrow-up"> Inactive</i></a>
                                    <?php  } ?>`
                                </td>
                                 <td>
                                    
                                    <a class="btn btn-warning btn-sm" href="edit_blog.php?id=<?= $row['id']?>">
                                    <i class="fa fa-pencil-square-o"> edit</i></a>

                                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?=$row['id'];?>&blog=blog">
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