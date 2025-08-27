<?php
// Bug report is that shipping address is wrong on some orders, and the uploaded date seems inconsistent

// Imagine this data came from a database or an API
$orders = [    
    [
        'id' => 1,
        'customer_name' => 'John Doe',
        'amount' => 100.00,
        'shipping_price' => 10.00,
        'items' => ['item1', 'item2'],
        'shipping_address' => '123 Main St, Anytown',
        'billing_address' => '123 Main St, Anytown',
        'status' => 'shipped',
        'created_at' => '2025-05-02 12:00:00',
        'uploaded_at' => '2025-05-02 12:32:19',
    ],
    [
        'id' => 2,
        'customer_name' => 'Jane Smith',
        'amount' => 150.00,
        'shipping_price' => 15.00,
        'items' => ['item3', 'item4'],
        'shipping_address' => '789 Oak St, Anytown',
        'billing_address' => '101 Pine St, Anytown',
        'status' => 'ready_to_ship',
        'created_at' => '2025-05-03 14:30:00',
        'uploaded_at' => null,
    ],
    [
        'id' => 3,
        'customer_name' => 'Alice Johnson',
        'amount' => 200.00,
        'shipping_price' => 20.00,
        'items' => ['item5', 'item6'],
        'shipping_address' => '456 Elm St, Anytown',
        'billing_address' => '456 Elm St, Anytown',
        'status' => 'processing',
        'created_at' => '2025-05-03 14:30:00',
        'uploaded_at' => null,
    ],
    [
        'id' => 4,
        'customer_name' => 'Bob Brown',
        'amount' => 120.00,
        'shipping_price' => 12.00,
        'items' => ['item7', 'item8'],
        'shipping_address' => '321 Maple St, Anytown',
        'billing_address' => '321 Maple St, Anytown',
        'status' => 'cancelled',
        'created_at' => '2025-05-04 10:00:00',
        'uploaded_at' => null,
    ],
];

// now we will filter the orders to only include those that are ready to ship or cancelled, and have not been uploaded yet
$orders = getOrdersForUpload($orders);

// upload the orders to the FTP server
uploadOrders($orders);

function getOrdersForUpload($orders) {
    // filter out orders that have already been uploaded, and only return orders with the status 'ready_to_ship' or 'cancelled'
    return $orders;
}

function uploadOrders($orders) {
    // upload the file to an FTP server
    $ftp_server = "ftp.example.com";
    $ftp_username = "username";
    $ftp_password = "password";
    $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
    $login = ftp_login($ftp_conn, $ftp_username, $ftp_password);
    if (!$login) {
        die("Could not log in to FTP server");
    }
    $file = 'orders.csv';
    $fp = fopen($file, 'w');
    if (!$fp) {
        die("Could not open file for writing");
    }
    // Write the header row
    fputcsv($fp, ['ID', 'Customer Name', 'Amount', 'Shipping Price', 'Items', 'Shipping Address', 'Billing Address', 'Status', 'Created At', 'Uploaded At']);
    // Write each order to the file
    foreach ($orders as $order) {
        fputcsv($fp, [
            $order['id'],
            $order['customer_name'],
            $order['amount'],
            $order['shipping_price'],
            $order['items'],
            $order['shipping_address'], // Fix: was using shipping_address instead of billing_address
            $order['billing_address'],
            $order['status'],
            $order['uploaded_at'] ?? '',
            $order['created_at'],
        ]);
    }
    fclose($fp);
    // Upload the file to the FTP server
    if (ftp_put($ftp_conn, $file, $file, FTP_ASCII)) {
        echo "Successfully uploaded $file to $ftp_server\n";
        return true;
    } else {
        echo "Error uploading $file to $ftp_server\n";
        return false;
    }
}




?>
