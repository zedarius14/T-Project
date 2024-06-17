<?php include('header.php'); ?>
<?php include('sidemenu.php'); ?>


<div class="container-fluid">
    <div class="row" style="min-height: 1000px">

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-betwee flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                </div>
            </div>

            <h2>Create Product</h2>
            <div class="table-responsive">


                <div class="mx-auto container">
                    <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">

                       
                            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            } ?></p>
                            <div class="form-group my-3">
                                <label>Product name</label>
                               <input type="text" class="form-control" id="product-name" name="name" placeholder="Product name" >
                            </div>

                            <div class="form-group my-3">
                                <label>Description</label>
                                <input type="text" class="form-control" id="product-name" name="description" placeholder="Product name" >
                            </div>

                            <div class="form-group my-3">
                                <label>Price</label>
                                <input type="text" class="form-control" id="product-price" name="price" placeholder="Product price" >
                            </div>


                            <div class="form-group my-3">
                                <label>Special Offer/Sale</label>
                                <input type="text" class="form-control" id="product-offer" name="offer" placeholder="Product offer" >
                            </div>


                            <div class="form-group my-3">
                                <label>Category</label>
                               <select class="form-select" required name="category" >
                                <option value="shirts">Shirts</option>
                                <option value="shorts">Shorts</option>
                                <option value="footwear">Footwear</option>
                               </select>
                            </div>

                            <div class="form-group my-3">
                                <label>Color</label>
                                <input type="text" class="form-control" id="product-color" name="color" placeholder="Product color" >
                            </div>

                            <div class="form-group my-3">
                                <label>Image 1</label>
                                <input type="file" class="form-control" id="image1" name="image1" placeholder="Product color" >
                            </div>

                            <div class="form-group my-3">
                                <label>Image 2</label>
                                <input type="file" class="form-control" id="image2" name="image2" placeholder="Product color" >
                            </div>

                            <div class="form-group my-3">
                                <label>Image 3</label>
                                <input type="file" class="form-control" id="image3" name="image3" placeholder="Product color" >
                            </div>

                            <div class="form-group my-3">
                                <label>Image 4</label>
                                <input type="file" class="form-control" id="image4" name="image4" placeholder="Product color" >
                            </div>


                        
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" name="create_product" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>