<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
$userName = $_SESSION['user_name'];
$userName = $_SESSION['user_name'];
$userEmail = 'email'; // Placeholder, replace with actual code to fetch from the database
$userPhone = 'phone'; // Placeholder, replace with actual code to fetch from the database
$userAge = 'age';   // Placeholder, replace with actual code to fetch from the database

// Query to fetch user details
$userQuery = "SELECT email, phone, age FROM user_form WHERE name = '$userName'";
$result = mysqli_query($conn, $userQuery);

if ($result) {
   // Fetch user details
   $userData = mysqli_fetch_assoc($result);
   
   // Assign values to variables
   $userEmail = $userData['email'];
   $userPhone = $userData['phone'];
   $userAge = $userData['age'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard -  User</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
   
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="user_page.php">Hi, User</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login_form.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="user_page.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                User Dashboard
                            </a>
                                
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    
                
            </div>
            <div class="container-fluid px-4">
       <div class="dashboard" style="margin-top:100px;">

        <!-- Display user details -->
        <h1>Welcome, <?php echo $userName; ?>!</h1>

        <!-- Display user details in a table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $userEmail; ?></td>
                    <td><?php echo $userPhone; ?></td>
                    <td><?php echo $userAge; ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    </div>
    </main>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>
</html>