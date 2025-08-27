## Jordan Royle Task 1 Log Report

# Product Feed
1. Added a if statement within the foreach loop to check if an item is 'active', if not it is skipped from the list, otherwise add to list.

2. Compared the 'updated_at' with 'current_time' to skip orders that hjave been updated using todays date, if not then add to array list.


# Order Upload
1. Updated the getOrdersForUpload function to filter orders if 'uploaded_at' does not equal null, if so return an empty array. In addtion to only return orders with the 'status' => 'ready_to_ship' and 'cancelled'. 

2. Updated the creating order loop by replacing the 'billing_address' that was occupying the 'shipping_address' with the correct shipping address variable, was shipping to incorrect address.

2. Switched around the 'created_at' and 'uploaded_at' within the order loop based on how the header format is shown, was giviong inconsistencys.