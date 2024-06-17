<?php session_start();
?>

<?php include('../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .wrapper {
            display: flex;
            flex: 1;
        }
        .sidebar {
            min-width: 200px;
            max-width: 200px;
            background-color: #343a40;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .navbar-brand {
            margin-left: 40px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="../assets/imgs/brand2x.jpg"></a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if(isset($_SESSION['admin_logged_in'])){?>
                    <a class="nav-link" href="logout.php?logout=1">Sign Out</a>
                    <?php }?>
                </li>
            </ul>
        </div>
    </nav>