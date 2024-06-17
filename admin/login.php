
<?php include('header.php');?>

<?php 


include('../server/connection.php');

//if user has already registered, then take user to account login
if(isset($_SESSION['admin_logged_in'])){

  header('location: dashboard.php');
  exit;
}


if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;

            header('location: dashboard.php?login_success=Logged in successfully!');
        } else {
            header('location: login.php?error=Invalid username or password');
        }
    } else {
        // error
        header('location: login.php?error=Something went wrong');
    }
}
/*else{
    //error
    header('location: account.php?error=something went fucking wrong!');
  }*/



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5" style="background-color: #728C69;">
                <div class="card-header text-center">
                    <h3 style="color: white;">Admin Login</h3>
                </div>
                <div class="card-body">
                    <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
                        <div class="form-group">
                            <label for="username" style="color: white;">Email</label>
                            <input type="email" class="form-control" id="product-name" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: white;">Password</label>
                            <input type="password" class="form-control" id="product-desc" name="password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login_btn" value="Login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
