<?php include('header.php'); ?>
<!DOCTYPE HTML>  
<html>
<head>
<title>Php-Login</title>
    <style type="text/css">
      
    </style>
</head>
<body>  
  <div style="width: 400px; margin-left: auto; margin-right: auto;  "align='center'>
  <form method="post" action="../Controller/loginaction.php"> 
  <fieldset >
  <legend><h2>Login</h2></legend> 
  <span class='red'><?php 
    if(isset($_COOKIE['error'])) {
      echo $_COOKIE['error'];
    }
    if(isset($_COOKIE['msg'])) {
      echo $_COOKIE['msg'];
    }
  ?>
  </span>
    <label>User Name:</label>
    <input type="text" name="username"> <br><br>
    <label>Password:</label>
    <input type="password" name="password"><br><br>


    <input type="checkbox" name="remember" id="rem">
    <label for="rem">Remember Me</label> <br>
    <hr>

    
    <input type="submit" name="submit" value="Submit">
    <a href="forgotpassword.php"> Forgot Password? </a>  
  </fieldset>
  </form>
  </div>
  <br><br>
</body>
</html>
<?php include'footer.php'; ?>








