<?php
require_once('inc/header.php');
// gard ll 7maya mn en ay 7ad m4 3aml log in y3ml add l 2y project
if(! isset($_SESSION['email']))
{
   header("location:index.php");
}
?>
  
<div class="container py-5">
 <form  action="handle-addProject.php" method="post" enctype="multipart/form-data">
 <label class="mt-2">Name* :</label>
 <input class="form-control" name="name" type="text" placeholder="Enter project Name">
 <label class="mt-2">Description* :</label>
 <textarea class="form-control" name="desc" id="" placeholder="Please Enter Description" ></textarea>
  <label class="mt-2">Img* :</label>
  <input type="file" name="file" class="form-control">
  <label class="mt-2">Website-URL :</label>
 <input class="form-control" name="url" type="text" placeholder="Enter webtsite url">
 <label class="mt-2">Repo-URL :</label>
 <input class="form-control" name="repo" type="text" placeholder="Enter github url">

 <button class="btn btn-success mt-4" type="submit" name="submit">Add</button> 
 
 </form> <br>
 <?php 
 if(isset($_SESSION['errors'])){
     foreach($_SESSION['errors'] as $errors){?>
        <p><?php echo $errors ;?><p>
   <?php }
}  
 unset($_SESSION['errors']);
 ?>
</div>

<?php
require_once('inc/footer.php');
?>