<?php
//$conn is connection function in db_connect.php for connection
//Detail File use for individual information
include('config/db_connect.php');
 if(isset($_GET['id'])){
     
  //$ store id to $id variable  
 $id=mysqli_real_escape_string($conn,$_GET['id']);

 //searching in database as per above id 
 $sql="SELECT * FROM trial1 WHERE id=$id"; 
 

 $result=mysqli_query($conn,$sql);
   

 $messages=mysqli_fetch_assoc($result);

//below line show incoming data 
 //print_r($messages);

 $conn->close();


 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Details</title>
</head>
<body>
<div class="card text-center">
    <?php if($messages): ?>
  <div class="card-header">
  Name:<?php echo htmlspecialchars($messages['Name'])?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Email:<?php echo htmlspecialchars($messages['Email'])?></h5>
    <p class="card-text">DateTime:<?php echo htmlspecialchars($messages['Date'])?></p>
  </div>
  <form action="delete.php" method="POST">
    <input type="hidden" name="id_to_delete" value="<?php echo $messages['id']?>">
    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
  </form>
  <div class="card-footer text-muted">
    &COPY; Copyright 2020 Abhinavkumar
  </div>
</div>
<?php else: ?>
<h5>No Such Name Or Message Exist Regd. this id</h5>
<?php endif ?>

</body>
</html>