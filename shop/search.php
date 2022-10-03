<?php
// include('../connection.php');

$searchErr = '';
$searched_prod = '';
$check = false;
$count = '';

if(isset($_POST['save'])){

    if(!empty($_POST['search'])){
        // Search
        $check = true;
        $search = $_POST['search']; 
        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' or price LIKE '%$search%'");
        $stmt->execute();
        $searched_prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        echo($count);

    } elseif(isset($_POST['sort'])){
        if($_POST=['sort'] == 'ASC'){
            $stmt = $conn->prepare("SELECT * FROM `products` ORDER BY `products`.`price` ASC;");
            $stmt->execute();
            $stmt->fetchAll(PDO:FETCH_ASSOC);
        } else if($_POST=['sort'] == "DESC"){

            $stmt = $conn->prepare("SELECT * FROM products ORDER BY products.price DESC;");
            $stmt->execute();
            $stmt->fetchAll(PDO:FETCH_ASSOC);

        }
    }
    
    else{
        $searchErr = "Product Not Found";
    }                     
}

