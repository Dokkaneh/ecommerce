<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-lg-8 mx-auto">

<main>
    <h1 class="text-center mt-3 mb-3">Product Filter in PHP using Vanilla JavaScript - Live Data Search - 8</h1>

    <div class="row">

        <div class="col-sm-3 p-3 bg-light">

            <button type="button" name="clear_filter" class="btn btn-warning btn-sm form-control mb-2" id="clear_filter">Clear Filter</button>

            <p class="fs-4 text-center border-bottom text-bold">Gender</p>

            <div id="gender_filter" class="mb-2"></div>

            <p class="fs-4 text-center border-bottom text-bold">Price</p>

            <div id="price_filter" class="mb-2"></div>

            <p class="fs-4 text-center border-bottom text-bold">Brand</p>

            <div id="brand_filter" class="overflow-auto mb-3" style="height:350px;"></div>

        </div>

        <div class="col-sm-9">

            <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" id="search_textbox" placeholder="Search Product" aria-label="Search Product" aria-describedby="search_button" />
                <button type="button" class="btn btn-primary" id="search_button">Search</button>
            </div>
            
            <div id="product_area"></div>

            <div id="skeleton_area"></div>

            <div id="pagination_area" class="mt-2 mb-5" ></div>
        </div>

    </div>

    <!-- ////////////////////////////////////// -->
    <script src="./shop/app.js"></script>
</body>
</html>