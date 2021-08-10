<?php
require_once('inc/header.php');

$query= 'SELECT * FROM projects';
$run_query=mysqli_query($conn, $query);
$projects= mysqli_fetch_all($run_query, MYSQLI_ASSOC);


// print_r($projects);

?>
<?php if(! isset($_SESSION['email'])){?>
<a href="login.php" class="btn btn-primary m-2">Login</a>
<?php }?>
<?php if(isset($_SESSION['email'])){?>
<a href="add-project.php" class="btn btn-primary m-2">Add Project</a>
<?php }?>
<?php if(isset($_SESSION['email'])){?>
<a href="logout.php" class="btn btn-danger m-2">Logout</a>
<?php } ?>




<div class="container mt-5">
    <div class="row py-2">

        <?php 
        foreach($projects as $project) {
        ?>
        <div class="col-md-4 py-2">
            <img class="img-fluid" src="images/<?php echo $project['img'];?>" alt="">

            <h1 class="head py-2 text-center"><?php echo $project['name'];?></h1>
            <a href="view.php?id=<?php echo $project['id'];?>" class="btn btn-primary ">View-Diteals</a>
            
            <?php if(isset($_SESSION['email'])) {?>
            <a href="edit.php?id=<?php echo $project['id'];?>" class="btn btn-success ">Edit</a>
            <a href="delete.php?id=<?php echo $project['id'];?>" class="btn btn-danger ">Delete</a>
            <?php }?>
        </div>
<?php }?>


    </div>

</div>

<?php
require_once('inc/footer.php');
?>