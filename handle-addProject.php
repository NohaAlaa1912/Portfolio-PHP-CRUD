<?php
session_start();
require_once("inc/db-connection.php");
if(isset($_POST['submit']))
{
    $name=htmlspecialchars(trim($_POST['name']));
    $desc= htmlspecialchars(trim($_POST['desc']));
    $file= $_FILES['file'];
    $url= htmlspecialchars(trim($_POST['url']));
    $repo= htmlspecialchars(trim($_POST['repo']));

    print_r($file);
    echo "<br>";

    $fileName= $file['name'];
    $fileTmpName= $file['tmp_name'];
    $fileSize=$file['size'];
    // $fileSizeMb =$fileSize / (1024 ** 2);
    
    $fileError= $file['error'];
    $ext= pathinfo($fileName,PATHINFO_EXTENSION);
    $fileNewName= uniqid(). "." .$ext;
    $errors=[];



// validation of validation

    if(empty($name)) 
    {
        $errors[]='Nameis required';
    }
    else if(strlen($name)<5 || strlen($name)>255)
    {
        $errors[]= 'Name Must Be [5-255] chars';
    }else if(!is_string($name) || is_numeric($name))
    {
        $errors[]= 'Name Must Be String';
    }
// validation of description
    if(empty($desc)) 
    {
        $errors[]=' Description is required';
    }
    else if(strlen($name)<5 || strlen($name)>1000)
    {
        $errors[]= 'Description Must Be [5-1000] chars';
    }
// validation of file

    if($fileError > 0)
    {
        $errors[]='There is an Error While uploading the file';
    }elseif(! in_array($ext,['jpg','png','jpeg','gif']))
    {
        $errors[]='The file extension must contain one of the following:(jpg,png,jpeg,gif) ';

    }
    // elseif($fileSizeMb > 1) {
    //     $errors[]='file max size must be = 1MB';
    // }
    
    if(! filter_var($url,FILTER_VALIDATE_URL))
    {
     $errors[]="Website URL must be valid URL";   
    }
    if(! filter_var($repo,FILTER_VALIDATE_URL))
    {
     $errors[]="GitHub must be valid URL";   
    }
    


    if (empty($errors))
    {
        $query = "INSERT INTO PROJECTS (name,description,img,url,repo)
        values ('$name','$desc','$fileNewName','$url','$repo')";

        $run_query= mysqli_query($conn,$query);
        move_uploaded_file($fileTmpName, "images/$fileNewName");
        header("location:index.php");
    }else{
        $_SESSION['errors']=$errors;
        header("location:add-project.php");
       

        
    }




}

?>






















