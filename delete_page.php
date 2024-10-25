<?php include('dbcon.php'); ?>

<?php

if (isset($_GET['ProductName'])) {

    $id = mysqli_real_escape_string($connection, $_GET['ProductName']);


    $query = "DELETE FROM products WHERE ProductName = '$ProductName'";


    $result = mysqli_query($connection, $query);


    if (!$result) {

        die("Query Failed: " . mysqli_error($connection));
    } else {

        header('Location: index.php?delete_msg=You have deleted the record.');
        exit();
    }
} else {

    header('Location: index.php?error_msg=Product ID not set.');
    exit();
}
?>
