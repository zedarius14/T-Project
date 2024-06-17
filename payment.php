<?php 
session_start();
$currency = 'PHP';

$order_status = isset($_GET['order_status']) ? $_GET['order_status'] : '';
include('layouts/header.php');
?>

<script src="https://www.paypal.com/sdk/js?client-id=AdrNa5-6xouZlkhm_-jQeTgtmpIP42o1p7x43OmyMXgYHpyzuu1rkviw8pC_v6TAEqHJbTHTqS8mT1lc&currency=USD"></script>

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment</h2>
        <p><?php echo $order_status; ?></p>
    </div>
    <?php if ($order_status == 'Cash on Delivery') { ?>
        <div class="container text-center">
            <p>Your order has been placed successfully. Please pay cash upon delivery.</p>
            <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
        </div>
    <?php } else { ?>
        <div class="mx-auto container text-center">
            <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "payment pending") { ?>
                <?php $order_id = $_POST['order_id']; ?>
                <?php $amount = $_POST['order_total_price']; ?>
                <p>Total payment: &#8369; <?php echo $_POST['order_total_price']; ?> </p>
                <div style="display:flex; justify-content:center; align-items:center; height:20vh;">
                    <div id="paypal-button-container"></div>
                    <p id="result-message"></p>
                </div>
            <?php } elseif (isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
                <?php $order_id = $_SESSION['order_id']; ?>
                <?php $amount = $_SESSION['total']; ?>
                <p>Total payment: &#8369; <?php echo $_SESSION['total']; ?> </p>
                <div style="display:flex; justify-content:center; align-items:center; height:20vh;">
                    <div id="paypal-button-container"></div>
                    <p id="result-message"></p>
                </div>
            <?php } else { ?>
                <p class="text-center" style="color: green;">You don't have an order yet</p>
            <?php } ?>
        </div>
    <?php } ?>
</section>


<script>
    // Check if the amount is correctly set in PHP
    console.log("Amount from PHP: ", <?php echo json_encode($amount); ?>);
    let amount = <?php echo json_encode($amount); ?>;

    paypal.Buttons({
        createOrder: function(data, actions) {
            return fetch('create-order.php', {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    order_total_price: amount
                })
            }).then(function(response) {
                return response.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },
        onApprove: function(data, actions) {
            return fetch('capture-order.php', {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },  
                body: JSON.stringify({
                    orderID: data.orderID
                })
                
            }).then(function(response) {
                return response.json();
            }).then(function(details) {
                document.getElementById('result-message').innerText = 'Transaction completed by ' + details.payer.name.given_name;

                // Display an alert with order status and ID
                alert('Order Status: ' + details.status + '\nOrder ID: ' + details.id);

                 window.location.href = "server/complete_payment.php?transaction_id="+ details.id+"&order_id="+<?php echo $order_id ?>;
            });
        }
    }).render('#paypal-button-container');
</script>

<?php
include('layouts/footer.php');
?>
