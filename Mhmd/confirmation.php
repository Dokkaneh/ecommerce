<?php
// session_start();
// $status = $_SESSION['user'];
if (isset($status)) {

    require_once 'connection.php';
    $id = $_POST['id'];
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address1'];

    $sql = "UPDATE users 
      SET name=:name,email=:email,phone=:phone,address=:address 
      WHERE id=$id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    //   $stmt->bindParam(':id',$user->id,PDO::PARAM_STR);

    $stmt->execute();
    // header("location: admin.php");
    echo "user updated";





    $total = $_POST['totalsum'];

    $sql = "INSERT INTO orders( `payment`, `user_id`) VALUES ($total,$id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();




    $sql = "DELETE FROM cart where user_id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("location:checkout.php");
} else
    header("Location:./signup.php");
