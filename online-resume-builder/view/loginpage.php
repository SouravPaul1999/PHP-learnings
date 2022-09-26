<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

     <br />
     <div class="container" style="width:500px;">
          <?php
          //  if(isset($message))  
          //  {  
          //       echo '<label class="text-danger">'.$message.'</label>';  
          //  }  
          //  
          ?>
          <h3 align="">User Login</h3><br />
          <form action="../controller/loginc.php" method="POST">
               <label>Username</label>
               <input type="text" name="username" class="form-control" required />
               <br />
               <label>Password</label>
               <input type="password" name="password" class="form-control" required />
               <br />
               <input type="submit" name="login" class="btn btn-info" value="Login" />
          </form>
     </div>
     <br />

</body>

</html>