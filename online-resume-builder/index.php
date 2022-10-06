<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//   header('location:./view/loginpage.php');
// }
// else{
//   header('location:./view/landingpage.php');
// }


// $request = $_SERVER['REQUEST_URI'];

// echo $request;

$routes = [];

route('/', function ()
{
  echo "hello";
});

route('/login', function ()
{
  // echo "hi login";
  header('location:./online-resume-builder/view/loginpage.php');
});

function route(string $path, callable $callback )
{
  global $routes;
  $routes[$path]= $callback;
}

run();

function run(){
  global $routes;
  $uri = $_SERVER['REQUEST_URI'];
  foreach ($routes as $path => $callback) {

    if($path !== $uri) continue;

    $callback();
  }
}
?>