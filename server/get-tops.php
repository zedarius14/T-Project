<?php 

    include('connection.php');


    $stmt = $conn->prepare('SELECT * FROM products WHERE product_category="shirts" LIMIT 4');
    $stmt->execute();

    $tops = $stmt->get_result();
?>