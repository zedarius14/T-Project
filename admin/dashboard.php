<?php include('header.php'); ?>

<?php 
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit; // Ensure to stop further execution if not logged in
}

// Database connection assumed to be established
// Assuming $conn is your database connection object

// 1. Determine page no
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    // Default page is 1 if not specified
    $page_no = 1;
}

// 2. Return number of orders
$stmt1 = $conn->prepare("SELECT COUNT(*) as total_records FROM orders");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();
$stmt1->close();

// 3. Products per page
$total_records_per_page = 10;
$offset = ($page_no - 1) * $total_records_per_page;

// 4. Get orders for the current page
$stmt2 = $conn->prepare("SELECT * FROM orders LIMIT ?, ?");
$stmt2->bind_param("ii", $offset, $total_records_per_page);
$stmt2->execute();
$orders_result = $stmt2->get_result();
$orders = $orders_result->fetch_all(MYSQLI_ASSOC);
$stmt2->close();

$total_no_of_pages = ceil($total_records / $total_records_per_page);
?>

<?php include('sidemenu.php'); ?>

<div class="container-fluid">
    <!-- Main content -->
    <div class="row" style="min-height: 1000px; margin-top: 27px; margin-left: 10px">
    
        <h1>Orders</h1>

        <div class="table-responsive">
            

        <?php 
        if(isset($_GET['order_updated'])){?>
            
        <p class="text-center" style="color: green;" ><?php echo $_GET['order_updated']; ?></p>
      <?php }?>

      <?php 
        if(isset($_GET['order_failed'])){?>
            
        <p class="text-center" style="color: red;" ><?php echo $_GET['order_failed']; ?></p>
      <?php }?>

      <!--Delete -->


        <table class="table table-bordered mt-4">
            
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">User Phone</th>
                    <th scope="col">User Address</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)) {
                    foreach ($orders as $order) { ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['order_status']; ?></td>
                            <td><?php echo $order['user_id']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td><?php echo $order['user_phone']; ?></td>
                            <td><?php echo $order['user_address']; ?></td>
                            <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Edit</a></td>
                            <td><a class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="8">No orders found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5 mx-auto">
                <li class="page-item <?php if ($page_no <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($page_no <= 1) echo '#'; else echo "?page_no=" . ($page_no - 1); ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_no_of_pages; $i++) { ?>
                    <li class="page-item <?php if ($page_no == $i) echo 'active'; ?>">
                        <a class="page-link" href="?page_no=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <li class="page-item <?php if ($page_no >= $total_no_of_pages) echo 'disabled'; ?>">
                    <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) echo '#'; else echo "?page_no=" . ($page_no + 1); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
