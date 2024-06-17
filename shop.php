<?php 
include('server/connection.php');

//use the search
if(isset($_POST['search'])){

    
    //1. determine page no
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        $page_no = $_GET['page_no'];

    } else {
        // if user just entered the page then default page is 1
        $page_no = 1;
    }

    
    $category = $_POST['category'];
    $price = $_POST['price'];

      //2. return number of products
      $stmt = $conn->prepare("SELECT COUNT(*) as total_records FROM products WHERE product_category=? AND product_price<=?");
      $stmt->bind_param("si", $category,$price);
      $stmt->execute();
      $stmt->bind_result($total_records);
      $stmt->store_result();
      $stmt->fetch();
      $stmt->close();

        //3. products per page
    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    

    //4. get all products
    $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset, $total_records_per_page");
    $stmt2->bind_param("si", $category, $price);
    $stmt2->execute();
    $products = $stmt2->get_result();//[]

   


    
} else {

    //1. determine page no
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        $page_no = $_GET['page_no'];

        
    } else {
        // if user just entered the page then default page is 1
        $page_no = 1;
    }

    //2. return number of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) as total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();
    $stmt1->close();

    //3. products per page
    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //4. get all products
    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT ?, ?");
    $stmt2->bind_param("ii", $offset, $total_records_per_page);
    $stmt2->execute();
    $products = $stmt2->get_result();
}
?>

<?php
include('layouts/header.php');
?>

<!--Main Content-->
<div class="container mt- pt-5">
    <div class="row">
        <!--Search-->
        <section id="search" class="col-lg-3 col-md-4 col-sm-12 my-5 py-5">
            <div class="container mt-5 py-5">
                <p>Search Products</p>
            </div>
            <form action="shop.php" method="POST">
                <div class="row mx-auto container">
                    <div class="col-12">
                        <p>Category</p>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="shirts" id="category_one" <?php if(isset($category) && $category=='shirts'){echo 'checked';} ?>>
                            <span class="form-check-label">Shirts</span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="shorts" id="category_two" <?php if(isset($category) && $category=='shorts'){echo 'checked';} ?>>
                            <span class="form-check-label">Shorts</span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="hoodies" id="category_two" <?php if(isset($category) && $category=='hoodies'){echo 'checked';} ?>>
                            <span class="form-check-label">Hoodies</span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="footwear" id="category_two" <?php if(isset($category) && $category=='footwear'){echo 'checked';} ?>>
                            <span class="form-check-label">Footwear</span>
                        </label>
                        <!-- <label class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="footwear" id="category_five">
                            <span class="form-check-label">Shoes</span>
                        </label> -->
                    </div>
                </div>
                <div class="row mx-auto container mt-5">
                    <div class="col-12">
                        <p>Price</p>
                        <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{echo "100";} ?>" min="1" max="1000" id="customRange2"/>
                        <div class="w-50">
                            <span style="float: left;">1</span>
                            <span style="float: right;">1000</span>
                        </div>
                    </div>
                </div>
                <div class="form-group my-3 mx-3">
                    <input type="submit" name="search" value="Search" class="btn btn-primary">
                </div>
            </form>
        </section>
        <!--Shop-->
        <section id="featured" class="col-lg-9 col-md-8 col-sm-12 my-5 py-5 ">
            <div class="container mt-5 py-5">
                <h3>Our Products</h3>
                <p>Take a look at our Product selections.</p>
            </div>
            <div class="row mx-auto container-fluid">
                <?php while($row = $products->fetch_assoc()){ ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/prods/<?php echo $row['product_image']; ?>">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4 class="p-name"><?php echo $row['product_name']; ?></h4>
                    <h5 class="p-price">&#8369;<?php echo $row['product_price']; ?></h5>
                    <button class="buy-btn"><a href="<?php echo "single_product.php?product_id=" . $row['product_id'] ?>">Buy now</a></button>
                </div>
                <?php }?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5 mx-auto">
                    <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?>">
                        <a class="page-link" href="<?php if($page_no <=1){echo '#';}else{echo "?page_no=".($page_no - 1);} ?>">Previous</a>
                    </li>
                    <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
                    <li class="page-item"><a href="?page_no=2" class="page-link">2</a></li>
                    <?php if($page_no>=3) { ?>
                    <li class="page-item"><a href="#" class="page-link">...</a></li>
                    <li class="page-item"><a href="<?php echo "?page_no=".$page_no; ?>" class="page-link"><?php echo $page_no; ?></a></li>
                    <?php }?>
                    <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';} ?>">
                        <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no + 1);} ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>
</div>



<?php
include('layouts/footer.php');
?>
