<?php
include 'dbcon.php';

if (isset($_POST['insert'])) {
    $name = $_POST['ProductName'];
    $description = $_POST['ProductDescription'];
    $price = $_POST['ProductPrice'];
    $quantity = $_POST['ProductQuantity'];
    $createdAt = $_POST['createdAt'];
    $updatedAt = $_POST['updatedAt'];

    if (empty($name)) {
        header('Location: index.php?message=You need to fill in the name field');
        exit();
    } else {
        $query = "insert into `products` (`ProductName`, `ProductDescription`, `ProductPrice`, `ProductQuantity`, `createdAt`, `updatedAt`) 
        values ('$name', '$description', '$price', '$quantity', '$createdAt', '$updatedAt')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?insert_msg=Your data has been added successfully');
            exit();
        }
    }
}
?>