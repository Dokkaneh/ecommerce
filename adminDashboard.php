<?php
require_once './dbConnection.php';

$sql_user="SELECT * FROM users";
$sql_product="SELECT * FROM products";
$sql_order="SELECT orders.id,users.email,orders.currentdate FROM orders JOIN users WHERE orders.user_id =users.id";


$getUserData= $conn->query($sql_user);
$getProductData= $conn->query($sql_product);
$getOrderData= $conn->query($sql_order);
$users=$getUserData->fetchAll(PDO::FETCH_OBJ);
$products=$getProductData->fetchAll(PDO::FETCH_OBJ);
$orders=$getOrderData->fetchAll(PDO::FETCH_OBJ);

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Admin Dashboard</title>
</head>
<body>
  <header></header>
  <main>
  <nav class="sidebar close">
        <header>
            <div class="image-text">
               
                <div class="text logo-text">
                    <span class="name">Admin Dashboard</span>
                </div>
            </div>

            <!-- <i class='bx bx-chevron-right toggle'></i> -->
            <i class="fa-solid fa-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

              
                <ul class="menu-links">
                    <li class="nav-link users-link">
                        
                            <i class='fa-solid fa-users icon' ></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>

                    <li class="nav-link product-link">
                        
                        <i class="fa-solid fa-fish icon"></i>
                                                    <span class="text nav-text">Products</span>
                        </a>
                    </li>

                    <li class="nav-link order-link">
                        
                        <i class="fa-solid fa-box icon"></i>
                         <span class="text nav-text">Orders</span>
                        </a>
                    </li>

                   
                </ul>
            </div>

            
        </div>

    </nav>

    <section class="home">
       <div class="text">Dashboard Sidebar</div>

       <section id="user" class="tab-content ">
		    
            <h1>All Users Information</h1>
        <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add User</div>
    </button>
      <!--for demo wrap-->
      
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" >
          <thead>
            <tr>
              <th>Email</th>
              <th>Edit</th>
              <th>Delete</th>
             
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" >
          <tbody>
          <?php 
    foreach($users as $user){

    
    ?>
          <tr>
              <td><?php echo $user->email;?></td>
              <td><i class="fa-solid fa-user-pen"></i> </td>
              <td>
              <a href="delete.php?id=<?php echo $user->id;?>">  
              <i class="fa-sharp fa-solid fa-trash"></i>
            </a></td>
            
            </tr> 
            <?php }?>
                 </tbody>
        </table>
      </div>
    </section>
    
                <section id="product" class="tab-content">
                <h1>All Products Information</h1>
        <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Product</div>
    </button>
      <!--for demo wrap-->
      
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" >
          <thead>
            <tr>
            <th>Image</th>
              <th>Name</th>
              <th>Price</th>
               <th>Categories</th>
                <th>Discount</th>
              <th>Edit</th>
              <th>Delete</th>
             
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" >
          <tbody>
            <?php
            $categorie="SELECT categories.name,categories.id FROM categories JOIN products WHERE  products.category_id= categories.id";
            $getCatData= $conn->query($categorie);
            $categName=$getCatData->fetchAll(PDO::FETCH_OBJ);
            print_r($categName);
            $categoryName='';
          foreach($products as $product){
            foreach($categName as $category){
                if($product->category_id == $category->id)
           $categName=$category->name;
            }

            
?>
          <tr>
          <td><?php echo $product->image;?></td>
          <td><?php echo $product->name;?></td>
          <td><?php echo $product->price;?></td>
          <td><?php echo $categName;?></td>
    
          <td><?php echo $product->discount;?></td>
              <td><i class="fa-sharp fa-solid fa-pen-to-square"></i> </td>
              <td><i class="fa-sharp fa-solid fa-trash"></i></td>
            
            
            </tr> 
            <?php } ?>
                 </tbody>
        </table>
      </div>	</section>
    
                <section id="orders" class="tab-content">
                <h1>All Order Information</h1>
    
      <!--for demo wrap-->
      
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" >
          <thead>
            <tr>
              <th>Email</th>
              <th>ID</th>
              <th>Date</th>
              <th>Approve</th>
             
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" >
          <tbody>
          <?php 
    foreach($orders as $order){

    
    ?>
          <tr>
              <td><?php echo $order->email;?></td>
              <td><?php echo $order->id;?> </td>
              <td><?php echo $order->currentdate;?> </td>
              <td><i class="fa-solid fa-circle-check"></i></td>
            
            </tr>
            <?php }?>
                 </tbody>
        </table>
      </div></section>
    </section>

  </main>
  <footer></footer>

<!-- ///////////////////// SCRIPTS ///////////////////// -->
<script src="./dashboardJs.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8b42dcad4f.js" crossorigin="anonymous"></script>
</body>
</html>