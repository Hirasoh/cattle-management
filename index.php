<!DOCTYPE html>
<html>
<head>
   <title>LOGIN</title>
   <link rel="stylesheet" type="text/css" href="plugin/style.css">
</head>
<body>
   <div id="m-div">
      <img id="m-img" src="../farm_management_system/img/welcome.jpg">
        <form action="login.php" method="post">
         <h2>Farm Management System</h2>
         <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
         <label>User Name</label>
         <input type="text" name="uname" placeholder="User Name"><br>

         <label>Password</label>
         <input type="password" name="password" placeholder="Password"><br>

         <button type="submit">Login</button>
             <a href="signup.php" class="ca">Create an account</a>
        </form>
      </img>
   </div>
</body>
</html>