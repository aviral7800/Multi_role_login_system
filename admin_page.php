<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <title>Admin page</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hi,Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      
      </ul>
    </div>
  </div>
</nav>
<button style="background-color:black;border:none;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Dashboard</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Admin Dashboard</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                 
                            <a class="nav-link" href="profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profile
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Signout
                            </a>
                            <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
                            </div>
                            </div>
  </div>
</div>
   

   <div class="content">
   <html>
<head>
    <title>Display</title>
   
</head>

</html>

<div class="card" style="width:1000px;">
                <div class="card-header">
                    <h4 class="text-center">REGISTER</h4>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#insertdata">
                        Insert Data
                    </button>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="10%" scope="col">#id</th>
                                <th width="20%" scope="col">Name</th>
                                <th width="30%" scope="col">Email</th>
                                <th width="20%" scope="col">Phone</th>
                                <th width="10%" scope="col">Age</th>
                                <th width="10%" scope="col">User Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $fetch_query = "SELECT * FROM user_form";
                            $fetch_query_run = mysqli_query($conn, $fetch_query);

                            if (mysqli_num_rows($fetch_query_run) > 0) {
                                while ($fetch_row = mysqli_fetch_assoc($fetch_query_run)) {
                                    // echo $fetch_row["id"];
                                    ?>
                                    <tr>

                                        <td class="user_id">
                                            <?php echo $fetch_row["id"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_row["name"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_row["email"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_row["phone"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_row["age"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_row["user_type"]; ?>
                                        </td>
                                       

                                    </tr>

                                    <?php
                                }
                            } else {
                                ?>

                                <tr colspan="4">No Result Found</tr>
                                <?php
                            }

                            ?>




                        </tbody>
                    </table>

                </div>
            </div>

<?php
include("config.php");
error_reporting(0);
$query = "select * from user_form";
$data= mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

if($total != 0){
    // echo "table has records";\
    ?>  
    <h2 align = "center">All Records</h2>
     <center><table border="1px" cellspacing="12" width="80%">
        <tr>
            <th width=5%>ID</th>
        <th width="10%">Name</th>
        <th width="25%">Email</th>
        <th width="15%">Phone</th>
        <th width="10%">Age</th>
        <th width="15%">User Type</th>

        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
                  <td>".$result['id']."</td>
                  <td>".$result['name']."</td>
                  <td>".$result['email']."</td>
                  <td>".$result['phone']."</td>
                  <td>".$result['age']."</td>
                  <td>".$result['user_type']."</td>
              </tr>";
    }

}
else{
    // echo "no records found";
}

?>


<script>
    function checkdelete(){
        return confirm('Are you sure you want to delete this record ?');
    }
</script>




   </div>

</div>

</body>
</html>