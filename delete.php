<?php
require_once './connect.php';
$connection = DB();

if(isset($_GET["id"])){

   $sql = "DELETE FROM users WHERE id ='$_GET[id]'";
   $result = mysqli_query($connection,$sql);

   if($result){
       header('location: index.php');
   }else 
   echo "Cant Delete your Data Please Check ur Coding";
   
} 


?>