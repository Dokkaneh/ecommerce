<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Admin Dashboard</title>
</head>
<body>
    
<h1> Admin Dashboard</h1>

<i class="fa-solid fa-box-circle-check"></i>
		<div class="tab_container">
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">
<i class="fa fa-users"></i> <span>Users</span></label>

			<input id="tab2" type="radio" name="tabs">
			<label for="tab2"><i class="fa-solid fa-bowl-food"></i><span>Products</span></label>

			<input id="tab3" type="radio" name="tabs">
			<label for="tab3"><i class="fa fa-croissant"></i><span>Orders</span></label>

			

			<section id="content1" class="tab-content">
		    
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
      <tr>
          <td>AAC</td>
          <td><i class="fa-solid fa-user-pen"></i> </td>
          <td><i class="fa-sharp fa-solid fa-trash"></i></td>
        
        </tr> <tr>
          <td>AAC</td>
          <td><i class="fa-solid fa-user-pen"></i> </td>
          <td><i class="fa-sharp fa-solid fa-trash"></i></td>
        
        </tr>
             </tbody>
    </table>
  </div>
</section>

			<section id="content2" class="tab-content">
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
      <tr>
      <td>img1</td>
      <td>apple</td>
      <td>5JD</td>
      <td>fruit</td>

      <td>-</td>
          <td><i class="fa-sharp fa-solid fa-pen-to-square"></i> </td>
          <td><i class="fa-sharp fa-solid fa-trash"></i></td>
        
        
        </tr> <tr>
        <td>img2</td>
      <td>banana</td>
      <td>7JD</td>
      <td>fruit</td>
      <td>70%</td>
          <td><i class="fa-sharp fa-solid fa-pen-to-square"></i> </td>
          <td><i class="fa-sharp fa-solid fa-trash"></i></td>
        
        </tr>
             </tbody>
    </table>
  </div>	</section>

			<section id="content3" class="tab-content">
            <h1>All Order Information</h1>

  <!--for demo wrap-->
  
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" >
      <thead>
        <tr>
          <th>Email</th>
          <th>ID</th>
          <th>Approve</th>
         
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" >
      <tbody>
      <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td><i class="fa-solid fa-memo-circle-check"></i></td>
        
        </tr> <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td><i class="fa-solid fa-memo-circle-check"></i></td>
        
        </tr>
             </tbody>
    </table>
  </div></section>

		
		</div>

<!-- ///////////////////// SCRIPTS ///////////////////// -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8b42dcad4f.js" crossorigin="anonymous"></script>
</body>
</html>