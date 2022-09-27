<?php
function upload_pic($k)
{
  if (isset($_FILES[$k]) && !empty($_FILES[$k]['name'])) {
    $upload_folder = "photo/";
    $file_location = $upload_folder . basename($_FILES[$k]["name"]);
    $file_name = ($_FILES[$k]["name"]);
    $imagep = $image = "";
    $check= getimagesize($_FILES[$k]["tmp_name"]);
    // var_dump ($_FILES[$k]);
    if (move_uploaded_file($_FILES[$k]['tmp_name'], $file_location) && $check!=False ) {
      $image = "<img src='photo/$file_name' height='150px' width='300px'>";
      $imagep = "photo/" . $file_name;
      echo $image;
    } 
    else {
      $image = "you add other fiels rather than photo";
      echo $image;
    }
  } else {
    echo "no file was uploaded";
  }
}

if (isset($_POST['submit'])) {

  echo upload_pic('upic');
}
?>