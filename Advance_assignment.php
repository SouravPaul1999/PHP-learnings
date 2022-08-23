<?php
require('vendor/autoload.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <?php

  use GuzzleHttp\Client;

  $uri = "https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services";
  $client = new Client();
  $response = $client->request('GET', $uri);
  $res = $response->getBody();
  $data = json_decode($res, true);
  // var_dump($data);
  for ($i = 12; $i <= 15; $i++) {
    $imgl = ($data['data'][$i]['relationships']['field_image']['links']['related']['href']);
    // echo $imgl;
    $imgd = $client->request('GET', $imgl);
    $imgresponse = $imgd->getBody();
    $photo = json_decode($imgresponse);
    // echo($imgresponse);
    // var_dump($photo);

    $image = 'https://ir-dev-d9.innoraft-sites.com' . $photo->data->attributes->uri->url;
    // echo "<img src=$image width='' height='' alt='' srcset=''>";
    $stitle = ($data['data'][$i]['attributes']['field_secondary_title']['value']);
    // echo $stitle;
    $scontent = ($data['data'][$i]['attributes']['field_services']['value']);
    // echo $scontent;

    if ($i % 2 == 0) {
      echo "<div class='row flex-row-reverse flex-row gy-5 justify-content-center'>";

      echo "<div class=' col-sm-12 col-md-6  col-xl-4'>";

      echo "<img class='image img-fluid' src='$image'>";

      echo "</div>";

      echo "<div class=' col-sm-12 col-md-6  col-xl-4'>";

      echo "<div class='text-break'>$stitle</div>";


      echo "<div class='text-break'>$scontent</div>";

      echo "<div class='text-lest'><a href='#' class='text-dark text-decoration-none'><button class=' fw-bold btn btn-md btn-white btn-block border border-primary border-color border-2 text-uppercase'  type='submit'>explore more</button></a></div>";

      echo "</div>";

      echo "</div>";
    } 
    else {
      echo "<div class='row flex-row gy-5 justify-content-center'>";

      echo "<div class=' col-sm-12 col-md-6 col-xl-4'>";

      echo "<img class='image img-fluid' src='$image'>";

      echo "</div>";

      echo "<div class=' col-sm-12 col-md-6 col-xl-4'>";

      echo "<div class=' text-break'>$stitle</div>";

      echo "<div class='text-break'>$scontent</div>";

      echo "<div class='text-left'><a href='#' class='text-dark text-decoration-none'><button class=' fw-bold btn btn-md btn-white btn-block border border-primary border-color border-2 text-uppercase' type='submit'>explore more</button></a></div>";
      
      echo "</div>";

      echo "</div>";
    }
  }

  ?>

</body>

</html>