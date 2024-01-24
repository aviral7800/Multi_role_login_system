<?php

@include 'config.php';

session_start();
error_reporting(0);

if (isset($_POST['submit'])) {

   $name = ($_POST['name']);
   $email = ($_POST['email']);
   $phone = ($_POST['phone']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $age = ($_POST['age']);
   $user_type = $_POST['user_type'];


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         header('location:index.php');

      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }

   } else {
      $error[] = 'incorrect email or password!';
   }

}
;
?>

<!DOCTYPE>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="form-container">
      <form action="" method="post">
         <h3 style="color:black;">login now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         }
         ;
         ?>
         <p>Enter Your Email<sup>*</sup></p>
         <input type="email" name="email" required placeholder="enter your email">

         <p>Enter Your Password<sup>*</sup></p>
         <input type="password" name="password" required placeholder="enter your password">

         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>Create account ? <a href="register_form.php">Register now</a></p>
      </form>

   </div>

</body>

</html>