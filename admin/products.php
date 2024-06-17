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

// 2. Return number of products
$stmt1 = $conn->prepare("SELECT COUNT(*) as total_records FROM products");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();
$stmt1->close();

// 3. Products per page
$total_records_per_page = 10;
$offset = ($page_no - 1) * $total_records_per_page;

// 4. Get products for the current page
$stmt2 = $conn->prepare("SELECT * FROM products LIMIT ?, ?");
$stmt2->bind_param("ii", $offset, $total_records_per_page);
$stmt2->execute();
$products_result = $stmt2->get_result();
$stmt2->close();

$total_no_of_pages = ceil($total_records / $total_records_per_page);
?>

<?php include('sidemenu.php'); ?>

<div class="container-fluid">
    <!-- Main content -->
    <div class="row" style="min-height: 1000px; margin-top: 27px; margin-left: 10px">
        <h1>Products</h1>
       <div class="table-responsive">
       <?php 
        if(isset($_GET['edit_success_message'])){?>
            
        <p class="text-center" style="color: green;" ><?php echo $_GET['edit_success_message']; ?></p>
      <?php }?>

      <?php 
        if(isset($_GET['edit_failure_message'])){?>
            
        <p class="text-center" style="color: red;" ><?php echo $_GET['edit_failure_message']; ?></p>
      <?php }?>

      <!--Delete -->

      <?php 
        if(isset($_GET['deleted_success'])){?>
            
        <p class="text-center" style="color: green;" ><?php echo $_GET['deleted_success']; ?></p>
      <?php }?>

      <?php 
        if(isset($_GET['deleted_failure'])){?>
            
        <p class="text-center" style="color: red;" ><?php echo $_GET['deleted_failure']; ?></p>
      <?php }?>

      <!--Create-->

      <?php 
        if(isset($_GET['product_created'])){?>
            
        <p class="text-center" style="color: green;" ><?php echo $_GET['product_created']; ?></p>
      <?php }?>

      <?php 
        if(isset($_GET['product_failed'])){?>
            
        <p class="text-center" style="color: red;" ><?php echo $_GET['product_failure']; ?></p>
      <?php }?>
      
      
      <?php 
        if(isset($_GET['images_updated'])){?>
            
        <p class="text-center" style="color: green;" ><?php echo $_GET['images_updated']; ?></p>
      <?php }?>


      <?php 
        if(isset($_GET['images_failed'])){?>
            
        <p class="text-center" style="color: red;" ><?php echo $_GET['images_failed']; ?></p>
      <?php }?>


            <!--Update image-->


            <?php 
        if(isset($_GET['images_updated'])){?>
            
        <p class="text-center" style="color: green;" ><?php echo $_GET['images_updated']; ?></p>
      <?php }?>


      <?php 
        if(isset($_GET['images_failed'])){?>
            
        <p class="text-center" style="color: red;" ><?php echo $_GET['images_failed']; ?></p>
      <?php }?>



        <table class="table table-striped table-sm">
            
            <thead>
                <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Offer</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Color</th>
                    <!-- <th scope="col">Edit Images</th> -->
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products_result->num_rows > 0) {
                    while ($product = $products_result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><img src="../assets/imgs/prods/<?php echo $product['product_image']; ?>" style="width: 70px; height:70px;" ></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td>&#8369;<?php echo $product['product_price']; ?></td>
                            <td><?php echo $product['product_special_offer']; ?>%</td>
                            <td><?php echo $product['product_category']; ?></td>
                            <td><?php echo $product['product_color']; ?></td>
                            <!-- <td><a class="btn btn-warning" href="<?php echo "edit_images.php?product_id=". $product['product_id']."&product_name=".$product['product_name'];?> " >Edit Images</a></td> -->
                            <td><a class="btn btn-primary" href="edit_products.php?product_id=<?php echo $product['product_id'];?>" >Edit</a></td>
                            <td><a class="btn btn-danger" href="delete_product.php?product_id=<?php echo $product['product_id']; ?>">Delete</a></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="8">No products found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
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
