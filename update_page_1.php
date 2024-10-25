<?php
// Include the database connection file
include('dbcon.php');

// Check if the form is submitted
if (isset($_POST['update_list'])) {

    // Get the product ID from the form submission
    $id = mysqli_real_escape_string($connection, $_POST['productID']);

    // Get the form data
    $name = mysqli_real_escape_string($connection, $_POST['ProductName']);
    $description = mysqli_real_escape_string($connection, $_POST['ProductDescription']);
    $price = mysqli_real_escape_string($connection, $_POST['ProductPrice']);
    $quantity = mysqli_real_escape_string($connection, $_POST['ProductQuantity']);

    // Update query
    $query = "UPDATE products SET  id = '$id', ProductName = '$name', ProductDescription = '$description', ProductPrice = '$price', ProductQuantity = '$quantity' WHERE productID = '$id'";

    // Execute the query
    if (mysqli_query($connection, $query)) {
        echo "Product updated successfully!";
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($connection);
    }
}

// Fetch the product data based on the product ID from the URL
if (isset($_GET['productID'])) {
    $id = mysqli_real_escape_string($connection, $_GET['productID']);
    
    $query = "SELECT * FROM products WHERE productID = '$id'";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $productName = $row['ProductName'];
        $productDescription = $row['ProductDescription'];
        $productPrice = $row['ProductPrice'];
        $productQuantity = $row['ProductQuantity'];
    }
}
?>

<form action="update_page_1.php?productID=<?php echo htmlspecialchars($name); ?>" method="post">
    <input type="hidden" name="productID" value="<?php echo htmlspecialchars($name); ?>">
    <div class="form-group">
        <label for="id">id</label>
        <input type="text" name="id" required value="<?php echo htmlspecialchars($id ?? ''); ?>">

        <label for="ProductName">Name</label>
        <input type="text" name="ProductName" required value="<?php echo htmlspecialchars($productName ?? ''); ?>">

        <label for="ProductDescription">Description</label>
        <input type="text" name="ProductDescription" required value="<?php echo htmlspecialchars($productDescription ?? ''); ?>">

        <label for="ProductPrice">Price</label>
        <input type="text" name="ProductPrice" required value="<?php echo htmlspecialchars($productPrice ?? ''); ?>">

        <label for="ProductQuantity">Quantity</label>
        <input type="text" name="ProductQuantity" required value="<?php echo htmlspecialchars($productQuantity ?? ''); ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_list" value="UPDATE">
</form>
