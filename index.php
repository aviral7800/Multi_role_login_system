<?php 
$name = $email = $phone = $age = $user_type = '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
   
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Hi, Admin</a>
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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                                
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                            
                    </div>
                </main>
            </div>
            <?php
include("header.php"); ?>

<div class="container" style="margin-top:100px;">
            <div class="modal fade" id="insertdata" tabindex="-1" role="dialog" aria-labelledby="insertdataLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertdataLabel">Upload data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method="POST">
                <div class="modal-body">

                    <div class="form-group mb-3 ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Number</label>
                        <input type="phone" class="form-control" name="phone" placeholder="Enter your number" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Age</label>
                        <input type="text" name="age" class="form-control" required placeholder="Enter your age" pattern="[1-9][0-9]{0,2}" value="<?php echo htmlspecialchars($age); ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="Enter your password">                    </div>
                    <div class="form-group mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" required placeholder="Enter your password">                    </div>

                </div>
                <div class="form-group mb-3">
                        <label for="">User_Type</label>
                <select name="user_type" class="form-control">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
                </div>

               
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_data" class="btn btn-primary">Save data</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- view modall -->
<div class="modal fade" id="viewusermodal" tabindex="-1" role="dialog" aria-labelledby="viewusermodalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewusermodalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="view_user_data">
                
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="editdataLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editdataLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method="POST">
                <div class="modal-body">

                <div class="form-group mb-3 ">
                        <input type="hidden" class="form-control" name="id" id="user_id" >
                    </div>

                    <div class="form-group mb-3 ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Number</label>
                        <input type="tel" name="phone" class="form-control" id="phone" required placeholder="Enter your phone number">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Age</label>
                        <input type="text" name="age" class="form-control" id="age" required placeholder="Enter your age" pattern="[1-9][0-9]{0,2}" >
                    </div>

                   

                </div>
                <div class="form-group mb-3">
                        <label for="">User_Type</label>
                <select name="user_type" class="form-control">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_data" class="btn btn-primary">Update data</button>
                </div>
</div>
            </form>
        </div>
    </div>
</div>


<div class="container mt-5" style="padding-right:1200px; padding-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php

            if (isset($_SESSION["status"]) && $_SESSION["status"] != '') {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:1000px;">
                    <strong>Hey !</strong>
                    <?php echo $_SESSION['status'];
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['status']);
            }

            ?>

            <div class="card" style="width:1100px;">
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
                                <th width="6%" scope="col">#id</th>
                                <th width="20%" scope="col">Name</th>
                                <th width="20%" scope="col">Email</th>
                                <th width="10%" scope="col">Phone</th>
                                <th width="10%" scope="col">Age</th>
                                <th width="10%" scope="col">User_type</th>
                                <th width="8%" scope="col">View</th>
                                <th width="8%" scope="col">Edit</th>
                                <th width="8%" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $conn = mysqli_connect("localhost", "root", "", "user_db");
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
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm view_data">View Data</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm edit_data">Edit Data</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm delete_btn">Delete Data</a>
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
        </div>

    </div>
</div>
</div>

<?php include("footer.php"); ?>
<script>
// view data
    $(document).ready(function () {
        $('.view_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
            //   console.log(user_id);

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_view_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    // console.log(response);
                    $('.view_user_data').html(response);
                    $('#viewusermodal').modal('show');
                }
            });
        });

    });

    // edit data
    $(document).ready(function () {
        $('.edit_data').click(function (e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
            //   console.log(user_id);

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    // console.log(response);
                    $.each(response, function(key, value){
                    //  console.log(value['name']);
                    $('#user_id').val(value['id']);
                    $('#name').val(value['name']);
                    $('#email').val(value['email']);
                    $('#phone').val(value['phone']);
                    $('#age').val(value['age']);
                    $('#user_type').val(value['user_type']);

                    // $('#gender').val(value['gender']);
                    
                    });
                    $('#editdata').modal('show');
                }
            });
        });

    });
    

    $(document).ready(function () {
        $('.delete_btn').click(function (e) { 
            e.preventDefault();
            console.log('hello');
            
           var user_id = $(this).closest('tr').find('.user_id').text();

           $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'click_delete_btn': true,
                'user_id':user_id,
            },
            success: function (response) {
               console.log(response);
               window.location.reload(); 
            }
           });
        });
    });

    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Add an event listener to the form submission
    document.querySelector('form').addEventListener('submit', function (event) {
        // Your custom client-side validation
        var password = document.querySelector('[name="password"]').value;
        var confirmPassword = document.querySelector('[name="cpassword"]').value;

        if (password !== confirmPassword) {
            alert('Password and Confirm Password do not match!');
            event.preventDefault(); // Prevent the form from submitting
        }
    });
});
</script>
    

</script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>