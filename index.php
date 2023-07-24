<?php
require_once('config/init.php');


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP Backend Engineer Assessment by SCNIP NIGERIA LTD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
</head>

<body class="container">
    <h1>PHP Backend Engineer Assessment by SCNIP NIGERIA LTD </h1>
    <div class="row">
        <div class="col-md-6">
            <form action="index.php" method="post">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select your Sort Option</label>
                    <select class="form-control" name="param">
                        <option>Select</option>
                        <option value="price">Sort by Price</option>
                        <option value="perview">Sort by Sales per View</option>

                    </select>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" value="Sort" name="submit" class="btn btn-primary">
                </div>

            </form>
        </div>

    </div>

    <br>
    <table data-toggle="table " class="table table-responsive table-primary">
        <thead>
            <tr>
                <th> ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Date Created</th>
                <th>Sales Count Price</th>
                <th>Views Count</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if (isset($_POST['submit'])) {
                $param = $_POST['param'];
                //echo $param;

                if ($param == 'price') {

                    // Get products sorted by price
                    $products = $catalog->getProducts($productPriceSorter);
                    //  var_dump($products);
                } elseif ($param == 'perview') {

                    // Get products sorted by sales per view
                    $products = $catalog->getProducts($productSalesPerViewSorter);
                    // var_dump($product);
                }
            } else {
                $product = '';
            }

            foreach ($products as $product) :

            ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['created'] ?></td>
                    <td><?= $product['sales_count'] ?></td>
                    <td><?= $product['views_count'] ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
</body>

</html>