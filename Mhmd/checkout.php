<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Local style -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    //  include_once './header.php'
    // session_start();

    // $id = $_SESSION['user_id']

    // 
    ?>
    <!-- php user and cart data recall from database tables   -->
    <?php
    require_once('./connection.php');
    // if (isset($_GET['id']) && isset($_GET['cart_id'])) {
    // $id = 1;
    // $cart_id = 1;
    //user information sql select statement 
    $stmt = $conn->query("SELECT name, email ,phone,address
    FROM users where id=$id");
    $resultusers = $stmt->fetch(PDO::FETCH_OBJ);
    // get all users info
    $sql = "SELECT `cart`.`products_id`, `cart`.`quantity`, `cart`.`total`,
     `products`.`name`, `products`.`price`, `products`.`discount`
     FROM `products` 
     JOIN `cart` 
     ON products.id = cart.products_id";
    //  where cart_id=$cart_id"
    // Cart information sql select statement 
    $stmt2 = $conn->query($sql);

    // $stmt2 = $conn->query("SELECT quantity, total FROM cart WHERE cart_id=$cart_id");
    $resultcart = $stmt2->fetchAll(PDO::FETCH_OBJ);

    // get all users info
    ?>





    <!-- Html Checkout form  -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="confirmation.php " method=POST>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input name='fullName' value="<?php echo $resultusers->name; ?>" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address1" value="<?= $resultusers->address; ?>" placeholder="Street Address" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>:</span> Zarqa</p>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" value="<?= $resultusers->phone; ?>" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value="<?= $resultusers->email; ?>" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Summery of the order  -->
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php
                                    $totalsum = 0;
                                    foreach ($resultcart as $item) {
                                        $totalsum += $item->price * $item->quantity;

                                    ?>

                                        <li> <?php echo $item->name;
                                                echo "&nbsp";
                                                echo "unit price = " . $item->price;
                                                echo "$" ?><span> </span> <span> <?php echo $item->price * $item->quantity; ?>
                                            </span></li>
                                    <?php  };
                                    if ($totalsum > 20) {
                                        $delivery = 0;
                                    } else {
                                        $delivery = 2;
                                    };
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span><?= $totalsum ?></span></div>
                                <div class="checkout__order__total">Total With Delivery <span><?= $totalsum + $delivery ?></span></div>
                                <input type="hidden" name="totalsum" value="<?php echo $totalsum; ?>">
                                <!-- Check out Submit button  -->

                                <button class="btn btn-danger" type="submit"> PLACE ORDER</button>
                                <?php
                                //  echo  '<a href="./confirmation.php?total=' . $totalsum . '&id=' . $id . '"> ' '</a>'; 
                                ?>
                                <!-- './modify.php?id=
                                //  echo '<a href="view-transaction.php?entry_id='.$single_id.'&user_name=' . $user_name .'">'.$user_name.'</a>'; -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- //  include_once './footer.php' -->

</body>

</html>