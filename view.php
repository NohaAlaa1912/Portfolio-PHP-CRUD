<?php

// require_once('inc/db-connection.php');
require_once('inc/header.php');

if(isset($_GET['id'])) 
{
    $id = $_GET['id'];
    echo $id;
}elseif(!isset($_GET['id'])){
    header("location:index.php");
}

$query ="SELECT * FROM  projects Where id ='$id'";
$run_query=mysqli_query($conn,$query);
$project=mysqli_fetch_assoc($run_query);
// print_r($project);
?>

<div class="container">
    <div class="row">

        <div class="col-md-6">
            <img class="img-fluid" src="images/<?php echo $project['img'];?>" alt="">
        </div>
        <div class="col-md-6">
        <h1 class="head py-2 text-center"><?php echo $project['name'];?></h1>
        <p class="desc py-2"><?php echo $project['description'];?></p>
        <span> URL: <a href="<?php echo $project['url'];?>"><?php echo $project['url'];?></a> </span> <br>
        <span> REPO: <a href="<?php echo $project['repo'];?>"><?php echo $project['repo'];?></a> </span><br>
        <a href="index.php" class="btn btn-info my-3"> Back</a>
        </div>
    </div>
</div>