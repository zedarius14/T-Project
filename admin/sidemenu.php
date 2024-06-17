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
            background-color: #607D3B;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .sidebar .navbar-brand {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            display: block;
            font-size: 1.5rem;
        }

        
    </style>
</head>
<body>
  

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
            <ul class="list-unstyled">
                <li>
                    <a href="dashboard.php">Orders</a>
                </li>
                <li>
                    <a href="products.php">Products</a>
                </li>
                <li>
                    <a href="account.php">Account</a>
                </li>
                <li>
                    <a href="add_product.php">Add new product</a>
                </li>
                <li>
                    <a href="help.php">Help</a>
                </li>
            </ul>
        </div>
        