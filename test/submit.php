<?php
//second Page Use For Give Name and message to User and Send all data to DataBase
//$conn is connection function in db_connect.php for connection
include('config/db_connect.php');
//create sql for Enter Data
 $sql='SELECT name,message,id FROM trial1';
 
 
 $result=mysqli_query($conn,$sql);
   

 $messages=mysqli_fetch_all($result,MYSQLI_ASSOC);

//below line Show incoming data
// print_r($messages);

 $conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<h1 class="text-center">Messages <br>   </h1>
    <?php foreach($messages as $messager) {?>
     <div class="card text-center" >
  <div class="card-body">
    <h5 class="card-title"><?php echo htmlspecialchars($messager['name'])?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($messager['message'])?></h6>
    <a class="card-link" href="details.php?id=<?php echo $messager['id']?>">More</a>
  </div>
</div>
    <?php   } ?>
</body>
</html>