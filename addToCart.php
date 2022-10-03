<?php
require_once("connection.php");


if (isset($_GET['id'])) {
  global $conn;
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE id = $id";
  $stmt = $conn->query($sql);
  $item = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql2 = "INSERT INTO cart (products_id , quantity, total)
  VALUES ($id, 1, 1)";
  $conn->exec($sql2);
  header("Location:index.php");
}

if (isset($_POST['updateCart'])) {
  $user_id = $_POST['user_id'];
  echo "$user_id";
  $sql = "SELECT * FROM cart where user_id = $user_id";
  $stmt = $conn->query($sql);
  $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($cart_items as $item) {
    $cart_id = $item['cart_id'];
    $quantity = $_POST["$cart_id"];
    $new_total = $_POST['new_total'];
    $sql = "UPDATE cart SET quantity=$quantity WHERE cart_id = $cart_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }



  header("Location:shoping-cart.php");
}
