
<?php
include '_dbconnect.php';
// echo $id = $_GET['catid'];
if(isset($_GET['catid'])){
     $id=$_GET['catid'];
    $sql ="DELETE FROM `companylist` WHERE `companylist`.`id` = $id";
    $result2= mysqli_query($conn, $sql);
    header("Location: ../index.php");
}

?>