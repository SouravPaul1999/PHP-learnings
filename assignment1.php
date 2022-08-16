<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(
      function update () {
        
        // $('#fl').onchange(function() {
        //   $('#full').text($('.fl').val());
        // });
        
          $("#fn").add($("#ln")).keyup(function(event) {
			      $('#full').val($("#fn").val()+ " " +$("#ln").val());
		      });
        
      }
    );
  </script>
</head>
<body>
  <form action="assignment1php.php" method="post" enctype="multipart/form-data">
  First name:  <input type="text" id="fn" name="fname" pattern="[a-z A-Z]{1,12}" required>
  Last name: <input type="text" id="ln" name="lname" pattern="[a-z A-z]{1,20}" required>
  <br>
  <br>
  Full name: <input type="text" name="fullname" id="full" disabled>
  <br>
  <br>
  Contact Number: <input type="tel"  pattern="[+]{1}[9]{1}[1]{1}[0-9]{10}" maxlength="13" name="phone" onkeydown="this.value = this.value.trim()" onkeyup="this.value = this.value.trim()" placeholder="Enter +91 before your number"  id=""> 
  <br>
  Email ID: <input type="text" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
  <br>
  marks: <textarea name="Allmarks" id="" placeholder="follow this pattern (subject|marks)" cols="20" rows="10"></textarea>
  <br>
  <input type="file"  name="avatar">
  <br>
  <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>