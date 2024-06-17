<?php 

  include('layouts/header.php');

?>

        <!--Home-->
        <section id="home">
            <div class="container">
                <h5>NEW ARRIVALS</h5>
               <h1>Top Deals This Season</h1>
                <p>T-Project offers the best products for the most affordable prices</p>
                <button>Shop now</button>
            </div>

        </section>



          <!--Brand-->

            <section id="brand" class="container">
              <div class="row justify-content-center">
                <img class="image-fluid col-lg-4 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg">
                <img class="image-fluid col-lg-4 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
                <img class="image-fluid col-lg-4 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg">
              </div>
            </section>

            <div class="tagline">
              Unleash Your Inner Hero with DONQUIXOTE – Wear the Legend.
          </div>
            <!--New-->
            <section id="new" class="w-100">
              <div class="row p-0 m-0">
                <!--One-->
                <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid" src="assets/imgs/prods/shirt1.png" alt="Shirt">
                  <div class="details">
                    <h3>Shirts</h3>
                    <button class="text-uppercase">Shop now</button>
                  </div>
                </div>
                <!--Two-->
                <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid" src="assets/imgs/prods/hoodie1.jpg" alt="Hoodie">
                  <div class="details">
                    <h3>Hoodies</h3>
                    <button class="text-uppercase">Shop now</button>
                  </div>
                </div>
                <!--Three-->
                <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid" src="assets/imgs/prods/sock1.jpg" alt="Socks">
                  <div class="details">
                    <h3>40% OFF Socks</h3>
                    <button class="text-uppercase">Shop now</button>
                  </div>
                </div>
              </div>
            </section>
            
            <!--Featured-->

            <section id="featured" class="my-5 pb-5">

              <div class="container text-center mt-5 py-5">
                <h3>Featured Products</h3>
                <hr>
                <p>Take a look at our highlighted selections.</p>
              </div>
              
              <div class="row mx-auto container-fluid">

              <?php include('server/get_featured_products.php');?>


              <?php while($row= $featured_products->fetch_assoc()){ ?>


                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                  <img class="img-fluid mb-3" src="assets/imgs/prods/<?php echo $row['product_image']; ?>">
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h4 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h5 class="p-price">&#8369; <?php echo $row['product_price']; ?>
                  </h4>
                  <a href="single_product.php?product_id=<?php echo $row['product_id'];?>"><button class="buy-btn">Buy now</button></a>
                </div>




                <?php } ?>
              </div>
            </section>


            <!--Banner-->

            <section id="banner" class="my-5 py-5">
              <div class="container">
                <h4>Top Choices</h4>
                <h1>Impressive Collections <br>up to 30% OFF</h1>
                <button class="text-uppercase">shop now</button>
              </div>
            </section>


            
            <?php 
            include('layouts/footer.php');
            ?>