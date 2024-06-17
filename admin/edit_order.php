<?php include ('header.php'); ?>
<?php include ('sidemenu.php'); ?>

<?php


if (isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order = $stmt->get_result();//[]
} else if (isset($_POST['edit_btn'])) {


    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    $stmt->bind_param('si', $order_status, $order_id);

    $stmt->execute();

    if ($stmt->execute()) {
        header('location: dashboard.php?order_updated=Order has been updated successfully');
    } else {
        header('location: dashboard.php?order_failed=Error occured, try again');
    }
} else {
    // header('location: dashboard.php');
    // exit;
}



?>


<div class="container-fluid">
    <div class="row" style="min-height: 1000px">

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-betwee flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                </div>
            </div>

            <h2>Edit Order</h2>
            <div class="table-responsive">


                <div class="mx-auto container">
                    <form id="edit-order-form" method="POST" action="edit_order.php">

                        <?php foreach ($order as $r) { ?>


                            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            } ?></p>
                            <div class="form-group my-3">
                                <label>Order ID</label>
                                <p class="my-4"><?php echo $r['order_id']; ?></p>
                            </div>

                            <div class="form-group my-3">
                                <label>Order Price</label>
                                <p class="my-4"><?php echo $r['order_cost']; ?></p>
                            </div>


                            <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>">
                            <div class="form-group my-3">
                                <label>Order Status</label>
                                <select class="form-select" required name="order_status">

                                    <option value="payment pending" <?php if ($r['order_status'] == "payment pending") {
                                        echo "selected";
                                    } ?>>Payment Pending</option>
                                    <option value="cash on delivery" <?php if ($r['order_status'] == "Cash on Delivery") {
                                        echo "selected";
                                    } ?>>Cash on Delivery</option>
                                    <option value="Paid" <?php if ($r['order_status'] == "Paid") {
                                        echo "selected";
                                    } ?>>Paid
                                    </option>
                                    <option value="Shipped" <?php if ($r['order_status'] == "Shipped") {
                                        echo "selected";
                                    } ?>>
                                        Shipped</option>

                                        <option value="Shipped [COD]" <?php if ($r['order_status'] == "Shipped [COD]") {
                                        echo "selected";
                                    } ?>>
                                        Shipped [COD]</option>    

                                    <option value="Delivered" <?php if ($r['order_status'] == "Delivered") {
                                        echo "selected";
                                    } ?>>Delivered</option>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label>Order Date</label>
                                <p class="my-4"><?php echo $r['order_date']; ?></p>
                            </div>
                        <?php } ?>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" name="edit_btn" value="Save edit">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>