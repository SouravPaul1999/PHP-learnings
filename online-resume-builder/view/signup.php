<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="signup.css">
  <title>Signup</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <h2 class="card-title text-center">Register</h2>
          <div class="card-body py-md-4">
            <form control="#" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" id="username" name="uname" placeholder="User Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="password" name="pw" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="confirm-password" name="cpw" placeholder="confirm-password">
              </div>
              <div class="form-group">
                <input type="submit" value="Submit" class="form-control fs-4 bg-dark text-warning" >
              </div>
              <div class="d-flex flex-row align-items-center justify-content-between">
              <a href="./loginpage.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">LogIn</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>