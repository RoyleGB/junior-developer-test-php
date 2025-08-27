<?php
// Bug report is that almost no products are going into the output file, and on top of that it also contains products that are supposed to be disabled


// imagine this data came from a database or an API
$product_header = [
    ['id' => 1,'sku' => 'SKU001', 'status' => 'active'],
    ['id' => 2, 'sku' => 'SKU002', 'status' => 'active'],
    ['id' => 3,  'sku' => 'SKU003', 'status' => 'disabled'],
    ['id' => 4, 'sku' => 'SKU004', 'status' => 'active'],
    ['id' => 5, 'sku' => 'SKU005', 'status' => 'active'],
];
$product_detail = [
    ['id' => 1, 'name' => 'Green Hat', 'price' => 10, 'description' => 'This green hat is great for wearing on your head.', 'stock' => 50, 'category' => 'Men\'s Hats', 'created_at' => '2025-01-01', 'updated_at' => '2025-01-10'],
    ['id' => 9, 'name' => 'Blue Coat', 'price' => 150, 'description' => 'Once you wear a blue coat like this you\'ll never look back', 'stock' => 30, 'category' => 'Waterproof coats', 'created_at' => '2025-02-01', 'updated_at' => '2025-02-10'],
    ['id' => 3, 'name' => 'Red Tent', 'price' => 200, 'description' => 'A tent to keep you safe from the elements', 'stock' => 20, 'category' => 'Camping', 'created_at' => '2025-03-01', 'updated_at' => '2025-03-10'],
    ['id' => 4, 'name' => 'Black Shoes', 'price' => 50, 'description' => 'These black shoes are perfect for any occasion.', 'stock' => 100, 'category' => 'Footwear', 'created_at' => '2025-04-01', 'updated_at' => '2025-04-10'],
    ['id' => 5, 'name' => 'White Shirt', 'price' => 30, 'description' => 'A classic white shirt for all occasions.', 'stock' => 0, 'category' => 'Clothing', 'created_at' => '2025-05-01', 'updated_at' => '2025-05-10'],
];

// get current date in yyyy-mm-dd format
$current_date = date('Y-m-d');

// Initialize an array to hold all products
$all_products = [];

// Loop through product headers and details to create a combined array
foreach ($product_header as $header) {
    foreach ($product_detail as $detail) {
        if ($header['id'] === $detail['id']) {                    
            if ($detail['stock'] <= 0) {
                continue; // Skip products that are out of stock
            }
            if (strtotime($detail['updated_at']) < strtotime($current_date)) {
                continue; // Skip products already updated today
            }
            $all_products[] = array_merge($header, $detail);
        }
    }
    if ($header['status'] !== 'active') {
        continue; // Skip inactive products
    }
}

// generate a json feed and save it to disk
$json_feed = json_encode($all_products, JSON_PRETTY_PRINT);
file_put_contents('product_feed.json', $json_feed); 
?>