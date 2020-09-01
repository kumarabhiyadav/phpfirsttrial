<?php
//$conn is connection function in db_connect.php for connection
//DataBase name 'trial'.'trial1' 
//name of Content in data base are id,Email, Name, Message, Date
include('config/db_connect.php');
    $email=$name=$message='';
    $errors=array('email'=>'','name'=>'','message'=>'');
  
if(isset($_POST['submit']))
{   
    $email=htmlspecialchars($_POST['email']);
    $name=htmlspecialchars($_POST['name']);
    $message=htmlspecialchars($_POST['message']);
    //Check Email
  if(empty($_POST['email']))
    {
        $errors['email']='A e-mail is required';
    }
    //check name Should not be empty or Number OR Special Characters
    if(empty($_POST['name']))
    {
        $errors['name']='A name is required';
    }
    else{
            if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
                $errors['name']='A valid name is require';  
            }
        }
        //Check message  Should Not be Empty
    if(empty($_POST['message']))
    {
        $errors['message']='A message is required';
    }
    
      //Checking all Errors
  if(array_filter($errors))
  { 
    //echo 'Some Error in Form';
  }else{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $message=mysqli_real_escape_string($conn,$_POST['message']);

    //create sql for data entry
     $sql="INSERT INTO trial1(Email,name,message) VALUES('$email','$name','$message')";
        //Send Data to DataBase then move to submit.php to display
     if(mysqli_query($conn,$sql)){
   
       header('Location:submit.php');
      
      }else{
       echo 'Failed to Inserted'.mysqli_error($conn);
     }
     
   // if form Completetly valid Move To submit.php
   header('Location:submit.php');
  } 
}

 ?>
 <!--PHP End-->
 <!--HTML Page Start-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>form</title>
</head>
<body>
<h1 class="text-center">Form using PHP</h1>
<form class="container form border" action="index.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
<div class="text-danger"><?php echo $errors['email'];?></div> 
</div>
  <div class="form-group">
    <label for="exampleInputtext1">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    <div class="text-danger"><?php echo $errors['name'];?></div> 
</div>
  <div class="form-group">
    <label for="exampleInputtext1">Message:</label>
    <input type="text" class="form-control" id="message" name="message" placeholder="Enter Your Meassage">
    <div class="text-danger"><?php echo $errors['message'];?></div> 
</div>
  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>

</body>
</html>