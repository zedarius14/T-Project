<?php include('header.php'); ?>
<?php include('sidemenu.php'); ?>


<?php 

    if(!isset($_SESSION['admin_logged_in'])){
       header('location: login.php');
       exit;
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

            <h2 style="text-align: center;">Help</h2>
            <div class="container text-center">

               
             
                <p>Please contact <?php echo $_SESSION['admin_email']; ?></p>
                <p>Please call  09361244616 </p>
                
                
                   
                </div>
            </div>
        </main>
    </div>
</div>