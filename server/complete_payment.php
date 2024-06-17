<?php

session_start();
include('connection.php');


if(isset($_GET['transaction_id']) && isset($_GET['order_id'])){
    //change order_status to paid

    $order_id = $_GET['order_id'];
    $order_status = "paid";
    $transaction_id = $_GET["transaction_id"];
    $user_id = $_SESSION['user_id'];
    $payment_date = date("Y-m-d H:i:s");


    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id=?");
    $stmt->bind_param('si',$order_status,$order_id);

    $stmt->execute();
    //store payment info

    $stmt1 = $conn->prepare("INSERT INTO payments (order_id,user_id,transaction_id,payment_date)
    VALUE (?,?,?,?)");

    $stmt1->bind_param('iiss',$order_id,$user_id,$transaction_id,$payment_date);
    $stmt1->execute();

    //go to user account
    header('location: ../account.php?payment_message=paid successfully, thanks for shopping with us');
}else {
    header('location: ../index.php');
    exit;

}

// // Check if the user is logged in
// if (!isset($_SESSION['logged_in'])) {
//     // Redirect to login page if not logged in
//     header('Location: ../login.php');
//     exit;
// }

// // Check if transaction details are present in session
// if (!isset($_SESSION['transaction_details'])) {
//     // Redirect to home page if no transaction details found
//     header('Location: ../index.php');
//     exit;
// }

// // Get transaction details from session
// $transactionDetails = $_SESSION['transaction_details'];

// // Print purchase information
// echo "<h1>Purchase Information</h1>";
// echo "<p>User: {$_SESSION['username']}</p>";
// echo "<p>Transaction Status: {$transactionDetails['status']}</p>";
// echo "<p>Transaction ID: {$transactionDetails['id']}</p>";

// // Clear transaction details from session
// unset($_SESSION['transaction_details']);
?>
