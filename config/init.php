<?php


interface ProductSorterInterface
{
    public function sort(array $products): array;
}






// Sample usage


$products = [
    [
        'id' => 1,
        'name' => 'Alabaster Table',
        'price' => 12.99,
        'created' => '2019-01-04',
        'sales_count' => 32,
        'views_count' => 730,
    ],
    [
        'id' => 2,
        'name' => 'Zebra Table',
        'price' => 44.49,
        'created' => '2012-01-04',
        'sales_count' => 301,
        'views_count' => 3279,
    ],
    [
        'id' => 3,
        'name' => 'Coffee Table',
        'price' => 10.00,
        'created' => '2014-05-28',
        'sales_count' => 1048,
        'views_count' => 20123,
    ]
];




require_once('classes/Catalog.php');
require_once('classes/SortByPrice.php');
require_once('classes/SortBySales.php');




// Create different sorters
$productPriceSorter = new SortByPrice();
$productSalesPerViewSorter = new SortBySalesPerView();

// Create the catalog with products
$catalog = new Catalog($products);

// Get products sorted by price
$productsSortedByPrice = $catalog->getProducts($productPriceSorter);

// Get products sorted by sales per view
$productsSortedBySalesPerView = $catalog->getProducts($productSalesPerViewSorter);
