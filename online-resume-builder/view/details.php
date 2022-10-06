<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="details.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#addmore").click(function() {
        $("#item").append('<div class="added-item"><label for="name">School Name<span>*</span></label><input id="name" type="text" name="sname[]" required /><label for="stream">Stream<span>*</span></label><input id="stream" type="text" name="sstream[]" required/><label for="py">Passing Year<span>*</span></label><input id="py" type="number" name="spy[]" required/><label for="marks">Marks<span>*</span></label><input id="marks" type="number" name="smarks[]" required/><button class="delete btn button-white uppercase">- Remove School Field</button></div>');
      });

      $("#cadd").click(function() {
        $("#citem").append('<div class="added-item"><label for="name">College Name<span>*</span></label><input id="name" type="text" name="cname[]" required/><label for="stream">Stream<span>*</span></label><input id="stream" type="text" name="cstream[]" required/><label for="py">Passing Year<span>*</span></label><input id="py" type="number" name="cpy[]" required/><label for="marks">Marks<span>*</span></label><input id="marks" type="number" name="cmarks[]" required/><button class="delete btn button-white uppercase">- Remove College Field</button></div>');
      });

      $("#padd").click(function() {
        $("#pitem").append('<div class="added-item"><label for="name">Project Name<span>*</span></label><input id="name" type="text" name="pname[] required" /><label for="stream">Project Description<span>*</span></label><input id="stream" type="text" name="pdes[]" required /><label for="py">Project Completition Year<span>*</span></label><input id="py" type="number" name="pcy[]" required/><button class="delete btn button-white uppercase">- Remove Project Field</button></div>');
      });

      $('body').on('click', '.delete', function() {
        $(this).parent('div.added-item').remove()
      });
    });
  </script>
</head>

<body>
  <div class="testbox">
    <form action="../controller/create_pdf.php" method="POST" enctype="multipart/form-data">
      <div class="banner">
        <h1>Fill Your Resume</h1>
      </div>
      <br />
      <fieldset>
        <legend>General Details</legend>
        <div class="colums">
          <div class="item">
            <label for="fullname">Full Name<span>*</span></label>
            <input id="fullname" type="text" name="name" required />
          </div>
          <div class="item">
            <label for="Dob"> DOB<span>*</span></label>
            <input id="Dob" type="date" name="dob" required />
          </div>
          <div class="item">
            <label for="address">Email Address<span>*</span></label>
            <input id="address" type="text" name="email" required />
          </div>
          <div class="item">
            <label for="phone">LinkedIn Url</label>
            <input id="phone" type="url" name="lurl" />
          </div>
          <div class="item">
            <label for="photo">User Picture</label>
            <input id="photo" type="file" name="upic" accept="image/*" required/>
          </div>
        </div>
      </fieldset>
      <br />
      <div class="school">

        <fieldset>
          <legend>School Details</legend>
          <div class="colums">
          </div>

          <div id="item" class="item">

            <label for="name">School Name<span>*</span></label>
            <input id="name" type="text" name="sname[]" />

            <label for="stream">Stream<span>*</span></label>
            <input id="stream" type="text" name="sstream[]" />

            <label for="py">Passing Year<span>*</span></label>
            <input id="py" type="number" name="spy[]" />

            <label for="marks">Marks<span>*</span></label>
            <input id="marks" type="number" name="smarks[]" />

          </div>
          <button id="addmore" class="btn add-more button-yellow uppercase" type="button">+ Add School Field</button>

        </fieldset>
      </div>
      <br />
      <div class="college">

        <fieldset>
          <legend>College Details</legend>
          <div class="colums">
          </div>

          <div id="citem" class="item">

            <label for="name">College Name<span>*</span></label>
            <input id="name" type="text" name="cname[]" />

            <label for="stream">Stream<span>*</span></label>
            <input id="stream" type="text" name="cstream[]" />

            <label for="py">Passing Year<span>*</span></label>
            <input id="py" type="number" name="cpy[]" />

            <label for="marks">Marks<span>*</span></label>
            <input id="marks" type="number" name="cmarks[]" />

          </div>
          <button id="cadd" class="btn add-more button-yellow uppercase" type="button">+ Add College Field</button>
        </fieldset>

        <br />
      <div class="project">

        <fieldset>
          <legend>Project Details</legend>
          <div class="colums">
          </div>

          <div id="pitem" class="item">

            <label for="name">Project Name<span>*</span></label>
            <input id="name" type="text" name="pname[]" />

            <label for="stream">Project Description<span>*</span></label>
            <input id="stream" type="text" name="pdes[]" />

            <label for="py">Project Completition Year<span>*</span></label>
            <input id="py" type="number" name="pcy[]" />

          </div>
          <button id="padd" class="btn add-more button-yellow uppercase" type="button">+ Add Project Field</button>
        </fieldset>
      </div>
      <div class="btn-block">
        <!-- <button type="order" href="/">Confirm Order</button> -->
        <input type="Submit" class="s" name="submit" value="submit">
      </div>
    </form>
  </div>
</body>

</html>