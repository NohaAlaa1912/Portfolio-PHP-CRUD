<?php
require_once('inc/header.php');
if(! isset($_SESSION['email']))
{
   header("location:index.php");
}

if(isset($_GET['id'])){

    $id=$_GET['id'];
    // echo $id;

    $query="select * from projects where id = '$id'";
    $run_query=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($run_query);
    // print_r($result);
}


?>
  
<div class="container py-5">
 <form  action="handle-edit.php?id=<?php echo $result['id'];?>" method="post" enctype="multipart/form-data">
 <label class="mt-2">Name* :</label>
 <input class="form-control" name="name" value="<?php echo $result['name'];?>" type="text" placeholder="Enter project Name">
 <label class="mt-2">Description* :</label>
 <textarea class="form-control" name="desc" placeholder="Please Enter Description" >
 <?php echo $result['description'];?>
 </textarea>
  <label class="mt-2">Img* :</label>
  <input type="file" name="file" class="form-control">
  <label class="mt-2">Website-URL :</label>
 <input class="form-control" name="url" value="<?php echo $result['url'];?>" type="text" placeholder="Enter webtsite url">
 <label class="mt-2">Repo-URL :</label>
 <input class="form-control" name="repo" value="<?php echo $result['repo'];?>" type="text" placeholder="Enter github url">

 <button class="btn btn-success mt-4" type="submit" name="submit">Edit</button> 
 
 </form> <br>
 <!-- <?php 
 if(isset($_SESSION['errors'])){
     foreach($_SESSION['errors'] as $errors){?>
        <p><?php echo $errors ;?><p>
   <?php }
}  
 unset($_SESSION['errors']);
 ?> -->
</div>

<?php
require_once('inc/footer.php');
?>