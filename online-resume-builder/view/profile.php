<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>profile</title>
</head>

<body>
  <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Online Resume Builder</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link toggle " aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link toggle" href="#">About US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link toggle" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
              <a class="nav-link toggle active" href="#" >Profile</a>
            </li>

        </ul>
        <div class="d-flex">
          <a href="./logout.php" class="btn btn-warning btn-outline-danger btn-md">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <section class="des ">
    <div class="container">
      <h1 class="text-center  text-danger fs-6 mt-5">
        Welcome to your Profile: <?php session_start();  echo($_SESSION['username']) ?>
      </h1>
      <!-- <h2 class="text-center my-3 fw-light">
        Only 2% of resumes make it past the first round. <br> Be in the top 2%
      </h2>
      <p class="my-3 text-center fs-5 fw-normal">
        Use professional field-tested resume templates that follow the exact <br> ‘resume rules’ employers look for. Easy to use and done within <br> minutes - try now for free!
      </p> -->
      <p class="text-center mt-5">
        <a href="./history.php" class="btn btn-primary btn-md fw-normal rounded-pill">Go To Your Downloaded Resume History</a>
      </p>
    </div>
  </section>
</body>

</html>