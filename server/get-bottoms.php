<?php 

    include('connection.php');


    $stmt = $conn->prepare('SELECT * FROM products WHERE product_category="shorts" LIMIT 4');
    $stmt->execute();

    $bottoms = $stmt->get_result();
?>