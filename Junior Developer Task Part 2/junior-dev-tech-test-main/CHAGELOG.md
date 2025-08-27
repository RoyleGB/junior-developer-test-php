## Jordan Royle - Change Log
 
BUGS FOUND
# Issue with compiling
1. Syntax error, missing semi colon after import in Product.vue -> Added semi colon
2. Cant find file, incorect file path provided -> Added correct file path to json file
3. Syntax errors in product json file, missing a comma, end quote marks, etc -> Added correct JSON syntax

# Implementation Problems
1. Some alternate images cannot be found/loaded onto page
2. Unloaded images had no alt image script

Implementation
# Home Page
1. Created a parent container to hold all the items within both the grid image and product details.
2. Added a media gallery to display item in a 2x2 grid format on left hand side of page
3. Added the product details container to the right hand side of page
4. Added the discount offer label
5. Added the product title
6. Added the price labels with correct saving discount
7. Added the alternate image colours for the item in a row.
8. Added each specific size button with corresponding number
9. Added 'add to bag' button to work as some functionality
10. Added product description, bullet points and product code.
11. Correctly segregated each part with a horizontal line.
12. Added meaningful comments to each section

# Additional
1. Added functionality -> On hover images scale, buttons lightup.
2. If button clicked it is left highlighted -> slight bug as it stays lit up after size change.
2. Added the discount percentage saving equation within the savings div
3. Created two methods to store a size and display an alert after adding to bag.

# Improvements
1. Refactor using bootstrap
2. using more vue components => buttons
3. Adapt for different screen sizes


Questions
1. Only have one main div tag?
