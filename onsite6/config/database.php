<?php
try{
    $pdo=new PDO("mysql:host=localhost;dbname=dessert-product","root","");
}catch(PDOException $e){
    echo"not connected".$e->getMessage();
     

}


?>