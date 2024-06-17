<?php 

    include('connection.php');


    $stmt = $conn->prepare('SELECT * FROM products WHERE product_category="footwear" LIMIT 4');
    $stmt->execute();

    $footwear = $stmt->get_result();
?>