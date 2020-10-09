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
$nameErr = $emailErr = $genderErr =  $contactErr = $licenseErr= $dobErr= $passwordErr= $confpasswordErr= $postalcodeErr= $uploadresumeErr= $uploadgovernidErr= $rolesErr="";
$name = $email = $gender = $contact= $license =$dob= $password1= $confpassword= $postalcode= $uploadresume= $uploadgovernid= $roles="";

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
<p><span class="error">* Required field</span></p>
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

<!-- 7 field start -->
<div class="row">
    <div class="col-25">
    <label for="password1">Password </label>
    </div>
    <div class="col-75">
    <input type="password" name="password1">
    <span class="error">* <?php echo $passwordErr;?></span>
 </div>
</div>
<!-- end -->

<!-- 8 field start -->
<div class="row">
    <div class="col-25">
    <label for="confpassword">Confirm Password </label>
    </div>
    <div class="col-75">
    <input type="password" name="confpassword">
    <span class="error">* <?php echo $confpasswordErr;?></span>
 </div>
</div>
<!-- end -->

<!-- 9 field start -->
<div class="row">
    <div class="col-25">
    <label for="postalcode">Postal Code</label>
    </div>
    <div class="col-75">
    <input type="text" name="postalcode">
    <span class="error">* <?php echo $postalcodeErr;?></span>
 </div>
</div>
<!-- end -->

<!-- 10 field start -->
<div class="row">
    <div class="col-25">
    <label for="uploadresume">Upload your Resume</label>
    </div>
    <div class="col-75">
    <input type="file" name="uploadresume">
    <span class="error">* <?php echo $uploadresumeErr;?></span>
 </div>
</div>
<!-- end -->

<!-- 11 field start -->
<div class="row">
    <div class="col-25">
    <label for="uploadgovernid">Upload your Government ID</label>
    </div>
    <div class="col-75">
    <input type="file" name="uploadgovernid">
    <span class="error">* <?php echo $uploadgovernidErr;?></span>
 </div>
</div>
<!-- end -->


<div class="row">
    <div class="col-25">
<label for="roles">Roles</label>
</div>
    <div class="col-75">
  <select id="roles" name="roles">
    <option value="parttime">Part-time</option>
    <option value="fulltime">Full-time</option>
    <option value="seasonal">Seasonal</option>
  </select>
  <span class="error">* <?php echo $rolesErr;?></span>
  </div>
</div>
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
echo "<br>";
echo $password;
echo "<br>";
echo $confpassword;
echo "<br>";
echo $postalcode;
echo "<br>";
echo $uploadresume;
echo "<br>";
echo $uploadgovernid;
echo "<br>";
echo $roles;
echo "br>";
?>

</body>
</html>