

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>sourav_website</title>
</head>
<body>

<?php
$page=$_GET['q'];
// var_dump($page);
if ($page == 2) {
  // header('location: http://sourav_domain.com/login_user.php');
  include('./login_user.php');
}
elseif ($page == 3) {
  // header('location: http://sourav_domain.com/name.php');
  include('./name.php');
}
elseif ($page == 4) {
  // header('location: http://sourav_domain.com/photo_upload.php');
  include('./photo_upload.php');
}
elseif ($page == 5) {
  // header('location: http://sourav_domain.com/mobile.php');
  include('./mobile.php');
}
elseif ($page == 6) {
  // header('location: http://sourav_domain.com/mail.php');
  include('./mail.php');
}
elseif ($page == 7) {
  // header('location: http://sourav_domain.com/marksheet.php');
  include('./marksheet.php');
}
elseif ($page == 8) {
  // header('location: http://sourav_domain.com/pdf_Marksheet.php');
  include('./pdf_Marksheet.php');
}
?>

  <!-- <h1>Hello World!</h1>

    <p>This is the landing page of <strong>sourav_domain</strong>.this is my first php in my domain </p>
    hiiiii -->
  

</body>
</html>