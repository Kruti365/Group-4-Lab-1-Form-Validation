<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
  color:red;
}
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style1.css">
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =  $contactErr = $licenseErr= $dobErr="";
$name = $email = $gender = $contact= $license =$dob="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<br>
<h2>Government of Canada Employment form</h2> <br><br>
<div class="container">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<!-- One field start -->
<div class="row">
    <div class="col-25">
    <label for="fname">Name</label> 
    </div>
    
    <div class="col-75">
    <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span> 
    </div>
</div>
<!-- end -->
  
<!-- 2 field start -->
<div class="row">
    <div class="col-25">
    <label for="email">Email</label> 
    </div>
    <div class="col-75">
    <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span> 
    </div>
</div>
<!-- end -->
  
<!-- 3 field start -->
<div class="row">
    <div class="col-25">
    <label for="contact">Contact No</label> 
    </div>
    <div class="col-75">
    <input type="tel" name="contact">
    <span class="error">* <?php echo $contactErr;?></span> 
    </div>
</div>
<!-- end -->

  <!-- 4 field start -->
<div class="row">
    <div class="col-25">
    <label for="gender">Gender</label>
    </div>
    <div class="col-75">
    <input type="radio" name="gender" value="female">Female 
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other 
    <span class="error">* <?php echo $genderErr;?></span>
 </div>
</div>
<!-- end -->

<!-- 5 field start -->
<div class="row">
    <div class="col-25">
    <label for="licenseno">Driver License No.</label>
    </div>
    <div class="col-75">
    <input type="text" name="licenseno">
    <span class="error">* <?php echo $licenseErr;?></span>
 </div>
</div>
<!-- end -->

<!-- 6 field start -->
<div class="row">
    <div class="col-25">
    <label for="dob">Date of Birth</label>
    </div>
    <div class="col-75">
    <input type="date" name="dob">
    <span class="error">* <?php echo $dobErr;?></span>
 </div>
</div>
<!-- end -->
  <br><br>
  
  <!-- 13 field start -->
  <div class="row">
    
    <input type="submit" name="submit" value="Submit">  

</div>
<!-- end -->
 </form>

</div>
</br>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $contact;
echo "<br>";
echo $gender;
echo "<br>";
echo $license;
echo "<br>";
echo $dob;
?>

</body>
</html>