<?php
@include 'config.php';
$name = $email = $phone = $age = $user_type = '';

if(isset($_POST['submit'])){
    // Server-side validation
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $phone = ($_POST['phone']);
    $age = ($_POST['age']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $user_type = $_POST['user_type'];

    // Check if the email is already registered
    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'Email is already registered!';
    }else{
        // Check if the password and confirm password match
        if($pass != $cpass){
            $error[] = 'Password not matched!';
        }else{
            $insert = "INSERT INTO user_form(name, email, phone , age , password, user_type) VALUES('$name','$email', '$phone', '$age', '$pass','$user_type')";
            mysqli_query($conn, $insert);

            // Show successful registration alert
            echo '<script>alert("Registered successfully! Redirecting to login page..."); setTimeout(function(){ window.location.href = "login_form.php"; }, 3000);</script>';
        }
    }
}
if (isset($_POST["click_view_btn"])) {
    $id = $_POST['user_id'];
    $fetch_query = "SELECT * FROM user_form WHERE id='$id'";
    $fetch_query_run = mysqli_query($conn, $fetch_query);

    if (mysqli_num_rows($fetch_query_run) > 0) {
        while ($fetch_row = mysqli_fetch_assoc($fetch_query_run)) {

            echo '
            <h6> User Id : '.$fetch_row['id'].'</h6>
            <h6> Full Name : '.$fetch_row['name'].'</h6>
            <h6> Email : '.$fetch_row['email'].'</h6>
            <h6> Phone : '.$fetch_row['phone'].'</h6>
            <h6> Age : '.$fetch_row['age'].'</h6>
            <h6> user_type : '.$fetch_row['user_type'].'</h6>
            
            ';
        }
    } else {
        echo '<h4> No record found</h4>';
    }
    
}

if (isset($_POST["click_edit_btn"])) {
    $id = $_POST['user_id'];
    $arrayresult=[];
    $fetch_query = "SELECT * FROM user_form WHERE id='$id'";
    $fetch_query_run = mysqli_query($conn, $fetch_query);

    if (mysqli_num_rows($fetch_query_run) > 0) {
        while ($fetch_row = mysqli_fetch_assoc($fetch_query_run)) {

           array_push($arrayresult, $fetch_row);
           header("content-type: application/json");
           echo json_encode($arrayresult);
        }
    } else {
        echo '<h4> No record found</h4>';
    }
    
}

// update data

if (isset($_POST['update_data'])) {
    $id = $_POST['id'];    
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $age = ($_POST['age']);
   $user_type = $_POST['user_type'];

   $update_query = "UPDATE user_form SET name='$name', email='$email', phone='$phone', age='$age', user_type='$user_type' WHERE id='$id'";
   $update_query_run = mysqli_query($conn, $update_query);

   if($update_query_run)
   {
    $_SESSION['status'] = "Data updated successfully";
    header("location: index.php");
   }
   else{
    $_SESSION['status'] = "Data not updated successfully";
        header("location: index.php");
   }
}

// delete data

if (isset($_POST["click_delete_btn"])) {
       $id = $_POST["user_id"];
       $delete_query = "DELETE FROM user_form WHERE id='$id'";
       $delete_query_run = mysqli_query($conn, $delete_query);
       if($delete_query_run){
        echo "data deleted successfully";
       }
       else{
        echo "data deleetion failed";
       }
}