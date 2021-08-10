<?php
require_once("inc/db-connection.php");
if(! isset($_SESSION['email']))
{
   header("location:index.php");
}

if(isset($_GET['id']))
{
    $id =$_GET['id'];
    echo $id;

// 34an a7zef el sora aw el file mn el project el 3la ek lap basta5dm unlike()
    $query="SELECT img FROM PROJECTS WHERE ID='$id'";
    $run=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($run);
    $imgName=$result['img'];
    $file_to_delete="images/$imgName";
    unlink($file_to_delete);


    $query="DELETE FROM PROJECTS WHERE ID='$id'";
    $run_query=mysqli_query($conn,$query);

    header("location:index.php");
}



?>