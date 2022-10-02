<?php
require_once './dbConnection.php';

$id = $_REQUEST["id"];
try{
    $sql = "DELETE FROM users where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$query->execute();
header("Location: adminDashboard.php");

}
catch(PDOException $e){
    $sql = "DELETE FROM orders where user_id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_STR);
    $query->execute();
    header("Location: adminDashboard.php");
echo 'erooooooooooooorr'. $e->getMessage();
}
?>