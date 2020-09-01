<?php
 include("config/db_connect.php");
 
  if(isset($_POST['delete']))
  {
      $id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
      echo $id_to_delete;


      $sql="DELETE FROM trial1 WHERE id=$id_to_delete";


      if(mysqli_query($conn,$sql)){
          //Succesfully Deleted record
          header('Location:submit.php');
      }else{
          echo 'Error While Delete Record'.mysqli_error($conn);
      }
  }

?>