<?php
@include 'config.php';
$name = $email = $phone = $age = $user_type = '';
$errors = [];
$successMessage = '';

if(isset($_POST['submit'])){
   $name = ($_POST['name']);
   $email = ($_POST['email']);
   $phone = ($_POST['phone']);
   $age =  ($_POST['age']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   
   $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      if($pass != $cpass){
         $error[] = 'Passwords do not match!';
      } else {
         $insert = "INSERT INTO user_form(name, email, phone , age , password, user_type) VALUES('$name','$email', '$phone', '$age', '$pass','$user_type')";
         mysqli_query($conn, $insert);

         // Set success message for alert
         $successMessage = 'Registration successful! You can now log in.';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register form</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   
<div class="form-container">
   <form action="#" method="post">
      <h3 style="color:black;">Register now</h3>

      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <p>Your Name<sup>*</sup></p>
      <input type="text" name="name" required placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>">
      
      <p>Your Email<sup>*</sup></p>
      <input type="email" name="email" required placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>">
       
      <p>Phone Number<sup>*</sup></p>
      <input type="tel" name="phone" required placeholder="Enter your phone number" pattern="[0-9]{10}" value="<?php echo htmlspecialchars($phone); ?>">
      
      <p>Your Age<sup>*</sup></p>
      <input type="text" name="age" required placeholder="Enter your age" pattern="[1-9][0-9]{0,2}" value="<?php echo htmlspecialchars($age); ?>">
      
      <p>Password<sup>*</sup></p>
      <input type="password" name="password" required placeholder="Enter your password">
      
      <p>Confirm Password<sup>*</sup></p>
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      
      <p>User Type<sup>*</sup></p>
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login now</a></p>
   </form>
</div>

<?php

if (!empty($successMessage)) {
    echo '<script>alert("' . $successMessage . '"); setTimeout(function(){ window.location.href = "login_form.php"; });</script>';
}
?>

</body>
</html>
